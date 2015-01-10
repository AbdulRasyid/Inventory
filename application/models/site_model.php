<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	function insert_product($my_e,$product_title,$product_price,$product_model,$product_serial,$product_stocks,$product_description) 
	{
		$insert_product = $this->db->query("INSERT INTO product(by_user,product_title,product_price,product_model,product_stocks,product_serial,product_description) VALUES ('$my_e','$product_title','$product_price','$product_model','$product_serial','$product_stocks','$product_description')");
		return $insert_product;
	}
	
	function insert_comment($by_this,$post)
	{
		$insert_comment = $this->db->query("INSERT INTO entries(`by`,`body`) VALUES ('$by_this','$post')");
		return $insert_comment;
	}
	
	function get_comment()
	{
		$get_comment = $this->db->query("SELECT * FROM entries ORDER BY id ASC");
        return $get_comment;
	}
	
	public function display_imageinfo($id)
	{
		$test = $this->db->query("SELECT i.id, i.title_id, i.images,p.by_user, p.product_id, p.product_title , p.product_price , p.product_model , p.product_stocks , p.product_serial , p.product_description FROM images i JOIN product p ON i.title_id = p.product_id WHERE p.by_user='$id' ORDER BY p.product_id DESC");
		return $test;
	}
	
	public function display_product()
	{
		$display_product = $this->db->query("SELECT * FROM product");
		return $display_product;
	}
	
	public function update_data($edit_id,$product_title,$product_price,$product_model,$product_stocks,$product_serial,$product_description)
	{
		$update_data = $this->db->query("UPDATE product SET product_title='$product_title' ,product_price='$product_price' ,product_model='$product_model', product_stocks='$product_stocks', product_serial='$product_serial' ,product_description='$product_description' WHERE product_id='$edit_id'");
		return $update_data;
	}
	
	public function delete_data($delete_id)
	{
		$delete_data = $this->db->query("DELETE FROM product WHERE product_id='$delete_id'");
		return $delete_data;
	}
	public function get_myinfo($id)

	{
		$get_myinfo = $this->db->query("SELECT * FROM user WHERE id='$id' ");
		return $get_myinfo;
	}
	
	public function get_my_count($id)
	{
		$get_my_count = $this->db->query("SELECT * FROM product WHERE by_user='$id'");
		return $get_my_count;
	}
	public function update_my_acount($update_id,$new_username,$new_password)
	{
		$new_pass = sha1($new_password);
		$update_my_acount = $this->db->query("UPDATE user SET username = '$new_username' and password = '$new_pass' WHERE id = '$update_id'");
		return $update_my_acount;
	}
	public function get_admin_post()
	{
		$test = $this->db->query("SELECT e.id, e.by_admin, e.by, e.body, e.time, u.id , u.first_name , u.last_name , u.username , a.admin_id , a.name, a.lastname FROM entries e, user u JOIN admin_user a  ORDER BY e.id DESC");
		return $test;
	}
	public function get_post()
	{
		$test = $this->db->query("SELECT * FROM entries  ORDER BY id DESC");
		return $test;
	}
	public function select($post_id)
	{
		$test = $this->db->query("SELECT * FROM user  ORDER BY id DESC");
		return $test;
	}
	public function get_comment_list()
	{
		$test = $this->db->query("SELECT c.entry_id, c.comment, c.by_user, u.first_name,u.last_name, u.id, e.id FROM comments c, entries e JOIN user u ORDER BY c.id DESC");
		return $test;
	}
}//end class
?>