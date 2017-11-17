<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->model('adminmodel');
		$this->load->library('usermanager');
		$this->load->library('participantmanager');
	}
	
	public function adminpage()
	{
		$id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);
		$data['info'] = $this->adminmodel->getadmin();

		if($this->session->userdata('email') == 'myregis@international.aeo')
		{
			$data['userlogin'] = true;
			$data['userdata'] = $this->usermodel->find($id);
			$data['content'] = 'iregis';
			$this->load->view('base', $data);
		}
		else if($this->session->userdata('email') == 'myregis@national.aeo')
		{
			$data['content'] = 'nregis';
			$this->load->view('base', $data);
		}
		else if($this->session->userdata('email') == 'competetition@aeo.bnec')
		{
			redirect('dashboard');
		}
		else
		{
			redirect('dashboard');
		}
	}
}