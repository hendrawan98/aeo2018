<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model{

	public function find($id)
	{
		$query = $this->db->get_where('user',
		array('id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}

	public function getInsName($id)
	{		
		$query = $this->db->get_where('user',
			array('id' => $id));
		$result = $query->result_array();
		return $result;
	}

	public function findBy($param)
	{
		$query = $this->db->get_where('user',$param);
		$result = $query->result_array();
		return $result;
	}

	public function insert($param)
	{
		$this->db->insert('user',$param);
	}

	public function update($param, $id){
		$this->db->where('id', $id);
		$this->db->update('user', $param);
	}
	
	public function getInsFlight($id)
	{		
		$query = $this->db->get_where('user',
			array('id' => $id));
		$result = $query->result_array();
		return $result;
	}

}
