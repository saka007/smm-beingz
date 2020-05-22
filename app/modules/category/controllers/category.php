<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class category extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_social_network;
	public $tb_services;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		//Config Module
		$this->tb_categories     = CATEGORIES;
		$this->tb_services       = SERVICES;
		$this->tb_social_network = SOCIAL_NETWORK_CATEGORIES;
		$this->module_name   = 'Category';
		$this->module_icon   = "fa ft-users";
		$this->columns = array(
			"name"             => lang("Name"),
			"url_slug"         => 'Url Slug',
			"sort"             => lang("Sorting"),
			"status"           => lang("Status"),
		);
	}

	public function index(){

		$all_social_networks = $this->model->get_category_lists();
		$social_networks 	 = $this->model->fetch("id, ids, name", $this->tb_social_network, 'status = 1');
		$data = array(
			"module"              => get_class($this),
			"columns"             => $this->columns,
			"all_social_networks" => $all_social_networks,
			"social_networks"     => $social_networks,
		);
		$this->template->build('index', $data);
	}

	public function update($ids = ""){

		$category = $this->model->get("*", $this->tb_categories, "ids = '{$ids}'");

		$data = array(
			"module"          => get_class($this),
			"category"        => $category,
			"social_networks" => $this->model->fetch('id, ids, name',$this->tb_social_network, ['status' => 1], 'sort', 'ASC'),
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$name 		            = post("name");
		$image	                = post("image");
		$sort 		            = (int)post("sort");
		$status 	            = (int)post("status");
		$required_field 	    = post("required_field");
		$page_title 		    = post("page_title");
		$meta_keywords 		    = post("meta_keywords");
		$meta_description 		= post("meta_description");
		$page_description 		= $this->input->post('page_description');
		$page_description 		= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8');
		
		//$page_description 		= htmlentities(post("page_description"));
		$url_slug 		        = post("url_slug");
		$sncate_id 		        = post("social_network");
		
		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		if($sort == "" || $sort <= 0){
			ms(array(
				"status"  => "error",
				"message" => lang("sort_number_must_to_be_greater_than_zero")
			));
		}

		if($required_field == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("the_name_of_required_field_is_required")
			));
		}

		/*----------  Get Url Slug  ----------*/
		if ($url_slug == "") {
			if (str_word_count($name) < 2) {
				ms(array(
					"status"  => "error",
					"message" => 'The package name must be greater than 2 words'
				));
			}
			$url_slug = strtolower(url_title($name, 'dash'));
		}

		if (strpos($url_slug, '-') === false) {
			if (str_word_count($name) >= 2) { 
				$url_slug = strtolower(url_title($name, 'dash'));
			}else{
				ms(array(
					"status"  => "error",
					"message" => 'The name must be greater than 2 words'
				));
			}
		}

		if ($page_title  == "" || $meta_keywords  == "" || $meta_description  == "") {
			ms(array(
				"status"  => "error",
				"message" => 'Page Title, Meta Keywords and Meta description are required fields!'
			));
		}
		
		$data = array(
			"uid"                          => session('uid'),
			"sncate_id"                    => $sncate_id,
			"name"                         => $name,
			"required_field"               => $required_field,
			"page_title"                   => $page_title,
			"meta_keywords"                => $meta_keywords,
			"meta_description"             => $meta_description,
			"page_description"             => $page_description,
			"status"                       => $status,
			"sort"                         => $sort,
		);

		$check_item = $this->model->get("id, ids", $this->tb_categories, "ids = '{$ids}'");
		
		if(empty($check_item)){
			/*----------  check URL exist or not  ----------*/
			$exist_url_slug = $this->model->get('id', $this->tb_categories, ['url_slug' => $url_slug]);
			if(!empty($exist_url_slug)){
				ms(array(
					"status"  => "error",
					"message" => 'A Url slug with this name does already exist. Please choose another name or URL Slug!'
				));
			}
			$data["ids"]      = ids();
			$data["url_slug"] = $url_slug;
			$data["changed"]  = NOW;
			$data["created"]  = NOW;
			
			$this->db->insert($this->tb_categories, $data);

		}else{
			$exist_url_slug = $this->model->get('id', $this->tb_categories, '`url_slug` = "'.$url_slug.'" AND `id`!= "'.$check_item->id.'"');
			if(!empty($exist_url_slug)){
				ms(array(
					"status"  => "error",
					"message" => 'A Url slug with this name does already exist. Please choose another name or URL Slug!'
				));
			}
			$data["url_slug"] = $url_slug;
			$data["changed"]  = NOW;
			$this->db->update($this->tb_categories, $data, array("id" => $check_item->id));
			if ($status != 1 ) {
				$this->db->update($this->tb_services, ["status" => 0], ["cate_id" => $check_item->id]);
			}
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}
	
	public function ajax_search(){
		$k = post("k");
		$categories = $this->model->get_category_lists_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"categories" => $categories,
			"cate_id"    => 1,
		);
		$this->load->view("ajax/search", $data);
	}
	
	public function ajax_sort_by($id){
		$data = array(
			"module"     			=> get_class($this),
			"columns"    			=> $this->columns,
			"social_network_name"  	=> get_field($this->tb_social_network, ['id' => $id], 'name'),
			"categories"   			=> $this->model->get_categories_by_social_network_id($id),
			"cate_id"    			=> $id,
		);

		$this->load->view("ajax/search", $data);
	}

	public function ajax_load_categories_by_social_network($id){
		$data = array(
			"module"     	=> get_class($this),
			"columns"    	=> $this->columns,
			"categories"   	=> $this->model->get_categories_by_social_network_id($id),
			"cate_id"    	=> $id,
		);
		$this->load->view("ajax/load_services_by_cate", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_categories, $ids, false);
	}

	public function ajax_actions_option(){
		$type = post("type");
		$idss = post("ids");
		if ($type == '') {
			ms(array(
				"status"  => "error",
				"message" => lang('There_was_an_error_processing_your_request_Please_try_again_later')
			));
		}

		if (in_array($type, ['delete', 'deactive', 'active']) && empty($idss)) {
			ms(array(
				"status"  => "error",
				"message" => lang("please_choose_at_least_one_item")
			));
		}
		switch ($type) {
			case 'delete':
				foreach ($idss as $key => $ids) {
					/*----------  delete all related services  ----------*/
					$item = $this->model->get("id, ids", $this->tb_categories, ['ids' => $ids]);
					if (!empty($item)) {
						$this->db->delete($this->tb_services, ["cate_id" => $item->id]);
					}
					$this->db->delete($this->tb_categories, ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Deleted_successfully")
				));
				break;
			case 'deactive':
				foreach ($idss as $key => $ids) {
					/*----------  deactive all related services  ----------*/
					$item = $this->model->get("id, ids", $this->tb_categories, ['ids' => $ids]);
					if (!empty($item)) {
						$this->db->update($this->tb_services, ['status' => 0], ["cate_id" => $item->id]);
					}

					$this->db->update($this->tb_categories, ['status' => 0], ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Updated_successfully")
				));
				break;

			case 'active':
				foreach ($idss as $key => $ids) {
					/*----------  active all related services  ----------*/
					$item = $this->model->get("id, ids", $this->tb_categories, ['ids' => $ids]);
					if (!empty($item)) {
						$this->db->update($this->tb_services, ['status' => 1], ["cate_id" => $item->id]);
					}

					$this->db->update($this->tb_categories, ['status' => 1], ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Updated_successfully")
				));
				break;


			case 'all_deactive':
				$categories = $this->model->fetch("id, ids", $this->tb_categories, ['status' => 0]);
				if (empty($categories)) {
					ms(array(
						"status"  => "error",
						"message" => lang("failed_to_delete_there_are_no_deactivate_category_now")
					));
				}

				/*----------  delete all related services  ----------*/
				foreach ($categories as $key => $row) {
					$item = $this->model->get("id, ids", $this->tb_categories, ['ids' => $row->ids]);
					if (!empty($item)) {
						$this->db->delete($this->tb_services, ["cate_id" => $item->id, 'status' => 0]);
					}
				}

				$this->db->delete($this->tb_categories, ['status' => 0]);
				ms(array(
					"status"  => "success",
					"message" => lang("Deleted_successfully")
				));

				break;
			
			default:
				ms(array(
					"status"  => "error",
					"message" => lang('There_was_an_error_processing_your_request_Please_try_again_later')
				));
				break;
		}

	}
}