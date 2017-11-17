<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $fieldList;
	private $accomList;
	public function __construct(){
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->model('transactionmodel');
		$this->load->model('fieldmodel');
		$this->load->model('confirmationmodel');
		$this->load->model('accom_model');
		$this->load->library('usermanager');
		$this->load->library('participantmanager');
		$this->load->library('transactionmanager');
		$this->load->library('confirmationmanager');

		$this->fieldList = $this->fieldmodel->getFieldPrice();
		$this->accomList = $this->accom_model->getAccomPrice();

		if($this->session->userdata("user_id") == null)
		{
			redirect('login');
		}
	}

	public function dashboardPage()
	{
		//SHOW LOGIN NAVBAR STYLE
		$id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        if($this->session->userdata('email') == 'myregis@international.aeo')
        {
            redirect('adminpage');
        }
        else if($this->session->userdata('email') == 'myregis@nasional.aeo')
        {
            redirect('adminpage');
        }
        else if($this->session->userdata('email') == 'competetition@aeo.bnec')
        {
            $data['content'] = 'home';
            $this->load->view('base', $data);
        }
        else
        {
    		$data['getData'] = $this->transactionmodel->getData($id);
    		$data['confirmation'] = $this->transactionmodel->getAllConfirmation($id);
    		$data['flight_ticket'] = true;
            $data['list'] = $this->usermodel->getInsFlight($id);
            $data['db'] = $this->transactionmodel->checkMaxStockDB();
            $data['sp'] = $this->transactionmodel->checkMaxStockSP();
            $data['ssw'] = $this->transactionmodel->checkMaxStockSSW();
            $data['sb'] = $this->transactionmodel->checkMaxStockSB();
            $data['sc'] = $this->transactionmodel->checkMaxStockSC();
            $data['rd'] = $this->transactionmodel->checkMaxStockRD();
            $data['st'] = $this->transactionmodel->checkMaxStockST();
            $data['nc'] = $this->transactionmodel->checkMaxStockNC();

            $data['sui'] = $this->transactionmodel->checkStockSuite();
            $data['del'] = $this->transactionmodel->checkStockDeluxe();
            $data['stv'] = $this->transactionmodel->checkStockSupertv();
            $data['sntv'] = $this->transactionmodel->checkStockSuperntv();
            $data['sttv'] = $this->transactionmodel->checkStockStandtv();
            $data['stntv'] = $this->transactionmodel->checkStockStandntv();
            $data['boa'] = $this->transactionmodel->checkStockBoarder();
            $data['css'] = true;
    		$data['js'] = true;
    		$data['content'] = 'dashboard';
    		$this->load->view('base', $data);
        }
	}

	public function editprofile(){
		$id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

		$data['content'] = 'editprofile';
		$this->load->view('base', $data);
	}

	public function doEditProfile(){
		$request = $this->input->post();
		$id = $this->session->userdata('user_id');
		$request['id'] = $this->session->userdata('user_id');

		$config['upload_path']          = 'assets/institution-logo/';
        $path = 'assets/institution-logo/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;        
        $config['file_name'] = $request['id'];             
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ins_logo'))
        {
            $data_upload = $this->upload->data();            
            $request['ins_logo']   = $path.$data_upload['file_name'];
        }else{
            console.log("Upload Image Failed!");            
            redirect('register');      
            
        }

        $param = $this->usermanager->editProfile($request);
        $this->usermodel->update($param, $id);
        redirect('dashboard');
	}
	public function changepassword()
	{
		$id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

		$data['js'] = true;
		$data['content'] = 'changepassword';
		$this->load->view("base",$data);
	}
	public function dochangepassword()
	{
		$request = $this->input->post();
		$id = $this->session->userdata('user_id');

		$param = $this->usermanager->changepassword($request);
		$this->usermodel->update($param, $id);
		redirect('dashboard');
	}
	public function senddelegates()
	{
		$id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

		$data['js'] = true;
		$data['css'] = true;
		$data['checkParticipantCaps'] = $this->participantmanager->getFieldCaps($id);
		$data['content'] = 'senddelegates';
		$data['checkDB'] = $this->transactionmodel->checkMaxStockDB();
        $data['checkSP'] = $this->transactionmodel->checkMaxStockSP();
        $data['checkSB'] = $this->transactionmodel->checkMaxStockSB();
        $data['checkSSW'] = $this->transactionmodel->checkMaxStockSSW();
        $data['checkRD'] = $this->transactionmodel->checkMaxStockRD();
        $data['checkNC'] = $this->transactionmodel->checkMaxStockNC();
        $data['checkSC'] = $this->transactionmodel->checkMaxStockSC();
        $data['checkST'] = $this->transactionmodel->checkMaxStockST();
        $data['checkOBS'] = $this->transactionmodel->checkMaxStockOBS();

		$this->load->view("base",$data);
	}
    public function recap()
    {        
        $id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        $request = $this->input->post();        
        $request['ins_id'] = $this->session->userdata('user_id');        
        $checkParticipantCaps = $this->participantmanager->getFieldCaps($request['ins_id']);
        $checkDebateCaps = $this->participantmanager->needDebateAdju($request['ins_id']);                
        if($checkParticipantCaps['DB'] == 1){
            $request['debateOneTeamAlready'] = true;
        }
        if($checkParticipantCaps['DB'] == 2 && $request['field-db'] > 0){
            $request['ADJ'] = true;
        }

        $data['filledList'] = $this->participantmanager->temporaryParticipant($request);
        $data['ins'] = $this->usermodel->getInsName($id);        
        $data['title'] = "Cart - Asian English Olympics 2017";
        $data['content'] = "recap";
        $this->load->view('base',$data);
    }

    public function pay()
    {
    	$id = $this->session->userdata('user_id');
		$data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        $request = $this->input->post();
        $request['ins_id'] = $this->session->userdata('user_id');
        if(array_key_exists("field", $request) == false){
            $this->session->flashdata('warningMsg',"Error !");
            redirect('registration/participantform');
        }
        $cart;        
        $request['totalprice'] = 0;
        $totalheader = 0;
        for($i=0; $i<count($request['field']); $i++){
            $field = $request['field'][$i];
            $cart[] = array(
                    'field' 	=> $request['field'][$i],
                    'qty' 		=> $request['qty'][$i],
                    'price' 	=> $this->fieldList[$field]['price'],
                    'total'		=> $this->fieldList[$field]['price'] * $request['qty'][$i]
                ); 

            $totalheader += $this->fieldList[$field]['price'] * $request['qty'][$i];
            $ins = $this->usermodel->getInsName($id);
            foreach ($ins as $key => $value) {
                if($value['country'] != 'indonesia'){
                    $request['totalprice'] = $totalheader + 6000;
                }else{
                    $request['totalprice'] = $totalheader;
                }   
            }
        }
        
        $param = $this->transactionmanager->buildParam($request);
        
        $this->transactionmodel->insertInvoice($param);

        $invoiceId = $this->transactionmodel->getLatestInvoice($request['ins_id']);
        foreach ($cart as $key => $value) {
            $request['invoiceId'] = $invoiceId['invoice_id'];
            $request['fieldId'] = $this->fieldmodel->findFieldByCode($value['field'])['field_id'];
            $request['qty'] = $value['qty'];
            $paramDetail = $this->transactionmanager->buildParamDetail($request);
            $this->transactionmodel->insertDetail($paramDetail);
        }
        redirect('payment-detail/'.$invoiceId['invoice_id']);
        
    }

    public function payment_detail2($invoiceId){
        $id = $this->session->userdata('user_id');
        $data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        $institution = $this->usermodel->find($id);
        $data['pic_name'] = $institution['pic'];
        $data['invoice'] = $this->transactionmodel->find($invoiceId);        
        if($data['invoice']['ins_id'] != $id){
            redirect('dashboard');
        }
        $data['ins'] = $this->usermodel->getInsName($id);
        $data['detail'] = $this->transactionmodel->getDetailByInvoice($invoiceId);
        $data['title'] = "Payment Detail - Asian English Olympics 2017";
        $data['content'] = "payment_detail";
        $this->load->view('base', $data);
    }

    public function getDetailTrans(){
        $id = $this->input->post('id');
        $detailTransaction = $this->transactionmodel->getDetailByInvoice($id);
        $headerTransaction = $this->transactionmodel->find($id);
        $institution = $this->usermodel->find($headerTransaction['ins_id']);
        if($detailTransaction[0]['ins_id'] != $this->session->userdata('user_id') 
            && $this->session->userdata('email') != 'aeo2018@gmail.com'){
            $data = array(
                'status' => "Error",                
                );
        }else{
            $data = array(
            'detailTransaction' => $detailTransaction,
            'status' => "success",
            'country' => $institution['country']
            );
        }
        echo json_encode($data);
    }

    public function deleteTransaction($id){
        $validateId = $this->transactionmodel->findByInvoice(array('invoice_id' => $id))[0];
        if($validateId['ins_id'] != $this->session->userdata('user_id') ){
            $this->session->set_flashdata('msg', 'Error Request !');
             redirect('dashboard');
        }
        
        $this->transactionmodel->deleteInvoice($id);
        $this->session->set_flashdata('warningMsg', 'Payment Has Been Cancelled !');
        redirect('dashboard');
    }

    public function confirmation_form(){
        $id = $this->session->userdata('user_id');
        $data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        $getAllUnapprovedInvoice = $this->transactionmodel->getAllUnapprovedInvoice($id);
        $allInvoiceId = [];
        foreach ($getAllUnapprovedInvoice as $key => $value) {
            $allInvoiceId[] = $value['invoice_id'];
        }
        $data['allInvoiceId'] = json_encode($allInvoiceId);
        $data['js'] = true;
        $data['title'] = "Payment Confirmation - Asian English Olympics 2017";
        $data['content'] = "confirmation_form";
        $this->load->view('base', $data);
    }

    public function doConfirmation(){
        $id = $this->session->userdata('user_id');
        $data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        $request = $this->input->post();
        $request['ins_id'] = $this->session->userdata('user_id');
        
        $config['upload_path']          = 'assets/confirmation_photos/';
        $path 							= 'assets/confirmation_photos/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;        
        $config['file_name'] 			= $request['invoiceid'];             
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bill_photo'))
        {
            $data_upload = $this->upload->data();            
            $request['image_path'] = $path.$data_upload['file_name'];
        }else{
            $this->session->set_flashdata('warningMsg', "Upload Image Failed!");            
            redirect('dashboard/confirmation');    
        }

        $validateOrder = $this->confirmationmodel->findBy(array('invoice_id' => $request['invoiceid']));

        if(!$validateOrder){    
            $insertConfirmationParam = $this->confirmationmanager->prepareInsertConfirm($request);
            $this->confirmationmodel->insert($insertConfirmationParam); 
            $this->session->set_flashdata('msg', "Confirmation Payment  Has Been Made, Please Wait Until Admin Approve Your Payment");       
            redirect('dashboard');
        }else{
            $this->session->set_flashdata('errorMsg',"Order has been confirmed Before !");
            redirect('dashboard/confirmation');
        }
    }

    public function doFlight(){
        $id = $this->session->userdata('user_id');
        $request = $this->input->post();
        $request['id'] 					= $this->session->userdata('user_id');
        $config['upload_path']          = 'assets/flight_ticket/';
        $path 							= 'assets/flight_ticket/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']             = 10000;        
        $config['file_name'] 			= sprintf("10").$request['id'];             
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('flight_ticket'))
        {
            $this->session->set_flashdata('warningMsg', "Upload Image Failed!");            
            console.log("Upload image failed");
            redirect('dashboard');
        }else{
            $data_upload = $this->upload->data();            
            $request['flight_ticket'] = $path.$data_upload['file_name'];
            $param = $this->usermanager->updateFlight($request);
            $this->usermodel->update($param, $id);
            $this->session->set_flashdata('msg', "Upload Flight Ticket Success!");
            redirect('dashboard');        
        }
    }

    public function getdream()
    {        
    	$id = $this->session->userdata('user_id');
        $user = $this->usermodel->find($id);
        $data = array(
        	'user' => $user,
        	'status' => "success"
        );
        
        echo json_encode($data);
    }

    public function addnobledream(){
    	$id = $this->session->userdata('user_id');
    	$request = $this->input->post();
        
        $param = array(
        	"noble_dream" => $request['noble_dream']
        );
        $this->session->set_flashdata('msg', "Data Has Been Successfully Updated!");
        $this->usermodel->update($param, $id);
    }

    public function accommodation_form(){
    	$id = $this->session->userdata('user_id');
        $data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);
        $this->load->library('cart');
        
        //$this->cart->destroy(); //to destroy cart

        $ins_id = $this->session->userdata('user_id');
        $code = null !== $this->input->post('code') ? $this->input->post('code') : null;

        $data['title'] = "Accommodation Form - Asian English Olympics 2017";
        $data['ins'] = $this->usermodel->getInsName($ins_id);

        $request = $this->input->post();        
        $request['ins_id'] = $this->session->userdata('user_id');
        $dataRoom; $totalRoom;

        if ($code != null){
            $splitCode = explode(':', $code);
            $dataRoom = array(
                array(
                        'id' => rand(),
                        'code' => $splitCode[0], 
                        'name' => $splitCode[1],
                        'qty' => $this->input->post('field'), 
                        'checkin_date' => $this->input->post('date1'),
                        'checkout_date' => $this->input->post('date2'),
                        'night' => $this->input->post('night'),
                        'price'=> $this->accomList[$splitCode[0]]['price'],
                        'totalprice' => $this->input->post('field')*$this->input->post('night')*$this->accomList[$splitCode[0]]['price']
                    )  
                );


            for($i=0; $i<count($dataRoom); $i++){
                if($dataRoom[$i]['qty'] == 0){
                    continue;
                }else{
                    $this->cart->insert($dataRoom);
                }
            }
        }

        $data['checkSuite'] = $this->transactionmodel->checkStockSuite();
        $data['checkDeluxe'] = $this->transactionmodel->checkStockDeluxe();
        $data['checkSupertv'] = $this->transactionmodel->checkStockSupertv();
        $data['checkSuperntv'] = $this->transactionmodel->checkStockSuperntv();
        $data['checkStandtv'] = $this->transactionmodel->checkStockStandtv();
        $data['checkStandntv'] = $this->transactionmodel->checkStockStandntv();
        $data['checkBoarder'] = $this->transactionmodel->checkStockBoarder();
        $data['content'] = "accommodation_form";
        $data['js'] = true; $data['css'] = true;
        $this->load->view('base', $data);
    }

    public function remove($rowid){
        $this->load->library('cart');
      
        
        // Destroy selected rowid in session.
        $data = array(
        'rowid' => $rowid,
        'qty' => 0
        );
        // Update cart data, after cancel.
        $this->session->set_flashdata('warningMsg',"This item has been removed from cart !");
        $this->cart->update($data);
        
        redirect('accommodation-form');
    }

    public function pay2()
    {
    	$id = $this->session->userdata('user_id');
        $data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);

        $this->load->library('cart');
        
        if(count($this->cart->contents()) == 0){
            redirect('accommodation-form');
        }

        $ins_id = $this->session->userdata('user_id');  
        $request = array();
        $request['ins_id'] = $this->session->userdata('user_id');
        
        $cart = $this->cart->contents();        

        $total_price_tmp = 0;
        $totalqty_tmp = 0;
        foreach ($cart as $key => $value) {
            $total_price_tmp += $this->accomList[$value['code']]['price'] * $value['qty'] * $value['night'];
            $totalqty_tmp += $value['qty'];
            if($value['code']=='boarder_room'){
                $totalqty_tmp = $totalqty_tmp - $value['qty'];
            }            
        }
        $request['totalprice'] = $total_price_tmp + ($totalqty_tmp * 200000);
        $param = $this->transactionmanager->buildParamAccom($request);
        $this->transactionmodel->insertInvoice($param);
        $request['total_price'] = 0;

        $invoiceId = $this->transactionmodel->getLatestInvoice($request['ins_id']);

        $total_price = 0;
        $total_qty = 0;
        foreach ($cart as $key => $value) {
            $request['ins_id'] = $this->session->userdata('user_id');
            $request['invoiceId'] = $invoiceId['invoice_id'];
            $request['accomId'] = $this->fieldmodel->findTypeByCode($value['code'])['accom_id'];
            $request['qty'] = $value['qty'];
            $request['nights'] = $value['night'];
            $request['checkin_date'] = $value['checkin_date'];
            $request['checkout_date'] = $value['checkout_date'];
            $request['price'] = $value['price'];
            $total_price += $this->accomList[$value['code']]['price'] * $value['qty'] * $value['night'];            
            $total_qty += $value['qty'];
            $request['totalprice'] = $total_price + ($total_qty * 200000);

            $paramDetail = $this->transactionmanager->buildParamAccomDetail($request);
            $this->transactionmodel->insertDetailAccom($paramDetail);            
        
        }

        $this->cart->destroy();

        $this->session->set_flashdata('msg',"Invoice ID created. You will be redirected to your payment details !");
        redirect('payment-detail-accommodation/'.$invoiceId['invoice_id']);
        
    }

    public function payment_detail3($invoiceId){
        $id = $this->session->userdata('user_id'); 
        $data['userlogin'] = true;
		$data['userdata'] = $this->usermodel->find($id);
       
        $institution = $this->usermodel->find($id);
        $data['pic_name'] = $institution['pic'];
        $data['invoice'] = $this->transactionmodel->find($invoiceId);        
        if($data['invoice']['ins_id'] != $id){
            $this->session->set_flashdata('warningMsg',"Error");
            redirect('dashboard');
        }
        $data['ins'] = $this->usermodel->getInsName($id);
        $data['detail'] = $this->transactionmodel->getAccomDetailByInvoice($invoiceId);
        $data['title'] = "Accommodation Payment Detail - Asian English Olympics 2017";
        $data['content'] = "payment_detail2";
        $this->load->view('base', $data);
    }

    public function getDetailAccom(){
        $id = $this->input->post('id');
        $detailAccom = $this->transactionmodel->getAccomDetailByInvoice($id);
        $invoiceTransaction = $this->transactionmodel->find($id);
        $institution = $this->usermodel->find($invoiceTransaction['ins_id']);
        if($detailAccom[0]['ins_id'] != $this->session->userdata('user_id') 
            && $this->session->userdata('email') != 'aeo2017@gmail.com'){
            $data = array(
                'status' => "Error",                
                );
        }else{
            $data = array(
            'detailAccom' => $detailAccom,
            'status' => "success",
            'country' => $institution['country']
            );
        }
        echo json_encode($data);
    }
}
