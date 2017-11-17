<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function getadmin()
	{
		$data = $this->db->get('field');
		return $data->result_array();
	}
}