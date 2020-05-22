<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class client extends MX_Controller {
	public $tb_users;
	public $tb_order;
	public $tb_categories;
	public $tb_services;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		//Config Module
		$this->tb_users               = USERS;
		$this->tb_order               = ORDER;
		$this->tb_categories          = CATEGORIES;
		$this->tb_services            = SERVICES;
		$this->module_name            = 'Order';
		$this->module_icon            = "fa ft-users";
	}


	/**
	 *
	 * Form get client id
	 *
	 */
	public function index(){
		$data = array(
			"module"   => get_class($this),
		);
		$this->template->set_layout('user');
		$this->template->build("index", $data);
	}

	public function ajax_get_client_orders(){
		$email = post('email');

		if ($email == "") {
			ms(array(
				'status'  => 'error',
				'message' => lang('please_enter_a_valid_email_address'),
			));
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			ms(array(
				'status'   => 'error',
				'message'  => lang('please_enter_a_valid_email_address'),
			));
	    }

	    $data = array(
	    	'module'  => get_class($this),
	    	'orders'  => $this->model->get_client_orders_by($email),
	    );

		$this->load->view("ajax_get_client_orders", $data);
	}

	public function terms(){
		$data = array();
		$this->template->set_layout('user');
		$this->template->build("terms/index", $data);
	}

	public function faq(){
		$this->load->model('faqs/faqs_model', 'faqs_model');
		$faqs = $this->faqs_model->get_faqs();
		$data = array(
			"module"     => get_class($this),
			"faqs"       => $faqs,
		);
		$this->template->set_layout('user');
		$this->template->build("faq/index", $data);
	}
	
}