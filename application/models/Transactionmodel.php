<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function getLatestInvoice($id)
	{
		$this->db->order_by("created_at", "desc");
		$query = $this->db->get_where(
			'invoice',array('ins_id' => $id,'status' => 0));
		$result = $query->result_array();
		return $result[0];
	}
	public function getAllConfirmation($id)
	{
		$this->db->order_by("created_at", "desc");
		$query = $this->db->get_where(
			'confirmation',array('ins_id' => $id));
		$result = $query->result_array();
		return $result;
	}

	public function getAllUnapprovedInvoice($id)
	{
		$this->db->order_by("created_at", "desc");
		$query = $this->db->get_where(
			'invoice',array('ins_id' => $id,'status' => 0));
		$result = $query->result_array();
		return $result;	
	}

	public function deleteInvoice($id){
		$this->db->delete('invoice', array('invoice_id'=>$id));
	}

	public function find($id)
	{
		$query = $this->db->get_where('invoice',
		array('invoice_id' => $id)
		);
		$result = $query->result_array();
		if (array_key_exists(0, $result)) {
			return $result[0];	
		}
		
		return null;
	}

	public function getAll()
	{		
		$query = $this->db->get('detail');
		$result = $query->result_array();
		return $result;
	}
	public function getData($id)
	{		
		$this->db->order_by("status", "asc");
		$query = $this->db->get_where('invoice',
			array('ins_id' => $id));
		$result = $query->result_array();
		return $result;
	}
	public function countOne($id)
	{		
		// $query = $this->db->get_where('header',
		// 	array('institution_id' => $id, 'status' => 1));
		$this->db->like(array('institution_id' => $id, 'status' => 1));
		$this->db->from('header');
		return $this->db->count_all_results();
	}

	public function getFieldId($id){
		$query = $this->db->get_where('field', 
			array('field_id' => $id));
		$result = $query->result_array();
		return $result[0]; 
	}
	public function findByField($param)
	{
		$query = $this->db->get_where(
			'field',$param);
		$result = $query->result_array();
		return $result;
	}
	public function findByInvoice($param)
	{
		$query = $this->db->get_where(
			'invoice',$param);
		$result = $query->result_array();
		return $result;
	}
	public function findByDetail($param)
	{
		$query = $this->db->get_where(
			'detail',$param);
		$result = $query->result_array();
		return $result;
	}

	public function findByAccomDetail($param)
	{
		$query = $this->db->get_where(
			'accom_detail',$param);
		$result = $query->result_array();
		return $result;
	}

	public function delete($id)
	{

		$this->db->delete('field',array('id'=>$id));
	}

	public function insertInvoice($param)
	{
		$this->db->insert('invoice',$param);
	}
	public function insertDetail($param)
	{
		$this->db->insert('detail',$param);
	}
	public function insertDetailAccom($param)
	{
		$this->db->insert('accom_detail',$param);
	}

	public function updateField($param,$id)
	{

		$this->db->where('field_id', $id);
		$this->db->update('field', $param);
	}
	public function updateHeader($param,$id)
	{

		$this->db->where('header_id', $id);
		$this->db->update('header', $param);
	}
	public function getDetailbyInvoice($id){
		$sql = ("
			SELECT d.invoice_id, i.ins_id, d.qty, f.name, f.price FROM invoice i
			 JOIN detail d on i.invoice_id = d.invoice_id
			  JOIN field f on d.field_id = f.field_id WHERE d.invoice_id = ?
			");
		$query = $this->db->query($sql,array($id));
		$result = $query->result_array();
		return $result;
	}

	public function getAccomDetailbyInvoice($id){
		$sql = ("
			SELECT a.invoice_id, i.ins_id, a.quantity, a.nights, a.checkin_date, a.checkout_date, g.name,g.price FROM invoice i
			 JOIN accom_detail a on i.invoice_id = a.invoice_id
			  JOIN accom g on a.accom_id = g.accom_id WHERE a.invoice_id = ?
			");
		$query = $this->db->query($sql,array($id));
		$result = $query->result_array();
		return $result;
	}

	public function tableHeaderPending(){
		$sql = "SELECT h.header_id, h.institution_id, i.institution_name, h.total_price, h.status, h.created_at FROM header h join institution i on h.institution_id = i.institution_id where status = 0 order by created_at DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function tableHeaderSuccess(){
		$sql = "SELECT h.header_id, h.institution_id, i.institution_name, h.total_price, h.status, h.created_at FROM header h join institution i on h.institution_id = i.institution_id where status = 1 order by created_at DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function tableHeaderDelete(){
		$sql = "SELECT h.header_id, h.institution_id, i.institution_name, h.total_price, h.status, h.created_at FROM header h join institution i on h.institution_id = i.institution_id where status = -1 order by created_at DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function checkMaxStockDB(){
		$sql = "SELECT stock FROM field where code = 'DB'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockSP(){
		$sql = "SELECT stock FROM field where code = 'SP'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockSB(){
		$sql = "SELECT stock FROM field where code = 'SB'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockSSW(){
		$sql = "SELECT stock FROM field where code = 'SSW'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockRD(){
		$sql = "SELECT stock FROM field where code = 'RD'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockNC(){
		$sql = "SELECT stock FROM field where code = 'NC'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockSC(){
		$sql = "SELECT stock FROM field where code = 'SC'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockST(){
		$sql = "SELECT stock FROM field where code = 'ST'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkMaxStockOBS(){
		$sql = "SELECT stock FROM field where code = 'OBS'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

        public function checkStockSuite(){
		$sql = "SELECT stock FROM accom where code = 'suite_room'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkStockDeluxe(){
		$sql = "SELECT stock FROM accom where code = 'deluxe_room'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkStockSupertv(){
		$sql = "SELECT stock FROM accom where code = 'superior_twin_tv'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkStockSuperntv(){
		$sql = "SELECT stock FROM accom where code = 'superior_twin_non_tv'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkStockStandtv(){
		$sql = "SELECT stock FROM accom where code = 'standard_twin_tv'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkStockStandntv(){
		$sql = "SELECT stock FROM accom where code = 'standard_twin_non_tv'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function checkStockBoarder(){
		$sql = "SELECT stock FROM accom where code = 'boarder_room'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
        public function payonarrival(){
		$query = $this->db->get('poa');
		$result = $query->result_array();
		return $result;
	}
	public function updatepoa($param,$id)
	{

		$this->db->where('poa_id', $id);
		$this->db->update('poa', $param);
	}
}
