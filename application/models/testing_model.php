<?php 

class Testing_model extends CI_Model{
	
	public function Testing_model(){
		parent::__construct();
	}
	
	public function display_test()
	{
		$test = "SELECT i.id, i.title_id, i.images, t.id, t.title FROM images i JOIN title_image t ON i.title_id = t.id ORDER BY t.id DESC";
		$query = $this->db->query($test);
		return $query;
	}
}

?>