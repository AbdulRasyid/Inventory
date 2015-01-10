<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller{
	//main caller helper,loader,library
	public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('form_validation','session'));
		$this->load->library('image_library');
		$this->load->model('site_model');
    }
	
	public function index($error = '')
	{	
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{
			$id = $this->session->userdata('id');	
			$data['user'] = $this->session->userdata('id');
			$data['count'] = $this->site_model->get_my_count($id);
			$data['alldata'] = $this->site_model->display_imageinfo($id);
			$data['my_info'] = $this->site_model->get_myinfo($id);
			//views
			$data['title'] = 'Home Page';
			$data['main_content'] = 'site/index';
			$this->load->view('includes/template', $data);
		}
	}
		
	public function edit_user()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
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
	public function get_user()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{
			$id = $this->uri->segment(3);
			$data['total'] = $this->site_model->get_myinfo($id);
			echo json_encode($data['total']->result());
		}
	}
		
	public function add_data()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{
			$this->form_validation->set_rules('product_title', 'title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('product_price', 'price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('product_model', 'Model', 'trim|required|xss_clean');
			$this->form_validation->set_rules('product_serial', 'Serial', 'trim|required|xss_clean');
			$this->form_validation->set_rules('product_stocks', 'Stocks', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){

			$id = $this->session->userdata('id');	
			$data['user'] = $this->session->userdata('id');
			$data['count'] = $this->site_model->get_my_count($id);
			$data['alldata'] = $this->site_model->display_imageinfo($id);
			$data['my_info'] = $this->site_model->get_myinfo($id);
			//views
			$data['title'] = 'Home Page';
			$data['main_content'] = 'site/add_repeat';
			$this->load->view('includes/template', $data);
		}
		else
		{
		
			$my_e = $this->input->post('my_e');
			$product_title = $this->input->post('product_title');
			$product_price = $this->input->post('product_price');
			$product_model = $this->input->post('product_model');
			$product_serial = $this->input->post('product_serial');
			$product_stocks = $this->input->post('product_stocks');
			$product_description = $this->input->post('product_description');

			extract($_POST);
			$this->site_model->insert_product($my_e,$product_title,$product_price,$product_model,$product_serial,$product_stocks,$product_description);
			
			$id = $this->db->insert_id();
			for($i=1; $i==1; $i++)
			{
			if(isset($_FILES['file_'.$i.'']['name']))
			{
				$user_id = $this->session->userdata('user_id');
				$img = $_FILES['file_'.$i.'']['name'];
				$img = $_FILES['file_'.$i.'']['tmp_name'];
				$random = rand(000000000,999999999);
				$path1 = 'assets/upload_image/original/'.$random.'.jpg';
				$path2 = 'assets/upload_image/crop/'.$random.'.jpg';
				$path3 = 'assets/upload_image/thumb/'.$random.'.jpg';
				$this->image_library->add_convert_image($img,$path1);
				$this->image_library->add_crop_image($img,$path2);
				$this->image_library->add_thumb_image($img,$path3);
			
				$insert_img['title_id'] = $id;
				$insert_img['images'] = $random.'.jpg';
				$this->db->insert('images',$insert_img);
					 
			}
	
		}
			$id = $this->session->userdata('id');	
			$data['user'] = $this->session->userdata('id');
			$data['count'] = $this->site_model->get_my_count($id);
			$data['alldata'] = $this->site_model->display_imageinfo($id);
			$data['my_info'] = $this->site_model->get_myinfo($id);
			//views
			$data['title'] = 'Home Page';
			$data['main_content'] = 'site/add_success';
			$this->load->view('includes/template', $data);
		}
		}
	}

	public function edit_data()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
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
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
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
			
			$id = $this->session->userdata('id');	
			$data['user'] = $this->session->userdata('id');
			$data['count'] = $this->site_model->get_my_count($id);
			$data['alldata'] = $this->site_model->display_imageinfo($id);
			$data['my_info'] = $this->site_model->get_myinfo($id);
			//views	
			$data['title'] = 'Home Page';
			$data['main_content'] = 'site/delete_success';
			$this->load->view('includes/template', $data);
		}
	}

	public function blog()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{
			$id = $this->session->userdata('id');	
			
			$data['user'] = $this->session->userdata('id');	
			$data['entries'] = $this->site_model->get_comment();
			$data['my_info'] = $this->site_model->get_myinfo($id);
			$data['post'] = $this->site_model->get_post();
			$data['select'] = $this->site_model->select($id);
			$data['get_comment'] = $this->site_model->get_comment_list();
			
			$data['title'] = 'Home Blog';
			$data['main_content'] = 'site/blog/index';
			
			$this->load->view('includes/template',$data);					
		}
	}	
	
	public function insert_post()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{

			$by_this = $this->input->post('hide_n');
			$post = $this->input->post('post');
			$this->site_model->insert_comment($by_this,$post);
			
			$id = $this->session->userdata('id');	
			$data['user'] = $this->session->userdata('id');	
			$data['entries'] = $this->site_model->get_comment();
			$data['my_info'] = $this->site_model->get_myinfo($id);
			$data['post'] = $this->site_model->get_post();
			$data['select'] = $this->site_model->select($id);
			$data['get_comment'] = $this->site_model->get_comment_list();
	
			$data['title'] = 'Home Blog';
			$data['main_content'] = 'site/blog/index';
			
			$this->load->view('includes/template',$data);
		}
	}
	public function add_comment()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{
			$entry_id = $this->uri->segment(3);
			$comment = $this->uri->segment(4);
			$hide_id = $this->uri->segment(5);
			$data = array(
						  'entry_id'=> $entry_id,
						  'comment'=> urldecode($comment),
						  'by_user'=> $hide_id,
						  );
			$data['data'] = $this->db->insert('comments',$data);
			
			redirect('site/blog');
		}
	}
	public function get_comment()
	{
		$user = $this->session->userdata('id');	
		if(!$user)
		{
			redirect(base_url());
		}
		else
		{
			$this->uri->segment(3);
			$data['get_comment'] = $this->site_model->get_comment_list();
		}
	}
}//end class
?>