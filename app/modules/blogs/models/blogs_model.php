<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogs_model extends MY_Model {
	public $tb_users;
	public $tb_blogs;
	public $tb_social_network;

	public function __construct(){
		parent::__construct();
		$this->tb_users             = USERS;
		$this->tb_blogs             = BLOGS;
		$this->tb_social_network    = SOCIAL_NETWORK_CATEGORIES;
	}

	function get_blogs_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		if ($status == 1) {
			$this->db->where('status', 1);
		}
		$this->db->select("*");
		$this->db->from($this->tb_blogs);
		$this->db->order_by("id", 'DESC');
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

	function get_count_blogs_by_category(){
		$this->db->select("name");
		$this->db->from($this->tb_social_network);
		$this->db->where('status', 1);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get();
		$data = $query->result();
		$data[] = (object)array(
			'name' => 'other',
		);
		if (!empty($data)) {
			foreach ($data as $key => $row) {
				$sql  = "SELECT * FROM {$this->tb_blogs} where category = '{$row->name}' AND status = 1";
				$query = $this->db->query($sql);
				$count = $query->num_rows();
				if ($count > 0) {
					$data[$key]->count = $count;
				}else{
					unset($data[$key]);
				}
			}
		}
		return $data;
	}
}
