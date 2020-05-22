<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class users extends MX_Controller {
	public $tb_users;
	public $tb_user_mail_logs;
	public $tb_categories;
	public $tb_transaction_logs;
	public $tb_services;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories            = CATEGORIES;
		$this->tb_services              = SERVICES;
		$this->tb_users                 = USERS;
		$this->tb_transaction_logs      = TRANSACTION_LOGS;
		$this->tb_user_mail_logs        = USER_MAIL_LOGS;
		$this->module_name   = 'Users';
		$this->module_icon   = "fa ft-users";
		$this->columns = array(
			"name"                           => lang('Customer'),
			"total_order"                    => lang('Total_Order'),
			"total_spent"                    => lang('Total_Spent'),
			"last_history_ip"                => lang('last_ip_adress'),
			"note"                           => lang('Note'),
			"last_order"                     => lang('Last_Order'),
			"created"                        => lang("Created"),
		);
	}

	public function index(){

		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = array();
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}
		$config = array(
			'base_url'           => cn(get_class($this).$query_string),
			'total_rows'         => $this->model->get_users_list(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		$users = $this->model->get_users_list(false, "all", $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"users"        => $users,
			"pagination"   => $pagination,
		);

		$this->template->build('index', $data);
	}

	public function update($ids = ""){
		$user    = $this->model->get("*", $this->tb_users, "ids = '{$ids}' ");
		$data = array(
			"module"    => get_class($this),
			"user" 		=> $user,
		);
		$this->load->view('update', $data);
	}

	public function mail($ids = ""){
		$user    = $this->model->get("ids, first_name, last_name, email", $this->tb_users, "ids = '{$ids}' ");

		$data = array(
			"module"    => get_class($this),
			"user" 		=> $user,
		);
		$this->load->view('mail_to_user', $data);
	}

	public function ajax_update($ids = ""){
		$description        = post('description');

		$description = trim($description);
		$description = stripslashes($description);
		$description = htmlspecialchars($description, ENT_QUOTES);
		$data = array(
			"description"    => $description,
		);

		if($ids != ''){
			$checkUser = $this->model->get('id, ids, email', $this->tb_users, "`ids` = '{$ids}'");

			if(empty($checkUser)){
				ms(array(
					'status'  => 'error',
					'message' => lang("There_was_an_error_processing_your_request_Please_try_again_later"),
				));
			}
			if($this->db->update( $this->tb_users, $data ,"ids = '{$ids}'")){
				ms(array(
					'status'  => 'success',
					'message' => lang("Update_successfully"),
				));
			}
		}
	}
	
	public function ajax_send_email(){
		$user_email       = post("email_to");
		$subject          = post("subject");
		$email_content    = post("email_content");

		if($subject == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("subject_is_required"),
			));
		}

		if($email_content == ''){
			ms(array(
				'status'  => 'error',
				'message' => lang("message_is_required"),
			));
		}

		$user = $this->model->get("id, email", $this->tb_users, "email = '{$user_email}'");
		if (!empty($user)) {

			$subject = "{{website_name}}" ." - ".$subject;
			$template = [ 'subject' => $subject, 'message' => $email_content, 'type' => 'default'];

			$check_email_issue = $this->model->send_mail_template($template, $user->id);
			if ($check_email_issue) {
				ms(array(
					"status"  => "error",
					"message" => $check_email_issue,
				));
			}

			if ($this->db->table_exists($this->tb_user_mail_logs)) {
				$data = array(
					'ids'                 => ids(),
					'uid'                 => session('uid'),
					'received_uid'        => $user->id,
					'subject'             => post("subject"),
					'content'             => htmlspecialchars(@$email_content, ENT_QUOTES),
					'created'             => NOW,
					'changed'             => NOW,
				);
				$this->db->insert($this->tb_user_mail_logs, $data);
			}

			ms(array(
				"status"  => "success",
				"message" => lang("your_email_has_been_successfully_sent_to_user"),
			));
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("the_account_does_not_exists"),
			));
		}
	}

	public function ajax_search(){
		$k = post("k");
		$users = $this->model->get_users_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"users"   => $users,
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_users, $ids, false);
	}

}