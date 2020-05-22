<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class package extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_social_network;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories      = CATEGORIES;
		$this->tb_services        = SERVICES;
		$this->tb_api_providers   = API_PROVIDERS;
		$this->tb_social_network  = SOCIAL_NETWORK_CATEGORIES;
	}

	public function index($cate_url_slug = ""){
		$cate_url_slug = addslashes(trim($cate_url_slug));
		if (get_role('admin')) {
			# code...
			$exists_cate = $this->model->get('id, ids, name, url_slug, page_title, meta_keywords, meta_description, page_description', $this->tb_categories, ['url_slug' => $cate_url_slug]);
		}else{
			$exists_cate = $this->model->get('id, ids, name, url_slug, page_title, meta_keywords, meta_description, page_description', $this->tb_categories, ['url_slug' => $cate_url_slug , 'status' => 1]);
		}

		if(empty($exists_cate)){
			redirect(cn());
		}

		$services_by_cate_id = $this->model->fetch("*", $this->tb_services, ['cate_id' => $exists_cate->id], 'price', 'ASC');

		$data = array(
			"module"                  => get_class($this),
			"category"                => $exists_cate,
			"services"                => $services_by_cate_id,
			"page_title"              => $exists_cate->page_title,
			"page_meta_keywords"      => $exists_cate->meta_keywords,
			"page_meta_description"   => $exists_cate->meta_description,
		);
		$this->template->set_layout('user');
		$this->template->build("index", $data);
	}

	
}