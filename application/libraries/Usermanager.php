<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanager{
	public function validateDate($request){
		if(array_key_exists('institution', $request) == false){
			redirect('register');
		}
		if(array_key_exists('pic', $request) == false){
			redirect('register');
		}
		if(array_key_exists('email', $request) == false){
			redirect('register');
		}
		if(array_key_exists('password', $request) == false){
			redirect('register');
		}
		if(array_key_exists('ins_type', $request) == false){
			redirect('register');
		}
		if(array_key_exists('country', $request) == false){
			redirect('register');
		}
		if(array_key_exists('ins_logo', $request) == false){
			redirect('register');
		}
		if(array_key_exists('phone', $request) == false){
			redirect('register');
		}

		return $this->buildParam($request);
	}
	public function buildParam($request){
		date_default_timezone_set('Asia/Jakarta');
		$param = array(
			'id'=> '',
			'email'				=> $request['email'],
			'password'			=> md5($request['password']),
			'pic'				=> $request['pic'],
			'institution'		=> $request['institution'],
			'country'			=> $request['country'],
			'institution_type'	=> $request['ins_type'],
			'institution_logo'	=> $request['ins_logo'],
			'flight_ticket'		=> '',
			'timestamp' 		=> date('Y-m-d H:i:s'),
			'phone' 			=> $request['phone']
		);
		return $param;
	}

	public function editProfile($request){
		$param = array(
			'email'				=> $request['email'],
			'pic'				=> $request['pic'],
			'institution'		=> $request['institution'],
			'institution_logo'	=> $request['ins_logo'],
			'phone'				=> $request['phone']
		);
		return $param;
	}

	public function changepassword($request){
		$param = array(
			'password'	=> md5($request['password']),
		);
		return $param;
	}

	public function updateFlight($request)	
	{
		$param= array(					
			'flight_ticket' => $request['flight_ticket']
		);

		return $param;
	}	
}
