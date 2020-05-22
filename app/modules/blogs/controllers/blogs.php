<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class blogs extends MX_Controller {
	public $tb_users;
	public $tb_blogs;
	public $tb_social_network;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users             = USERS;
		$this->tb_blogs             = BLOGS;
		$this->tb_social_network    = SOCIAL_NETWORK_CATEGORIES;
		$this->columns = array(
			"title"                          => lang('Title'),
			"image_thumbnail"                => lang('Image_thumbnail'),
			"category"                       => lang('Post_Category'),
			"created"                        => lang("Created"),
			"sort"                           => lang('Sort'),
			"status"                         => lang('Status'),
		);
	}

	public function index(){
		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = array();
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}
		$config = array(
			'base_url'           => cn(get_class($this).$query_string),
			'total_rows'         => $this->model->get_blogs_list(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		$blogs = $this->model->get_blogs_list(false, "all", $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"blogs"        => $blogs,
			"pagination"   => $pagination,
		);
		$this->template->build("index", $data);
	}

	public function update($ids = ""){
		$blog = $this->model->get("*", $this->tb_blogs, "ids = '{$ids}'");
		$data = array(
			"module"          => get_class($this),
			"blog"            => $blog,
			"social_networks" => $this->model->fetch('id, ids, name', $this->tb_social_network, ['status' => 1], 'sort', 'ASC'),
		);
		$this->template->build('update', $data);
	}

	public function ajax_update($ids = ""){
		$title 		            = post("title");
		$image	                = post("image");
		$sort 		            = post("sort");
		$status 	            = (int)post("status");
		$title 		            = post("title");
		$url_slug 		        = post("url_slug");
		$category 		        = post("category");
		$content 		        = $this->input->post('content');
		$content 		        = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
		if($title == ""){
			ms(array(
				"status"  => "error",
				"message" => lang('article_title_is_required')
			));
		}

		if($sort == "" || $sort <= 0){
			ms(array(
				"status"  => "error",
				"message" => lang("sort_number_must_to_be_greater_than_zero")
			));
		}

		if ($image == "") {
			ms(array(
				"status"  => "error",
				"message" => lang('image_not_a_valid_url')
			));
		}

		if (filter_var($image, FILTER_VALIDATE_URL) === FALSE) {
		    ms(array(
				"status"  => "error",
				"message" => lang('image_not_a_valid_url')
			));
		}

		if ($category == "") {
			ms(array(
				"status"  => "error",
				"message" => lang('category_is_required')
			));
		}

		if ($content == "") {
			ms(array(
				"status"  => "error",
				"message" => lang('article_description_is_required')
			));
		}

		$data = array(
			"uid"                          => session('uid'),
			"title"                        => $title,
			"category"                     => $category,
			"content"                      => $content,
			"meta_keywords"                => post('meta_keywords'),
			"meta_description"             => post('meta_description'),
			"content"                      => $content,
			"image"                        => $image,
			"sort"                         => $sort,
			"status"                       => $status,
			"changed"                      => NOW,
		);

		$check_item = $this->model->get("id, ids", $this->tb_blogs, "ids = '{$ids}'");
		if(empty($check_item)){
			/*----------  check URL exist or not  ----------*/
			$url_slug = strtolower(url_title($title, 'dash'));
			$exist_url_slug = $this->model->get('id', $this->tb_blogs, ['url_slug' => $url_slug]);
			if(!empty($exist_url_slug)){
				ms(array(
					"status"  => "error",
					"message" => lang('a_url_slug_with_this_title_does_already_exist_please_choose_another_title')
				));
			}
			$data["ids"]      = ids();
			$data["created"]  = NOW;
			$data["url_slug"] = $url_slug;
			$this->db->insert($this->tb_blogs, $data);

		}else{
			// check Url Slug
			if ($url_slug == "") {
				ms(array(
					"status"  => "error",
					"message" => lang('url_slug_is_required')
				));
			}

			$url_slug = strtolower(url_title($url_slug, 'dash'));
			$exist_url_slug = $this->model->get('id', $this->tb_blogs, '`url_slug` = "'.$url_slug.'" AND `id`!= "'.$check_item->id.'"');
			if(!empty($exist_url_slug)){
				ms(array(
					"status"  => "error",
					"message" => lang('a_url_slug_with_this_title_does_already_exist_please_choose_another_title')
				));
			}
			$data["url_slug"] = $url_slug;


			$this->db->update($this->tb_blogs, $data, array("id" => $check_item->id));
			
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}
	
	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_blogs, $ids, false);
	}

}