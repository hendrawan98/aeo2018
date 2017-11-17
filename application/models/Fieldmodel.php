<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fieldmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function find($id)
	{
		$query = $this->db->get_where('field',
		array('field_id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	public function findAccomId($id)
	{
		$query = $this->db->get_where('accom',
		array('accom_id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}

	public function findAccomDetailId($id)
	{
		$query = $this->db->get_where('accom_detail',
		array('accom_id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	public function findFieldByCode($code)
	{
		$query = $this->db->get_where('field',
		array('code' => $code)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}
	
	public function findTypeByCode($code){
		$query = $this->db->get_where('accom',
			array('code' => $code));
		$result = $query->result_array();
		if(array_key_exists(0, $result)){
			return $result[0];
		}
		return null;
	}

	public function getAll()
	{		
		$query = $this->db->get('field');
		$result = $query->result_array();
		return $result;
	}
	public function findBy($param)
	{
		$query = $this->db->get_where(
			'field',$param);
		$result = $query->result_array();
		return $result;
	}
	
	public function delete($id)
	{

		$this->db->delete('field',array('id'=>$id));
	}

	public function insert($param)
	{
		$this->db->insert('field',$param);
	}

	public function update($param,$id)
	{

		$this->db->where('field_id', $id);
		$this->db->update('field', $param);
	}

	public function updateAccom($param,$id)
	{

		$this->db->where('accom_id', $id);
		$this->db->update('accom', $param);
	}

	public function getFieldPrice()
	{
		$query = $this->db->get('field');
		$result = $query->result_array();
		$price;
		foreach ($result as $field => $value) {
			$price[$value['code']] = array('price' => $value['price'], 'stock' => $value['stock']);
		}
		return $price;

	}
}
