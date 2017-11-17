<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participantmanager{
	private $fieldList;

	function __construct()
	{
		$CI =& get_instance();
		$CI->load->model('fieldmodel');
		$CI->load->library('session');
		$this->fieldList = $CI->fieldmodel->getFieldPrice();        

	}
	public function temporaryParticipant($request)
	{
		$CI =& get_instance();
		$CI->load->library('participantmanager');
		$checkParticipantCaps = $CI->participantmanager->getFieldCaps($request['ins_id']);
		$field;
		if($request['field-sp'] == 0 && $request['field-sb'] == 0 && $request['field-sc'] == 0 && $request['field-rd'] == 0 && $request['field-ssw'] == 0 && $request['field-st'] == 0 && $request['field-obs'] == 0 && $request['field-db'] == 0 && $request['field-nc'] == 0 ){
			$CI->session->set_flashdata('warningMsg', "You Must Choose the Competition First !");
			redirect('send-delegates');
		}
		if(array_key_exists('field-sp', $request)){
			if($request['field-sp'] > 0) {
				$field[] = array('code' =>'SP', 'name' => "Speech",'qty' => $request['field-sp'],'price'=> $this->fieldList['SP']['price'],'totalprice' => $request['field-sp']*$this->fieldList['SP']['price']);			
			}
		}
		if(array_key_exists('field-sb', $request)){
			if($request['field-sb'] > 0){
				$field[] = array('code' =>'SB','name' => "Spelling Bee",'qty' => $request['field-sb'],'price'=> $this->fieldList['SB']['price'],'totalprice' => $request['field-sb']*$this->fieldList['SB']['price']);				
			}
		}
		if(array_key_exists('field-sc', $request)){
			if($request['field-sc'] > 0){
				$field[] = array('code' =>'SC','name' => "Scrabble",'qty' => $request['field-sc'],'price'=> $this->fieldList['SC']['price'],'totalprice' => $request['field-sc']*$this->fieldList['SC']['price']);				
			}
		}
		if(array_key_exists('field-ssw', $request)){
			if($request['field-ssw'] > 0){
				$field[] = array('code' =>'SSW','name' => "Short Story Writing",'qty' => $request['field-ssw'],'price'=> $this->fieldList['SSW']['price'],'totalprice' => $request['field-ssw']*$this->fieldList['SSW']['price']);				
			}
		}
		if(array_key_exists('field-st', $request)){
			if($request['field-st'] > 0){
				$field[] = array('code' =>'ST','name' => "Story Telling",'qty' => $request['field-st'],'price'=> $this->fieldList['ST']['price'],'totalprice' => $request['field-st']*$this->fieldList['ST']['price']);				
			}
		}
		if(array_key_exists('field-db', $request)){
			if($request['field-db'] > 0){
				$field[] = array('code' =>'DB','name' => "Debate (Participant)",'qty' => $request['field-db']*2,'price'=> $this->fieldList['DB']['price'],'totalprice' => $request['field-db']*$this->fieldList['DB']['price']*2);				
			}if($request['field-db']>1){
				$request['ADJ'] = true;
			}if($request['field-db'] == 3){
				$request['doubleAdj'] = true;
			}if(isset($request['debateOneTeamAlready']) && $request['field-db'] == 2){
				$request['doubleAdj'] = true;
			}
		}
		if(array_key_exists('field-rd', $request)){
			if($request['field-rd'] > 0){
				$field[] = array('code' =>'RD', 'name' => "Radio Drama",'qty' => $request['field-rd'],'price'=> $this->fieldList['RD']['price'],'totalprice' => $request['field-rd']*$this->fieldList['RD']['price']);				
			}
		}
		if(array_key_exists('field-nc', $request)){
			if($request['field-nc'] > 0){
				$field[] = array('code' =>'NC', 'name' => "Newscasting",'qty' => $request['field-nc'],'price'=> $this->fieldList['NC']['price']	,'totalprice' => $request['field-nc']*$this->fieldList['NC']['price']);				
			}
		}
		if(array_key_exists('field-obs', $request)){
			if($request['field-obs'] > 0){
				$field[] = array('code' =>'OBS', 'name' => "Observer",'qty' => $request['field-obs'],'price'=> $this->fieldList['OBS']['price']	,'totalprice' => $request['field-obs']*$this->fieldList['OBS']['price']);				
			}
		}
		if(isset($request['ADJ'])){
			if(isset($request['doubleAdj'])){
				$field[] = array('code' =>'ADJ', 'name' => "Debate Adjudicator",'qty' => 2,'price'=> $this->fieldList['ADJ']['price']*2	,'totalprice' => $this->fieldList['ADJ']['price']*2);											
			}else{
				$field[] = array('code' =>'ADJ','name' => "Debate Adjudicator",'qty' => 1,'price'=> $this->fieldList['ADJ']['price']	,'totalprice' => $this->fieldList['ADJ']['price']);							
			}
		}
		return $field;
	}

	public function temporaryAccom($request){
		$CI =& get_instance();
		$CI->load->library('participantmanager');
		$CI->load->library('session');
		
		$acc;
		if($request['field-boarder'] == 0 && 
			$request['night-boarder'] == 0 &&  
			$request['field-suite'] == 0 && $request['night-suite'] == 0 && 
			$request['field-deluxe'] == 0 && $request['night-deluxe'] == 0 && 
			$request['field-supertv'] == 0 && $request['night-supertv'] == 0 && 
			$request['field-superntv'] == 0 && $request['night-superntv'] == 0 && 
			$request['field-standtv'] == 0 && $request['night-standtv'] == 0 && 
			$request['field-standntv'] == 0 && $request['night-standntv'] == 0
			){
			$CI->session->set_flashdata('warningMsg', "You Must Choose the Accommodation First !");
			redirect('accommodation-form');
		}
		if(array_key_exists('field-boarder', $request)){
			if($request['field-boarder'] > 0 && $request['night-boarder'] > 0) {
				$acc[] = array(
					'code' =>'boarder_room', 
					'name' => "Boarder",
					'qty' => $request['field-boarder'], 
					'checkin_date' => $request['date1'],
					'checkout_date' => $request['date2'],
					'night' => $request['night-boarder'],
					'price'=> $this->accomList['boarder_room']['price'],
					'totalprice' => $request['field-boarder']*$request['night-boarder']*$this->accomList['boarder_room']['price']);			
			}
		}
		if(array_key_exists('field-suite', $request)){
			if($request['field-suite'] > 0 && $request['night-suite'] > 0) {
				$acc[] = array(
					'code' =>'suite_room', 
					'name' => "Suite",
					'qty' => $request['field-suite'], 
					'night' => $request['night-suite'],
					'checkin_date' => $request['date3'],
					'checkout_date' => $request['date4'],
					'price'=> $this->accomList['suite_room']['price'],
					'totalprice' => $request['field-suite']*$request['night-suite']*$this->accomList['suite_room']['price']);			
			}
		}
		if(array_key_exists('field-deluxe', $request)){
			if($request['field-deluxe'] > 0 && $request['night-deluxe'] > 0) {
				$acc[] = array(
					'code' =>'deluxe_room', 
					'name' => "Deluxe",
					'qty' => $request['field-deluxe'], 
					'night' => $request['night-deluxe'],
					'checkin_date' => $request['date5'],
					'checkout_date' => $request['date6'],
					'price'=> $this->accomList['deluxe_room']['price'],
					'totalprice' => $request['field-deluxe']*$request['night-deluxe']*$this->accomList['deluxe_room']['price']);			
			}
		}
		if(array_key_exists('field-supertv', $request)){
			if($request['field-supertv'] > 0 && $request['night-supertv'] > 0) {
				$acc[] = array(
					'code' =>'superior_twin_tv', 
					'name' => "Superior Twin with TV",
					'qty' => $request['field-supertv'], 
					'night' => $request['night-supertv'],
					'checkin_date' => $request['date7'],
					'checkout_date' => $request['date8'],
					'price'=> $this->accomList['superior_twin_tv']['price'],
					'totalprice' => $request['field-supertv']*$request['night-supertv']*$this->accomList['superior_twin_tv']['price']);			
			}
		}
		if(array_key_exists('field-superntv', $request)){
			if($request['field-superntv'] > 0 && $request['night-superntv'] > 0) {
				$acc[] = array(
					'code' =>'superior_twin_non_tv', 
					'name' => "Superior Twin Non TV",
					'qty' => $request['field-superntv'], 
					'night' => $request['night-superntv'],
					'checkin_date' => $request['date9'],
					'checkout_date' => $request['date10'],
					'price'=> $this->accomList['superior_twin_non_tv']['price'],
					'totalprice' => $request['field-superntv']*$request['night-superntv']*$this->accomList['superior_twin_non_tv']['price']);			
			}
		}
		if(array_key_exists('field-standtv', $request)){
			if($request['field-standtv'] > 0 && $request['night-standtv'] > 0) {
				$acc[] = array(
					'code' =>'standard_twin_tv', 
					'name' => "Standard Twin with TV",
					'qty' => $request['field-standtv'], 
					'night' => $request['night-standtv'],
					'checkin_date' => $request['date11'],
					'checkout_date' => $request['date12'],
					'price'=> $this->accomList['standard_twin_tv']['price'],
					'totalprice' => $request['field-standtv']*$request['night-standtv']*$this->accomList['standard_twin_tv']['price']);			
			}
		}
		if(array_key_exists('field-standntv', $request)){
			if($request['field-standntv'] > 0 && $request['night-standntv'] > 0) {
				$acc[] = array(
					'code' =>'standard_twin_non_tv', 
					'name' => "Standard Twin Non TV",
					'qty' => $request['field-standntv'], 
					'night' => $request['night-standntv'],
					'checkin_date' => $request['date13'],
					'checkout_date' => $request['date14'],
					'price'=> $this->accomList['standard_twin_non_tv']['price'],
					'totalprice' => $request['field-standntv']*$request['night-standntv']*$this->accomList['standard_twin_non_tv']['price']);			
			}
		}
		return $acc;

		
	}

	public function needDebateAdju($id)
	{
		//Field ID 
		/* 1 = DB 
		*/
		$CI =& get_instance();
		$CI->load->model('fieldmodel');
		$CI->load->model('participantmodel');	
		$debateParticipant = $CI->participantmodel->findBy(array(
			'ins_id' => $id,
			'par_comp' => "DB"
			));
		if(count($debateParticipant) <3){
			return false;
		}
		return true;
	}

	public function getFieldCaps($id)
	{
		$CI =& get_instance();
		$CI->load->model('fieldmodel');		
		$CI->load->model('participantmodel');	
		$participantList = array(
			"DB" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "DB")))/2,
			"NC" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "NC"))),
			"RD" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "RD")))/6,
			"SB" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "SB"))),
			"SC" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "SC"))),
			"SP" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "SP"))),
			"SSW" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "SSW"))),
			"ST" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "ST"))),
			"ADJ" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "ADJ"))),
			"OBS" => count($CI->participantmodel->findBy(array("ins_id" => $id, 'par_comp' => "OBS"))),
			);
		return $participantList;
	}

	public function buildParamParticipant($post){
		if(array_key_exists("par_team", $post) == false){
			$post['par_team'] = '';
		}
		if(array_key_exists("par_name", $post) == false){
			$post['par_name'] = '';
		}
		$param = array(
			'par_id' => '',
			'ins_id' => $post['id'],
			'par_comp' => $post['comp_code'],
			'par_name' => $post['name'],
			'par_email' => $post['email'],
			'part_team' => $post['team']
		);
		return $param;
	}

	public function buildParamParticipantAccom($post){
		date_default_timezone_set('Asia/Jakarta');
		if(array_key_exists("name", $post) == false){
			$post['name'] = '';
		}
		$param = array(
			'id' => '',
			'ins_id' => $post['ins_id'],
			'checkin_date' => $post['checkin_date'],
			'checkout_date' => $post['checkout_date'],
			'room_type' => $post['code'],
			'booking_date' => date('Y-m-d H:i:s')
		);
		return $param;
	}
}
