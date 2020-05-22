<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class social_network_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_social_network;
	public $tb_services;

	public function __construct(){
		$this->tb_categories 	 = CATEGORIES;
		$this->tb_social_network = SOCIAL_NETWORK_CATEGORIES;
		parent::__construct();
	}



	function get_category_lists($total_rows = false, $status = "", $limit = "", $start = ""){
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select('*');
		$this->db->from($this->tb_social_network);
		$this->db->order_by('sort', 'ASC');

		$query = $this->db->get();
		if ($total_rows) {
			$result = $query->num_rows();
			return $result;
		}else{
			$result = $query->result();
			return $result;
		}
		return false;
	}

	function get_category_lists_by_search($k = ""){
		$k = trim(htmlspecialchars($k));
		if (get_role("user")) {
			$this->db->where("status", "1");
		}
		$this->db->select('*');
		$this->db->from($this->tb_social_network);

		if ($k != "" && strlen($k) >= 2) {
			$this->db->like("name", $k, 'both');
			$this->db->or_like("desc", $k, 'both');
		}
		$this->db->order_by('sort', 'ASC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
