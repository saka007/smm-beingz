<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class file_manager extends MX_Controller {
	public $tb_file_manage;
	
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->tb_file_manage = FILE_MANAGER;
	}

	public function index(){
		redirect(cn());	
	}

	public function upload_files(){

		$upload_folder = post('folder');
		if ($upload_folder != "") {
			get_upload_folder($upload_folder);
			$path  = './assets/uploads/'.$upload_folder;
		}else{
			get_upload_folder();
			$path  = './assets/uploads/user'.sha1(session("uid"));
		}

		$allowed_types = 'gif|jpg|png';
		$max_size      = 10*1024;
		$width         = 1024;
		$height        = 768;

		// config
		$config = array(
			'upload_path'   => $path,			
			'allowed_types' => $allowed_types,			
			'max_size'      => $max_size,			
			'width'         => $width,			
			'encrypt_name'  => (isset($_POST['encrypt_name']) && $_POST['encrypt_name'] == 0) ? false : true,			
		);

		if(!empty($_FILES)){
			$files = $_FILES;
			for ($i=0; $i< count($_FILES['files']['name']); $i++) { 
		        $_FILES['files']['name']= $files['files']['name'][$i];
		        $_FILES['files']['type']= $files['files']['type'][$i];
		        $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
		        $_FILES['files']['error']= $files['files']['error'][$i];
		        $_FILES['files']['size']= $files['files']['size'][$i];


				// load libary;
				$this->load->library('upload', $config);

				$this->upload->initialize($config);
		        if ( ! $this->upload->do_upload('files')){
		                ms(array(
		                	"status"  => "error",
		                	"message" => $this->upload->display_errors()
		                ));
		        }else{
		            $file_info = (object)$this->upload->data();
		            $data = array(
		            	"ids"           => ids(),
						"uid"           => session("uid"),
						"file_name"     => $file_info->file_name,
						"file_type"     => $file_info->file_type,
						"file_size"     => $file_info->file_size,
						"is_image"      => $file_info->is_image,
						"image_width"   => $file_info->image_width,
						"image_height"  => $file_info->image_height,
						"file_ext"      => str_replace(".", "",strtolower($file_info->file_ext)),
						"created"       => NOW,	
		            );
		            $this->db->insert($this->tb_file_manage, $data);
		            ms(array(
		            	"status"      => "success",
		            	"link"        => get_link_file($file_info->file_name, $upload_folder),
		            	"ids"         => $data["ids"],
		            	"message"     => lang('Upload_media_successfully'),
		            ));
		        }
			}
		}else{
			pr("Error",1);
		}

	}

	public function upload_files1(){
		get_upload_folder();

		$types = "";
		if(permission("photo_type") && permission("video_type")){
			$types = 'gif|jpg|jpeg|png|mp4';
		}else if(permission("photo_type")){
			$types = 'gif|jpg|jpeg|png';
		}else if(permission("video_type")){
			$types = 'mp4';
		}

		$config['upload_path']          = './assets/uploads/user'.sha1(session("uid"));
        $config['allowed_types']        = $types;
        $config['max_size']             = $this->max_size;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']         = TRUE;


        $this->load->library('upload', $config);
        
        if(!empty($_FILES)){
	        $files = $_FILES;
		    for($i=0; $i< count($_FILES['files']['name']); $i++){  
		        $_FILES['files']['name']= $files['files']['name'][$i];
		        $_FILES['files']['type']= $files['files']['type'][$i];
		        $_FILES['files']['tmp_name']= $files['files']['tmp_name'][$i];
		        $_FILES['files']['error']= $files['files']['error'][$i];
		        $_FILES['files']['size']= $files['files']['size'][$i];
		        
		        $this->model->get_storage("file", $_FILES['files']['size']/1024);
		        $this->upload->initialize($config);

		        if (!$this->upload->do_upload("files"))
		        {
	                ms(array(
	                	"status"  => "error",
	                	"message" => $this->upload->display_errors()
	                ));
		        }
		        else
		        {
		        	$info = (object)$this->upload->data();
		        	$data = array(
		        		"ids" => ids(),
		        		"uid" => session("uid"),
		        		"file_name" => $info->file_name,
		        		"image_type" => $files['files']['type'][$i],
		        		"file_ext" => str_replace(".", "", strtolower($info->file_ext)),
		        		"file_size" => $info->file_size,
		        		"is_image" => $info->is_image,
		        		"image_width" => (int)$info->image_width,
		        		"image_height" => (int)$info->image_height,
		        		"created" => NOW,
		        	);

		        	$this->db->insert(FILE_MANAGER, $data);

	                ms(array(
	                	"status"  => "success",
	                	"link"    => get_link_file($info->file_name)
	                ));
		        }
		    }
        }else{
        	load_404();
        }
	}

	public function elfinder_init() {
        $data['connector'] = cn('file_manager/elfinder_connector');
        $this->template->set_layout('blank_page');
		$this->template->build('elfinder', $data);
    }

    public function elfinder_connector() {
    	$upload_folder = 'blogs';

		if ($upload_folder != "") {
			get_upload_folder($upload_folder);
			$path  = APPPATH."../assets/uploads/". $upload_folder."/";
			$link  = BASE."assets/uploads/".$upload_folder."/";
		}else{
			get_upload_folder();
			$path  = './assets/uploads/user'.sha1(session("uid")).'/';
			$link  = BASE.'assets/uploads/user'.sha1(session("uid")).'/';
		}
        $opts = array(
            'roots' => array(
                array( 
                    'driver'        => 'LocalFileSystem',
                    'path'          => $path,
                    'URL'           => $link,
                    'uploadDeny'    => array('all'),                  // All Mimetypes not allowed to upload
                    'uploadAllow'   => array('image', 'text/plain', 'application/pdf'),// Mimetype `image` and `text/plain` allowed to upload
                    'uploadOrder'   => array('deny', 'allow'),        // allowed Mimetype `image` and `text/plain` only
                    'accessControl' => array($this, 'elfinderAccess'),// disable and hide dot starting files (OPTIONAL)
                    // more elFinder options here
                ) 
            ),
        );
        $connector = new elFinderConnector(new elFinder($opts));
        $connector->run();
    }
    
    public function elfinderAccess($attr, $path, $data, $volume, $isDir, $relpath)
    {
        $basename = basename($path);
        return $basename[0] === '.'                  // if file/folder begins with '.' (dot)
                 && strlen($relpath) !== 1           // but with out volume root
            ? !($attr == 'read' || $attr == 'write') // set read+write to false, other (locked+hidden) set to true
            :  null;                                 // else elFinder decide it itself
    }


}