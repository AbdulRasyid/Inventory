<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('site_model');
		$this->load->library('session');
	}
	public function index()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$data['title'] = 'welcome admin';
			$data['main_page'] = 'admin/main_page';	
			$data['lower_nav'] = 'admin/nav';
			
			$data['user_list'] = $this->admin_model->user_list();
			$data['admin_list'] = $this->admin_model->admin_list();
			$data['my_id'] = $this->session->userdata('admin_id');
			$data['me'] = $this->db->get('admin_user');
			$data['req'] = $this->db->get('message');
			
			$this->load->view('includes/main_admin_template',$data);
		}
	}	
	
	public function update_admin()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$update_id = $this->uri->segment(3);
			$this->db->where('admin_id',$update_id);
			$pass = $_POST['password'];
			$newp = sha1($pass);
			$data = array(
			'username' => $_POST['username'],
			'password' => $newp
			);
			return $data['data'] = $this->db->update('admin_user',$data);
			
			echo json_encode($data);
		}
	}
	
	public function update_user()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$update_id = $this->uri->segment(3);
			$this->db->where('id',$update_id);
			$pass = $_POST['password'];
			$newp = sha1($pass);
			$data = array(
			'username' => $_POST['username'],
			'password' => $newp
			);
			return $data['data'] = $this->db->update('user',$data);
			
			echo json_encode($data);
		}
	}
	
	public function delete_user()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$user_id = $this->uri->segment(3);
			$this->db->where('id',$user_id);
			
			$this->db->delete('user');
			
			$data['sucees_delete'] = 'user has been deleted !';
			$data['user_id'] = $user_id;
			$data['title'] = 'welcome admin';
			$data['main_page'] = 'admin/main_page2';	
			$data['lower_nav'] = 'admin/nav';
			
			$data['user_list'] = $this->admin_model->user_list();
			$data['admin_list'] = $this->admin_model->admin_list();
			$data['my_id'] = $this->session->userdata('admin_id');
			
			$this->load->view('includes/main_admin_template',$data);
		}
	}
	public function delete_admin()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$user_id = $this->uri->segment(3);
			$this->db->where('admin_id',$user_id);
			
			$this->db->delete('admin_user');
			
			$this->index();
		}
	}
	
	//action function start here
	public function actions()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$data['title'] = 'welcome admin';
			$data['main_page'] = 'admin/action';	
			$data['lower_nav'] = 'admin/nav';
			
			$data['admin_id'] = $this->session->userdata('admin_id');	
			$data['alldata'] = $this->admin_model->get_alldata();
			$data['user_list'] = $this->admin_model->user_list();
			$data['admin_list'] = $this->admin_model->admin_list();
			$data['my_id'] = $this->session->userdata('admin_id');
			
			$this->load->view('includes/main_admin_template',$data);
		}
	}
	public function add_admin()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$pass = $_POST['pword'];
			$pword = sha1($pass);
			$data = array('name'=> $_POST['fname'],
						  'lastname'=> $_POST['lname'],
						  'username'=> $_POST['uname'],
						  'password'=> $pword);
			$data['data'] = $this->db->insert('admin_user',$data);
			
			echo json_encode($data);
		}
	}
	public function add_user()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$pass = $_POST['pword'];
			$pword = sha1($pass);
			$data = array('first_name'=> $_POST['fname'],
						  'last_name'=> $_POST['lname'],
						  'username'=> $_POST['uname'],
						  'password'=> $pword,
						  'email_address'=> $_POST['email']);
			$data['data'] = $this->db->insert('user',$data);
			
			echo json_encode($data);
		}
		
	}
	public function edit_data()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$edit_id = $this->uri->segment(3);
			$this->db->where('product_id' ,$edit_id);
			$data = array(
						'product_title' => $_POST['newtitle'],
						'product_price' => $_POST['newPrice'],
						'product_model' => $_POST['newModel'],
						'product_stocks' => $_POST['newStocks'],
						'product_serial' => $_POST['newSerial'],
						'product_description' => $_POST['newDescription']
						);
			$data['data'] = $this->db->update('product',$data);//$this->site_model->update_data($edit_id,$product_title,$product_price,$product_model,$product_stocks,$product_serial,$product_description);
			echo json_encode($data);
		}
	}
	
	public function delete_data()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$delete_id = $this->uri->segment(3);
			$product_title = $this->input->post('newtitle');
			$product_price = $this->input->post('newPrice');
			$product_model = $this->input->post('newModel');
			$product_stocks = $this->input->post('newStocks');
			$product_serial = $this->input->post('newSerial');
			$product_description = $this->input->post('newDescription');
			$data['data'] = $this->site_model->delete_data($delete_id,$product_title,$product_price,$product_model,$product_stocks,$product_serial,$product_description);
			/*$data['alldata'] = $this->admin_model->get_alldata();
			$data['user_list'] = $this->admin_model->user_list();
			$data['admin_list'] = $this->admin_model->admin_list();
			//views	
			$data['title'] = 'welcome admin';
			$data['main_page'] = 'admin/action2';	
			$data['lower_nav'] = 'admin/nav';*/
			redirect('main_controller/actions', $data);
		}
	}
	public function search_data()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$models = $this->uri->segment(3);
			$model = urldecode($models);
			$data['searchdata'] = $this->admin_model->get_search($model);
			$data['alldata'] = $this->admin_model->get_alldata();
			$data['user_list'] = $this->admin_model->user_list();
			$data['admin_list'] = $this->admin_model->admin_list();
			$data['my_id'] = $this->session->userdata('admin_id');
			//views	
			$data['title'] = 'welcome admin';
			$data['main_page'] = 'admin/action2';	
			$data['lower_nav'] = 'admin/nav';
			$this->load->view('includes/main_admin_template', $data);
		}
	}
	
	public function add_stocks()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$id = $this->uri->segment(3);
			$data = array(
						'product_serial' => $_POST['add'],
			);
			
			$this->db->where('product_id', $id);
			$data['nice'] = $this->db->update('product',$data);
			
			echo json_encode($data['nice']);
		}
	}
	
	public function add_get_new_stocks()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$id = $this->uri->segment(3);
			$this->db->where('product_id' ,$id);
			$data['total'] = $this->db->get('product');
			
			echo json_encode($data['total']->result());
		}
	}
	
	public function minus_stocks()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{
			$id = $this->uri->segment(3);
			$data = array(
						'product_serial' => $_POST['minus'],
			);
			
			$this->db->where('product_id', $id);
			$data['nice'] = $this->db->update('product',$data);
			
			echo json_encode($data['nice']);
		}
	}
	
	public function search_user()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{ 
			$user_id = $this->uri->segment(3);
			$data['my_info'] = $this->site_model->get_myinfo($user_id);
			$data['count'] = $this->site_model->get_my_count($user_id);
			$data['alldata'] = $this->admin_model->get_alldata();
			$data['user_list'] = $this->admin_model->user_list();
			$data['admin_list'] = $this->admin_model->admin_list();
			$data['my_id'] = $this->session->userdata('admin_id');
			//echo $lname;
			//views	
			$data['title'] = 'welcome admin';
			$data['main_page'] = 'admin/action3';	
			$data['lower_nav'] = 'admin/nav';
			$this->load->view('includes/main_admin_template', $data);
		}
	}
	
	public function anounced()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{ 
			$an_id = $this->uri->segment(3);
			$data = array(
						'by_admin'=>$an_id,
						'anounced'=>$_POST['body']
						);
			$data['data'] = $this->db->insert('anounced',$data);
			
			echo json_encode($data);
		}
	}
	public function replay()
	{ 
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			$data['data'] = 'please login!';
			echo json_decode($data);
			
			redirect('admin');
		}
		else
		{
			$data = array(
						'r_m_id'=> $_POST['to'],
						'r_f_id'=> $_POST['by_admin'],
						'replay'=> $_POST['message']
						  );
			$data['data'] = $this->db->insert('replay',$data);
			
			echo json_encode($data);
		}
	}
	
	public function r(){
		$r = '9dcee492208431d74d9169a071db4471c53ff3d0';
		if($r == md5('encoder3')){
			echo 'tama';
		}
		else
		echo 'no';
	}
	/*public function search_message()
	{
		$admin = $this->session->userdata('admin_id');
		if(!$admin)
		{
			redirect('admin');
		}
		else
		{ 
			$message = $this->uri->segment(3);
			$data['find'] = $this->admin_model->find_message($message);
			
		}
	}*/
}//end class
?>