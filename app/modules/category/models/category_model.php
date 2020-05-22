<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_social_network;
	public $tb_services;

	public function __construct(){
		$this->tb_categories     = CATEGORIES;
		$this->tb_social_network = SOCIAL_NETWORK_CATEGORIES;
		parent::__construct();
	}


	function get_category_lists($require_data = false){
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
					if (get_role('admin') || get_role('supporter')) {
						$categories = $this->model->fetch("*", $this->tb_categories, ['sncate_id' => $row->id], 'sort', 'ASC');
					}else{
						$categories = $this->model->fetch("*", $this->tb_categories, ["status" => 1, 'sncate_id' => $row->id], 'sort', 'ASC');
					}

					if(!empty($categories)){
						$social_networks[$key]->is_exists_categories = 1;
						if ($require_data) {
							$social_networks[$key]->categories = $categories;
						}
					}else{
						unset($social_networks[$key]);
					}
				}else{
					break;
				}
			}
		}
		return $social_networks;
	}

	function get_category_lists_by_search($k){
		$k = trim(htmlspecialchars($k));
		$this->db->select('c.*, sn.name as social_network_name');
		$this->db->from($this->tb_categories." c");
		$this->db->join($this->tb_social_network." sn", "sn.id = c.sncate_id", 'left');

		if ($k != "" && strlen($k) >= 2) {
			$this->db->where("(`c`.`name` LIKE '%".$k."%' ESCAPE '!' OR  `sn`.`name` LIKE '%".$k."%' ESCAPE '!')");
		}
		$this->db->order_by("c.id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	
	
	function get_categories_by_social_network_id($id){

		$this->db->select('c.*, sn.name as social_network_name');
		$this->db->from($this->tb_categories." c");
		$this->db->join($this->tb_social_network." sn", "sn.id = c.sncate_id", 'left');

		$this->db->where("c.sncate_id", $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
