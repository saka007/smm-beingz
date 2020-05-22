<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class provider_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_social_network;
	public $tb_orders;

	public function __construct(){
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_api_providers   	= API_PROVIDERS;
		$this->tb_social_network    = SOCIAL_NETWORK_CATEGORIES;
		$this->tb_orders     		= ORDER;
		parent::__construct();
	}

	function get_api_lists($status = false){
		$data  = array();
		if ($status) {
			$this->db->where("status", 1);
		}
		$this->db->select("*");
		$this->db->from($this->tb_api_providers);
		$this->db->order_by("id", 'ASC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_all_orders(){
		$where = "(o.status = 'pending' or o.status = 'inprogress')";
		$this->db->select("o.id, o.ids, o.uid, o.type, o.cate_id, o.service_id, o.service_type, o.api_provider_id, o.api_order_id, o.status, o.charge, o.link, o.quantity, o.start_counter, o.remains, o.note, s.api_service_id as api_service_id");
		$this->db->from($this->tb_orders." o");
		$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');
		$this->db->where($where);
		$this->db->where("o.api_provider_id !=", 0);
		$this->db->where("o.api_order_id =", -1);
		$this->db->order_by("o.id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_all_orders_status(){
		$where = "(`status` = 'active' or `status` = 'processing' or `status` = 'inprogress'  or `status` = 'pending') AND `api_provider_id` != 0 AND `api_order_id` > 0 AND `changed` < '".NOW."' AND service_type != 'subscriptions'";
		$this->db->select("*");
		$this->db->from($this->tb_orders);
		$this->db->where($where);
		$this->db->order_by("id", 'ASC');
		$this->db->limit(15,0);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_all_subscriptions_status(){
		$where = "(`sub_status` = 'Active' or `sub_status` = 'Paused') AND `api_provider_id` != 0 AND `api_order_id` > 0 AND `changed` < '".NOW."' AND service_type = 'subscriptions'";
		$this->db->select("*");
		$this->db->from($this->tb_orders);
		$this->db->where($where);
		$this->db->order_by("id", 'ASC');
		$this->db->limit(15,0);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_categories_list_by_social_network(){
		$data  = array();
		$this->db->select("id, ids, name");
		$this->db->from($this->tb_social_network);
		$this->db->order_by("sort", 'ASC');
		$query = $this->db->get();
		$social_networks = $query->result();
		if(!empty($social_networks)){
			$i = 0;
			foreach ($social_networks as $key => $row) {
				$i++;
				if ($i > 0) {
					$categories = $this->model->fetch("id, ids,sncate_id, name", $this->tb_categories, ['sncate_id' => $row->id], 'id', 'ASC');
					if(!empty($categories)){
						$social_networks[$key]->categories = $categories;
					}else{
						unset($social_networks[$key]);	
					}
				}else{
					break;
				}
			}
		}
		return array_values($social_networks);
	}
}
