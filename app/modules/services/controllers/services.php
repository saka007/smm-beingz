<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class services extends MX_Controller {
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
		$this->module_name        = 'Services';
		$this->module_icon        = "fa ft-users";

        if (get_role("admin") || get_role("supporter")) {
			$this->columns = array(
				"name"             => lang("Name"),
				"price"            => 'Price',
				"quantity"         => 'Quantity',
				"add_type"         => lang("Type"),
				"provider"         => lang("api_provider"),
				"api_service_id"   => lang("api_service_id"),
				"original_price"   => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
				"min_max"          => lang("min__max_order"),
				"status"           => lang("Status"),
			);
		}				
	}

	public function index(){
		$all_services = $this->model->get_services_list();
		$categories_by_social_network = $this->model->get_categories_list_by_social_network();

		$data = array(
			"module"                         => get_class($this),
			"columns"                        => $this->columns,
			"all_services"                   => $all_services,
			"categories_by_social_network"   => $categories_by_social_network,
		);
		
		if (!session('uid')) {
			$this->template->set_layout('general_page');
			$this->template->build("index", $data);
		}
		$this->template->build('index', $data);
	}

	public function update($ids = ""){
		$service        = $this->model->get("*", $this->tb_services, "ids = '{$ids}' ");
		$categories     = $this->model->fetch("*", $this->tb_categories, "status = 1", 'sort','ASC');
		$categories_by_social_network = $this->model->get_categories_list_by_social_network();
		$api_providers  = $this->model->fetch("*", $this->tb_api_providers, "status = 1", 'id','ASC');
		$data = array(
			"module"   			                => get_class($this),
			"service" 			                => $service,
			"categories" 		                => $categories,
			"categories_by_social_network" 		=> $categories_by_social_network,
			"api_providers" 	                => $api_providers,
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$name 		        = post("name");
		$category	        = post("category");
		$quantity	        = post("quantity");
		
		$service_type	    = post("service_type");
		$add_type			= post("add_type");
		$price	            = (float)post("price");
		$status 	        = (int)post("status");
		$desc 		        = post("desc");

		$desc = trim($desc);
		$desc = stripslashes($desc);
		// $desc = utf8_encode($desc);
		$desc = htmlspecialchars($desc, ENT_QUOTES);

		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}	

		if($quantity == ""){
			ms(array(
				"status"  => "error",
				"message" => 'Quantity is required'
			));
		}

		if($category == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("category_is_required")
			));
		}

		if($price == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid")
			));
		}

		$decimal_places = get_option("auto_rounding_x_decimal_places", 2);
		if(strlen(substr(strrchr($price, "."), 1)) > $decimal_places || strlen(substr(strrchr($price, "."), 1)) < 0){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid_format")
			));
		}

		$data = array(
			"uid"             => session('uid'),
			"cate_id"         => $category,
			"type"            => 'default',
			"price"           => $price,
			"quantity"        => $quantity,
			"name"            => $name,
			"desc"            => $desc,
			"status"          => $status,
		);

		/*----------  Fields for Service API type  ----------*/
		switch ($add_type) {
			case 'api':
				$min	            = post("min");
				$max	            = post("max");

				if($quantity < $min){
					ms(array(
						"status"  => "error",
						"message" => "Quantity must to be greater than min order"
					));
				}

				if($quantity > $max){
					ms(array(
						"status"  => "error",
						"message" => "Quantity must to be less than max order"
					));
				}
				
				$original_price	     = post("original_price");
				$api_provider_id	 = post("api_provider_id");
				$api_service_id	     = post("api_service_id");
				$api = $this->model->get("ids", $this->tb_api_providers, ['id' => $api_provider_id, 'status' => 1]);
				if (empty($api)) {
					ms(array(
						"status"  => "error",
						"message" => lang("api_provider_does_not_exists")
					));
				}

				if ($api_service_id == "") {
					ms(array(
						"status"  => "error",
						"message" => 'API Service ID invalid format'
					));
				}

				$data['api_provider_id'] = $api_provider_id;
				$data['api_service_id']  = $api_service_id;
				$data['min']             = $min;
				$data['max']             = $max;
				$data['original_price']  = $original_price;
				break;
			
			default:
				$data['api_provider_id'] = "";
				$data['api_service_id']  = "";
				$data['min']             = "";
				$data['max']             = "";
				$data['original_price']  = "";
				break;
		}
		$data['add_type']        = $add_type;
		$check_item = $this->model->get("ids", $this->tb_services, "ids = '{$ids}'");
		if(empty($check_item)){
			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;

			$this->db->insert($this->tb_services, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_services, $data, array("ids" => $check_item->ids));
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}
	
	public function ajax_search(){
		$k = post("k");
		$services = $this->model->get_services_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"services"   => $services,
			"cate_id"    => 1,
		);
		$this->load->view("ajax/search", $data);
	}
	
	public function ajax_service_sort_by_cate($id){
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"cate_name"  => get_field($this->tb_categories, ['id' => $id], 'name'),
			"services"   => $this->model->get_services_by_cate_id($id),
			"cate_id"    => $id,
		);
		$this->load->view("ajax/search", $data);
	}

	public function ajax_load_services_by_cate($id){

		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"services"   => $this->model->get_services_by_cate_id($id),
			"cate_id"    => $id,
		);
		$this->load->view("ajax/load_services_by_cate", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_services, $ids, false);
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
					$this->db->delete($this->tb_services, ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Deleted_successfully")
				));
				break;
			case 'deactive':
				foreach ($idss as $key => $ids) {
					$this->db->update($this->tb_services, ['status' => 0], ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Updated_successfully")
				));
				break;

			case 'active':
				foreach ($idss as $key => $ids) {
					$this->db->update($this->tb_services, ['status' => 1], ['ids' => $ids]);
				}
				ms(array(
					"status"  => "success",
					"message" => lang("Updated_successfully")
				));
				break;


			case 'all_deactive':
				$deactive_services = $this->model->fetch("*", $this->tb_services, ['status' => 0]);
				if (empty($deactive_services)) {
					ms(array(
						"status"  => "error",
						"message" => lang("failed_to_delete_there_are_no_deactivate_service_now")
					));
				}
				$this->db->delete($this->tb_services, ['status' => 0]);
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


	/**
	 *
	 * Get Services list from API
	 *
	 */
	
	public function ajax_get_services_from_api($id = ""){
		$api_id  = post('api_id');
		$api     = $this->model->get("id, name, type, ids, url, key",  $this->tb_api_providers, ['id' => $api_id, 'status' => 1]);
		if (!empty($api)) {

			$data_post = array(
				'key' => $api->key,
	            'action' => 'services',
			);
			$response = $this->connect_api($api->url, $data_post);
			$response = json_decode($response);
			$data = array(
				"module"   		        => get_class($this),
				"services" 		        => $response,
				"api_service_id" 		=> (isset($_POST['api_service_id'])) ? post('api_service_id') : '',
			);
			$this->load->view('ajax/get_services_from_api', $data);
		}		
	}

	private function connect_api($url, $post = array("")) {
        $_post = Array();

        if (is_array($post)) {
          foreach ($post as $name => $value) {
            $_post[] = $name.'='.urlencode($value);
          }
        }

        if (is_array($post)) {
          $url_complete = join('&', $_post);
        }
        $url = $url."?".$url_complete;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'API (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
          $result = false;
        }
        curl_close($ch);
        return $result;
    }
}