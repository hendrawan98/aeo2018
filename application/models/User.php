<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

	public function findBy($param){
		$query = $this->db->get_where('user', $param);
		$result = $query->result_array();
		return $result;
	}

	public function insert($param){
		$this->db->insert('user', $param);
	}

}