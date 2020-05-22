<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class blog extends MX_Controller {
	public $tb_users;
	public $tb_blogs;
	public $tb_social_network;

	public function __construct(){
		parent::__construct();
		//Config Module
		$this->tb_users             = USERS;
		$this->tb_blogs             = BLOGS;
		$this->tb_social_network    = SOCIAL_NETWORK_CATEGORIES;
		
		$this->load->model('model', 'model');
		$this->load->model('blogs/blogs_model', 'blogs_model');
	}

	public function index(){
		$data = array(
			"module"     => get_class($this),
			'blogs'     => $this->blogs_model->get_blogs_list(false, 1),
		);
		$this->template->set_layout('user');
		$this->template->build("blog/index", $data);
	}

	public function detail($url_slug = ""){
		$url_slug = addslashes(trim($url_slug));
		if (get_role('admin')) {
			$blog = $this->model->get('*', $this->tb_blogs, ['url_slug' => $url_slug]);
		}else{
			$blog = $this->model->get('*', $this->tb_blogs, ['url_slug' => $url_slug, 'status' => 1]);
		}

		if(empty($blog)){
			redirect(cn('blog'));
		}

		$data = array(
			"module"        => get_class($this),
			"blog"          => $blog,
			"categories"    => $this->blogs_model->get_count_blogs_by_category(),
			"related_posts" => $this->model->fetch('ids, title, category, url_slug, image, meta_keywords, meta_description, created', $this->tb_blogs, "category = '{$blog->category}' AND status = 1 AND id != '{$blog->id}'", 'created', 'DECSC', 0, 5),
			"page_title"              => $blog->title,
			"page_meta_keywords"      => $blog->meta_keywords,
			"page_meta_description"   => $blog->meta_description,
		);
		$this->template->set_layout('user');
		$this->template->build("blog/blog_detail", $data);
	}

	public function category($type = ""){
		$blogs = $this->model->fetch('*', $this->tb_blogs, ['category' => $type, 'status' => 1]);
		if(empty($blogs)){
			redirect(cn('blog'));
		}
		$data = array(
			"module"     => get_class($this),
			"blogs"      => $blogs,
		);
		$this->template->set_layout('user');
		$this->template->build("blog/index", $data);
	}

}