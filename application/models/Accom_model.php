<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accom_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function getAccomPrice()
	{
		$query = $this->db->get('accom');
		$result = $query->result_array();
		$price;
		foreach ($result as $acc => $value) {
			$price[$value['code']] = array('price' => $value['price'], 'stock' => $value['stock']);
		}
		return $price;

	}
}
