<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_order;
	public $tb_social_network;

	public function __construct(){
		$this->tb_categories     = CATEGORIES;
		$this->tb_services       = SERVICES;
		$this->tb_api_providers  = API_PROVIDERS;
		$this->tb_order          = ORDER;
		$this->tb_social_network = SOCIAL_NETWORK_CATEGORIES;
		parent::__construct();
	}

	function get_order_by_id($id){
		$this->db->select("o.id, o.quantity, o.link, s.name as service_name");
		$this->db->from($this->tb_order." o");
		$this->db->join($this->tb_services." s", "o.service_id = s.id", 'left');
		$this->db->where('o.id', $id);
		$query  = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function get_service_detail_by($id){
		$this->db->select('s.*, cate.required_field');
		$this->db->from($this->tb_services." s");
		$this->db->join($this->tb_categories." cate", "s.cate_id = cate.id", 'left');
		$this->db->where("s.id", $id);
		$this->db->where("s.status", 1);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
}
