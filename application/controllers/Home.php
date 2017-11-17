<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('usermanager');
		$this->load->library('session');
		$this->load->model('usermodel');
	}
	public function index()
	{
		$id = $this->session->userdata('user_id');
		if($id != null)
		{
			$data['userlogin'] = true;
			$data['userdata'] = $this->usermodel->find($id);
			$data['content'] = 'homepage';
			$data['css'] = true;
			$this->load->view('base',$data);
		}
		else
		{
			$data['content'] = 'homepage';
			$data['css'] = true;
			$this->load->view('base',$data);
		}
		// $data['content'] = 'commingsoon';
		// $this->load->view('base',$data);
	}
	public function registerPage()
	{
		if($this->session->userdata('user_id') == null)
		{
			$data['content'] = 'register';
			$this->load->view('base',$data);	
		}else
		{
			redirect('dashboard');
		}
	}

	public function register()
	{
		$request = $this->input->post();
		$params['email'] = $this->input->post('email');
		$params['password'] = $this->input->post('password');

		$config['upload_path']          = 'assets/institution-logo/';
        $path = 'assets/institution-logo/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg'; 
        $config['max_size']             = 10000;        
        $config['file_name'] = $request['institution'];
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ins_logo'))
        {
            $data_upload = $this->upload->data();            
            $request['ins_logo']   = $path.$data_upload['file_name'];
        }else{
            console.log("Upload Image Failed!");            
            redirect('register');      
            
        }

		$param = $this->usermanager->buildParam($request);
		$this->usermodel->insert($param);

		$this->load->library('Securityhandler',$params);

		if($this->securityhandler->isLoggedin() == true)
		{
			redirect('dashboard');
		}
		else
		{
			//windows.alert('login error');
			redirect('login');
		}
	}
	public function loginPage()
	{
		if($this->session->userdata('user_id') == null)
		{
			$data['content'] = 'login';
			$this->load->view('base',$data);	
		}else
		{
			redirect('dashboard');
		}
	}

	public function login()
	{
		$params['email'] = $this->input->post('email');
		$params['password'] = $this->input->post('password');

		$this->load->library('Securityhandler',$params);

		if($this->securityhandler->isLoggedin() == true)
		{
			redirect('dashboard');
		}
		else
		{
			//windows.alert('login error');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
