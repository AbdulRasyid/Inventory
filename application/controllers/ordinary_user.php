<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ordinary_user extends CI_Controller{
	//main caller helper,loader,library
	public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('form_validation','session'));
		$this->load->library('image_library');
		$this->load->model('site_model');
		$this->load->model('admin_model');
		$this->load->model('ordinary_user_model');
    }
	public function index()
	{
		$o_id = $this->session->userdata('o_id');
		if(!$o_id)
		{
			$data['o_id'] = $this->session->userdata('o_id');
			$data['title'] = 'Home Page';
			$data['login'] = 'user/login';
			$data['register'] = 'user/registration';
			$data['center'] = 'user/center_area';
			$data['comment'] = 'user/comment_area';
			
			$this->load->view('includes/ordinary_template', $data);
		}
		else
		{
			$this->home_view();
		}
	}
	public function ordinary_user_register()
	{
			$pass = $_POST['password'];
			$password = sha1($pass);
			$data = array(
						'o_firstname'=> $_POST['firstname'],
						'o_lastname'=> $_POST['lastname'],
						'o_email'=> $_POST['email'],
						'o_occupation'=> $_POST['occupation'],
						'o_mobile'=> $_POST['mobile'],
						'o_username'=> $_POST['username'],
						'o_password'=> $password
						 );
			$data['data'] = $this->db->insert('ordinary_user',$data);
			
			echo json_encode($data);
		
	}
	public function validate_login()
	{
			extract($_POST);
			$o_user = $this->ordinary_user_model->o_user_check_login($ou_username,$ou_password);
			if(!$o_user)
			{
				$this->index();
			}
			else
			{
				$data = $this->session->set_userdata(array('logged_in'=> FALSE,'o_id' =>$o_user));						 
				redirect('ordinary_user/home_view',$data);
			}
	}
	public function home_view()
	{
		$o_id = $this->session->userdata('o_id');
		if(!$o_id)
		{
			redirect('ordinary_user');
		}
		else
		{
			$data['o_id'] = $this->session->userdata('o_id');
			$data['alldata'] = $this->admin_model->get_alldata();
			$data['my_id'] = $this->session->userdata('o_id');
			$data['me'] = $this->db->get('ordinary_user');
			$data['rep'] = $this->db->get('replay');
			
			$data['title'] = 'welcome to your mini acount';
			$data['index'] = 'ordinary/index';
			$this->load->view('includes/o_user_home_template',$data);
		}
	}
	public function send_message()
	{
		$o_id = $this->session->userdata('o_id');
		if(!$o_id)
		{
			redirect('Ordinary_user');
		}
		else
		{
			$o_id = $this->uri->segment(3);
			$data = array(
						'm_id'=>$o_id,
						'name'=>$_POST['o_name'],
						'message'=>$_POST['o_message'],
						 );
			$data['data'] = $this->db->insert('message',$data);
			
			echo json_encode($data);
		}
	}
	public function search()
	{
		$o_id = $this->session->userdata('o_id');
		if(!$o_id)
		{
			redirect('ordinary_user');
		}
		else
		{
			$model = $this->uri->segment(3);
			$data['searchdata'] = $this->admin_model->get_search($model);
			$data['my_id'] = $this->session->userdata('o_id');
			$data['me'] = $this->db->get('ordinary_user');
			$data['rep'] = $this->db->get('replay');
			$data['o_id'] = $this->session->userdata('o_id');
			$data['alldata'] = $this->admin_model->get_alldata();
			//views	
			$data['title'] = 'welcome to your mini acount';
			$data['index'] = 'ordinary/index2';
			$this->load->view('includes/o_user_home_template', $data);
		}
		
	}
	public function logout()
	{
		$o_id = $this->session->userdata('o_id');
		if(!$o_id)
		{
			redirect('ordinary_user');
		}
		else
		{
			$data = $this->session->sess_destroy();
			$data['title'] = 'Home Page';
			$data['login'] = 'user/login';
			$data['register'] = 'user/registration';
			$data['center'] = 'user/center_area';
			$data['comment'] = 'user/comment_area';
			
			$this->load->view('includes/ordinary_template', $data);
		}
		
	}
}