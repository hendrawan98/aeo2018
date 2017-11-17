<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmationmanager
{
	public function prepareInsertConfirm($post)
	{
		if($post['payment_type'] == 'national')
		{
			if(array_key_exists('invoiceid', $post) == false)
			{
				redirect('dashboard/confirmation');
			}
			if(array_key_exists('bank_name', $post) == false)
			{	
				redirect('dashboard/confirmation');
			}
			if(array_key_exists('rek_name', $post) == false)
			{
				redirect('dashboard/confirmation');
			}
			if(array_key_exists('total_transfer', $post) == false)
			{
				redirect('dashboard/confirmation');
			}
			return $this->paramConfirmation($post);

		}else if($post['payment_type'] == 'international') {
			if(array_key_exists('invoiceid', $post) == false)
			{
				redirect('dashboard/confirmation');
			}
			$post['bank_name'] = "Western Union";
			$post['rek_name'] = "Western Union";
			$post['total_transfer'] = 0;
			return $this->paramConfirmation($post);	
		}
			return 0;
		
	}

	public function paramConfirmation($post)
	{
		date_default_timezone_set('Asia/Jakarta');
		$param = array(

			'confirmation_id' 	=> '', 
			'invoice_id' 		=> $post['invoiceid'],
			'ins_id' 			=> $post['ins_id'],
			'bank_transfer' 	=> $post['bank_name'],
			'rek_name' 			=> $post['rek_name'],
			'total_transfer' 	=> $post['total_transfer'],
			'image_path' 		=> $post['image_path'],
			'payment_type'		=> $post['payment_type'],
			'status' 			=> 0,
			'created_at'		=> date('Y-m-d H:i:s')
			);
		return $param;
	}
}
