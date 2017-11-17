<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participantmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function find($id)
	{
		$query = $this->db->get_where('participant',
		array('participant_id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	public function findAccom($id)
	{
		$query = $this->db->get_where('accom_list',
		array('id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	public function findparticipantByCode($code)
	{
		$query = $this->db->get_where('participant',
		array('code' => $code)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	public function getAll()
	{		
		$query = $this->db->get('participant');
		$result = $query->result_array();
		return $result;
	}
	public function findBy($param)
	{
		$query = $this->db->get_where(
			'participant',$param);
		$result = $query->result_array();
		return $result;
	}
}
