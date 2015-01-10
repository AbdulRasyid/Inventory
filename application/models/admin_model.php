<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class admin_model extends CI_Model{
	
	public function validate_admin_user($username,$password)
	{
		$shapass = sha1($password);
		$check_admin = "SELECT * from admin_user WHERE username=? and password=?";
		$checker = $this->db->query($check_admin,array($username,$shapass));
		if($checker->num_rows == 1)
		{
			return $checker->row(0)->admin_id;
		}
		else
		{
			return false;
		}
		
	}
	public function user_list()
	{
		$userlist = $this->db->query("SELECT * FROM user ORDER BY id ASC");
		return $userlist;
	}
	public function admin_list()
	{
		$admin_list = $this->db->query("SELECT * FROM admin_user ORDER BY admin_id ASC");
		return $admin_list;
	}
	public function get_alldata()
	{
		$test = $this->db->query("SELECT i.id, i.title_id, i.images,p.by_user, p.product_id, p.product_title , p.product_price , p.product_model , p.product_stocks , p.product_serial , p.product_description FROM images i JOIN product p ON i.title_id = p.product_id  ORDER BY p.product_id DESC");
		return $test;
	}
	public function get_search($model)
	{
		$test = $this->db->query("SELECT i.id, i.title_id, i.images,p.by_user, p.product_id, p.product_title , p.product_price , p.product_model , p.product_stocks , p.product_serial , p.product_description FROM images i JOIN product p ON i.title_id = p.product_id WHERE product_model = '$model'  ORDER BY p.product_id DESC");
		return $test;
	}
	public function get_user($lname)
	{
		$test = $this->db->query("SELECT * FROM user WHERE last_name = '$lname' ");
		return $test;
	}
	/*public function find_message($message)
	{
		$test = $this->db->query("SELECT * FROM message WHERE last_name = '$lname' ");
		return $test;
	}*/
}//end class
?>