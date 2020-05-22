<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class contact extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_tickets;
	public $tb_ticket_message;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users      = USERS;
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		$this->tb_tickets    = TICKETS;
		$this->tb_ticket_message    = TICKET_MESSAGES;

	}

	public function index(){

		$data = array(
			"module"     => get_class($this),
		);
		$this->template->set_layout('user');
		$this->template->build("index", $data);
	}
	
	public function send_message(){
		$name      = post('name');
		$email     = post('email');
		$subject   = post('subject');
		$message   = post('message');
		$mobile    = post('mobile');

		if ($name == "" || $email == "" ||  $subject == "" ||  $message == "") {
			ms(array(
				'status'   => 'error',
				'message'  => 'Please fill in the required fields',
			));
		}

		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			ms(array(
				'status'   => 'error',
				'message'  => lang('invalid_name_format_only_leters_and_white_space_allowed'),
			));
        }	

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			ms(array(
				'status'   => 'error',
				'message'  => lang('please_enter_a_valid_email_address'),
			));
	    }

		switch ($subject) {

			case 'subject_order':
				$subject = lang("Order");

				$order_id = post("order_id");

				if($order_id == ""){
					ms(array(
						"status"  => "error",
						"message" => lang("order_id_field_is_required")
					));
				}

				$subject = $subject. " - ".$order_id;
				break;

			case 'subject_payment':
				$subject = "Payment";
				$transaction_id = post("transaction_id");

				if($transaction_id == ""){
					ms(array(
						"status"  => "error",
						"message" => lang("transaction_id_field_is_required")
					));
				}
	
				$subject = $subject. " - ".$transaction_id;
				break;

			default:

				$subject = 'General';
				$order_id = post("order_id");
				if ($order_id != '') {
					$subject = $subject. " - ".$order_id;
				}

				break;
		}

		$admin_id = $this->model->get("id", $this->tb_users, "role = 'admin'", "id","ASC")->id;

		if ($admin_id == "") {
			ms(array(
				'status'   => 'error',
				'message'  => lang('There_was_an_error_processing_your_request_Please_try_again_later'),
			));
		}

		$subject = "{{website_name}}" ." - ".$subject;
		$template = [ 'subject' => $subject, 'message' => $message, 'type' => 'default'];
		if($mobile){
		 $from_email_data = ['from_email' => $email, 'from_email_name' => $name, 'from_mobile' => $mobile];
		}
		else {
		  $from_email_data = ['from_email' => $email, 'from_email_name' => $name];
		}
		$send_message = $this->model->send_mail_template($template, $admin_id, $from_email_data);
		if($send_message){
			ms(array(
				'status'   => 'error',
				'message'  => $send_message,
			));
		}

		ms(array(
			'status'   => 'success',
			'message'  => lang('thank_you_your_message_has_been_sent_successfully'),
		));

	}
	
}

