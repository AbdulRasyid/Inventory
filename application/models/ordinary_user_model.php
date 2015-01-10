<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ordinary_user_model extends CI_Model{
	
	public function o_user_check_login($ou_username,$ou_password)
	{
		$shapass = sha1($ou_password);
		$check_user = "SELECT * from ordinary_user WHERE o_username=? and o_password=?";
		$checker = $this->db->query($check_user,array($ou_username,$shapass));
		if($checker->num_rows == 1)
		{
			return $checker->row(0)->o_id;
		}
		else
		{
			return false;
		}
	}
}

?>