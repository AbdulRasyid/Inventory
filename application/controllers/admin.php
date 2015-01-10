<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
	
	public function index()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['title'] = 'Admin Login';
			$data['admin_page'] = 'admin/index';
			$this->load->view('includes/admin_template', $data);
		}
		else
		{
			redirect('main_controller');
		}
	}
	public function validate_login()
	{
		$this->form_validation->set_rules('username','username','trim|xss_clean|required');
		$this->form_validation->set_rules('password','password','trim|xss_clean|required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('admin');
		}
		else
		{
			extract($_POST);
			$admin = $this->admin_model->validate_admin_user($username,$password);
			if(!$admin)
			{
			$this->index();
			}
			else
			{
			$data = $this->session->set_userdata(array('logged_in'=> FALSE,'admin_id' =>$admin));
			redirect('main_controller',$data);
			}
		}
	}
	
	public function logout()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('main_controller');
		}
		else
		{
			$data = $this->session->sess_destroy();
			$data['title'] = 'Admin Login';
			$data['admin_page'] = 'admin/index';
			$this->load->view('includes/admin_template', $data);	
		}
	}
	
}//end class bracket..
?>