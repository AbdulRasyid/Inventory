<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	//main caller helper,loader,library
	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('form_validation','session'));
    }
	
    public function index()
    {
    	$user = $this->session->userdata('id');
		if(!$user)
		{
			//data for users
			$data['title'] = 'Home Page';
			$data['login'] = 'user/login';
			$data['register'] = 'user/registration';
			$data['center'] = 'user/center_area';
			$data['comment'] = 'user/comment_area';
			
			$this->load->view('includes/login_template', $data);
		}
		else
		{
			redirect('site');
		}
	}
//--------------------------FUNCTION FOR REGISTRATION-----------------------//	
	public function create_member()
	{
		//field name,  error_message, validation rules
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
		$this->form_validation->set_rules('emailaddress', 'Email Address', 'trim|required|valid_email|unique[user.emailaddress]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[34]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run() == FALSE)
		{
			//data for registration error
			$data['title'] = 'Registration Page';
			$data['register'] = 'user/register_error';
			$data['center'] = 'user/center_area';
			$data['comment'] = 'user/comment_area';
			$data['login'] = 'user/login';
		
			$this->load->view('includes/login_template', $data); //calls the registration function in current controller
		}
		else
		{
			extract($_POST);
			$this->user_model->add_user($firstname,$lastname,$username,$password,$emailaddress);
		
			redirect(base_url());
		}
	}
//--------------------------FUNCTION FOR VALIDATIONS-----------------------//
	
	public function validate_login()
	{
		$this->load->model('user_model');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Home Page';
			$data['register'] = 'user/registration';
			$data['center'] = 'user/center_area';
			$data['comment'] = 'user/comment_area';
			$data['login'] = 'user/login_error';
		
			$this->load->view('includes/login_template',$data);
		}
		else
		{
			extract($_POST);
			$user = $this->User_model->check_user($username,$password);
			if(!$user)
			{
				$data = $this->session->set_flashdata('login_error', TRUE);
				$data['title'] = 'Home Page';
				$data['register'] = 'user/registration';
				$data['center'] = 'user/center_area';
				$data['comment'] = 'user/comment_area';
				$data['login'] = 'user/login_error';
				
				$this->load->view('includes/login_template',$data);
			}
			else
			{
			$data = $this->session->set_userdata(array('logged_in'=> FALSE,'id' =>$user));						 
			redirect('site',$data);	
			}
		}
	}
	public function logout()
	{
		//destroy the session user
		$data = $this->session->sess_destroy();
		if(!$data)
		{
			//views
			$data['title'] = 'Home Page';
			$data['login'] = 'user/login';
			$data['register'] = 'user/registration';
			$data['center'] = 'user/center_area';
			$data['comment'] = 'user/comment_area';
			
			redirect(base_url(), $data);
		}
		else
		{
			redirect('site');
		}
	}
}//
?>



