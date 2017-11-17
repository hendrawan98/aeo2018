<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('usermanager');
		$this->load->library('session');
		$this->load->model('usermodel');
		
	}
	
	public function about_organizer()
	{
		$id = $this->session->userdata('user_id');
		if($id != null)
		{
			$data['userlogin'] = true;
			$data['userdata'] = $this->usermodel->find($id);
			$data['title'] = "About Us - Asian English Olympics 2017";
			$data['content'] = "about_organizer";
			$this->load->view('base',$data);
		}
		else
		{
			$data['title'] = "About Us - Asian English Olympics 2017";
			$data['content'] = "about_organizer";
			$this->load->view('base',$data);
		}
		
	}

	public function about_event()
	{
		$id = $this->session->userdata('user_id');
		if($id != null)
		{
			$data['userlogin'] = true;
			$data['userdata'] = $this->usermodel->find($id);
			$data['title'] = "About Us - Asian English Olympics 2017";
			$data['content'] = "about_event";
			$this->load->view('base',$data);
		}
		else
		{
			$data['title'] = "About Us - Asian English Olympics 2017";
			$data['content'] = "about_event";
			$this->load->view('base',$data);
		}
	}

	public function program_highlight()
	{
		$id = $this->session->userdata('user_id');
		if($id != null)
		{
			$data['userlogin'] = true;
			$data['userdata'] = $this->usermodel->find($id);
			$data['title'] = "Program - Asian English Olympics 2017";
			$data['content'] = "program_highlight";
			$this->load->view('base',$data);
		}
		else
		{
			$data['title'] = "Program - Asian English Olympics 2017";
			$data['content'] = "program_highlight";
			$this->load->view('base',$data);
		}
	}
}