<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmationmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function find($id)
	{
		$query = $this->db->get_where('confirmation',
		array('id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	public function getAll()
	{		
		$query = $this->db->get('confirmation');
		$result = $query->result_array();
		return $result;
	}
	public function findBy($param)
	{
		$query = $this->db->get_where('confirmation',$param);
		$result = $query->result_array();
		return $result;
	}
	
	public function delete($id)
	{

		$this->db->delete('confirmation',array('id'=>$id));
	}

	public function insert($param)
	{
		$this->db->insert('confirmation',$param);
	}

	public function update($param,$id)
	{

		$this->db->where('confirmation_id', $id);
		$this->db->update('confirmation', $param);
	}

	public function tableConPending(){
		$sql = "SELECT c.confirmation_id, c.header_id, c.institution_id, i.institution_name, c.bank_transfer, c.total_transfer, c.rek_name, c.image_path, c.payment_type, c.status, c.created_at FROM confirmation c join institution i on c.institution_id = i.institution_id where status = 0 order by created_at DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function tableConSuccess(){
		$sql = "SELECT c.confirmation_id, c.header_id, c.institution_id, i.institution_name, c.bank_transfer, c.total_transfer, c.rek_name, c.image_path, c.payment_type, c.status, c.created_at FROM confirmation c join institution i on c.institution_id = i.institution_id where status = 1 order by created_at DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function tableConDelete(){
		$sql = "SELECT c.confirmation_id, c.header_id, c.institution_id, i.institution_name, c.bank_transfer, c.total_transfer, c.rek_name, c.image_path, c.payment_type, c.status, c.created_at FROM confirmation c join institution i on c.institution_id = i.institution_id where status = -1 order by created_at DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
}
