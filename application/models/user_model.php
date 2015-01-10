<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User_model extends CI_Model{
			
//      <!----------------------------------------REGISTRATION-------------------------------------------!>
	function add_user($firstname,$lastname,$username,$password,$emailaddress)
	{
		$sha1 = sha1($password);
		$add_user = "INSERT INTO user(first_name,last_name,username,password,email_address) values (?,?,?,?,?)";
		$this->db->query($add_user,array($firstname,$lastname,$username,$sha1,$emailaddress));
	}
//		<!---------------------------------------------END------------------------------------------------!>		
		
		
		
		
		
//      <!-------------------------------------Ckeck user log in-----------------------------------------!>
	function check_user($username,$password)
	{
		$shapass = sha1($password);
		$check_user = "SELECT * from user WHERE username=? and password=?";
		$checker = $this->db->query($check_user,array($username,$shapass));
		if($checker->num_rows == 1)
		{
			return $checker->row(0)->id;
		}
		else
		{
			return false;
		}
	}
//		<!---------------------------------------------END------------------------------------------------!>
		
	var $gallery_path;
	var $gallery_path_url;
	
	function User_model()
	{
		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url(). 'images/';
	}
	
	
	function do_upload()
	{
		$config =  array(
				//'upload_path' => './.images/',
				'allowed_types' => '|gif|jpeg|jpg|png',
				'upload_path' => $this->gallery_path,
				'max_size'	=> 2000
				);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		$config =  array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 150,
				'height' => 100
				);
				
		$this->load->library('image_lib', $config);		
		$this->image_lib->resize();
		
	}
	
	function get_images()
	{
		$files = scandir($this->gallery_path);
		$files = array_diff($files, array('.','..','thumbs'));
		
		$images = array();
		
		foreach($files as $file)
		{
			$images[] = array(
					  'url'=> $this->gallery_path_url . $file,
					  'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file,
					  );
		}
		
		return $images;
	}
	
	}
?>