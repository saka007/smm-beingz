<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class orders extends MX_Controller {
	public $tb_users;
	public $tb_order;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_social_network;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories       = CATEGORIES;
		$this->tb_users            = USERS;
		$this->tb_order            = ORDER;
		$this->tb_services         = SERVICES;
		$this->tb_api_providers    = API_PROVIDERS;
		$this->tb_social_network   = SOCIAL_NETWORK_CATEGORIES;
		$this->tb_transaction_logs = TRANSACTION_LOGS;
				
	}

	public function save_order($data_order = ""){
		if (!is_object($data_order) && $data_order->amount < 0) {
			return false;
		}
		$order_detail       = $data_order->order_details;
		$amount             = $data_order->amount;
		$txt_id             = $data_order->txt_id;
		$transaction_fee    = $data_order->transaction_fee;
		$payment_type       = $data_order->payment_type;
		$order_status       = (isset($data_order->order_status) && $data_order->order_status == 0) ? 'awaiting' : 'pending';
		$order_note         = (isset($data_order->order_note)) ? $data_order->order_note : '';
		$transaction_status = (isset($data_order->transaction_status) && $data_order->transaction_status == 0) ? 0 : 1;

		//update customer informations
		$user = $this->model->get('id, total_orders, total_spent', $this->tb_users, ['email' => $order_detail['email']]);
		if (empty($user)) {
			$data_user = array(
				"ids" 	        	  => ids(),
				'email'               => $order_detail['email'],
				'total_orders'        => 1,
				'total_spent'         => $amount,
				'history_ip'          => get_client_ip(),
				'changed'             => NOW,
				'created'             => NOW,
			);
			$this->db->insert($this->tb_users, $data_user);
			$user_id = $this->db->insert_id();
		}else{
			$data_user = array(
				'total_orders'   => $user->total_orders + 1,
				'total_spent'    => $user->total_spent + $amount,
				'history_ip'     => get_client_ip(),
				'changed'        => NOW,
			);
			$this->db->update($this->tb_users, $data_user,  ['id' => $user->id]);
			$user_id = $user->id;
		}

		// insert new order
		$service = $this->model->get('*', $this->tb_services, ['ids' => $order_detail['item_ids'], 'status' => 1]);
		$data_order = array(
			"ids" 	        	=> ids(),
			"uid" 	        	=> $user_id,
			"cate_id" 	    	=> $service->cate_id,
			"service_id" 		=> $service->id,
			"service_type" 		=> $service->type,
			"link" 	        	=> $order_detail['link'],
			"quantity" 	    	=> $service->quantity,
			"charge" 	    	=> $service->price,
			"api_provider_id"  	=> $service->api_provider_id,
			"api_service_id"  	=> $service->api_service_id,
			"api_order_id"  	=> -1,
			"note"  	        => $order_note,
			"status"			=> $order_status,
			"changed" 	    	=> NOW,
			"created" 	    	=> NOW,
		);
		$this->db->insert($this->tb_order, $data_order);
		$order_id = $this->db->insert_id();

		/*----------  Insert to Transaction table  ----------*/
		$data_transaction = array(
			"ids" 				=> ids(),
			"uid" 				=> $user_id,
			"order_id" 		    => $order_id,
			"type" 				=> $payment_type,
			"transaction_id" 	=> $txt_id,
			"transaction_fee" 	=> $transaction_fee,
			"amount" 	        => $amount,
			"status" 	        => $transaction_status,
			"created" 			=> NOW,
		);

		$this->db->insert($this->tb_transaction_logs, $data_transaction);
		$transaction_log_id = $this->db->insert_id();
		set_session("transaction_log_id", $transaction_log_id);

		// send email to user and admin enable_new_order_notification_send_to_customer
		if (get_option("enable_new_order_notification_send_to_customer")) {
			$subject = get_option('new_order_notification_send_to_customer_subject');
			$message = get_option('new_order_notification_send_to_customer_content');
			$merge_fields = array(
				"{{customer_email}}"      => $order_detail['email'],
	            "{{order_id}}"            => $order_id,
	            "{{amount}}"              => $amount,
	            "{{package_name}}"        => $service->quantity . $service->name,
	            "{{manage_orders_link}}"  => cn('client'),
			);
			$template = [ 'subject' => $subject, 'message' => $message, 'merge_fields' => $merge_fields];
			$check_send_email_issue = $this->model->send_mail_template($template, $user_id);
		}		

		if (get_option("enable_new_order_notification_send_to_admin")) {
			$subject = get_option('new_order_notification_send_to_admin_subject');
			$message = get_option('new_order_notification_send_to_admin_content');
			$template = [ 'subject' => $subject, 'message' => $message, 'merge_fields' => $merge_fields];
			$admin_id = $this->model->get("id", $this->tb_users, "role = 'admin'", "id","ASC")->id;
			if ($admin_id) {
				$check_send_email_issue = $this->model->send_mail_template($template, $admin_id);
			}
		}

		return true;
	}
}