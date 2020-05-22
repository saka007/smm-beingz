<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class regular_model extends MY_Model {
	
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
		$this->db->where('status', 1);
		$this->db->order_by("sort", 'ASC');
		$query = $this->db->get();
		$social_networks = $query->result();
		if(!empty($social_networks)){
			$i = 0;
			foreach ($social_networks as $key => $row) {
				$i++;
				if ($i > 0) {

					$categories = $this->model->fetch("*", $this->tb_categories, ["status" => 1, 'sncate_id' => $row->id], 'id', 'ASC');

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
	
}
