<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionmanager
{
	public function buildParam($request)
	{
		date_default_timezone_set('Asia/Jakarta');
		$param = array(
			'invoice_id' => sprintf("10").sprintf("%02s",date('d')).sprintf("%02s",date('H')).sprintf("%02s",date('i')).sprintf("%02s",date('s')),
			'ins_id' => $request['ins_id'],
			'total_price' => $request['totalprice'],
			'status' => 0,
			'created_at' => date('Y-m-d H:i:s')
			);
		return $param;
	}
	public function buildParamDetail($request)
	{
		date_default_timezone_set('Asia/Jakarta');
		$param = array(
			'detail_id' => '',
			'invoice_id' => $request['invoiceId'],
			'field_id' => $request['fieldId'],
			'qty' => $request['qty'],
			'created_at' => date('Y-m-d H:i:s')
			);
		return $param;
	}

	public function buildParamAccom($request)
	{
		date_default_timezone_set('Asia/Jakarta');
		$param = array(
			'invoice_id' => sprintf("20").sprintf("%02s",date('d')).sprintf("%02s",date('H')).sprintf("%02s",date('i')).sprintf("%02s",date('s')),
			'ins_id' => $request['ins_id'],
			'total_price' => $request['totalprice'],
			'status' => 0,
			'created_at' => date('Y-m-d H:i:s')
			);
		return $param;
	}

	public function buildParamAccomDetail($request)
	{
		date_default_timezone_set('Asia/Jakarta');
		$param = array(
			'detail_id' => '',
			'ins_id' => $request['ins_id'],
			'invoice_id' => $request['invoiceId'],
			'accom_id' => $request['accomId'],
			'quantity' => $request['qty'],
			'nights' => $request['nights'],
			'checkin_date' => $request['checkin_date'],
			'checkout_date' => $request['checkout_date'],
			'booking_date' => date('Y-m-d H:i:s')
			);
		return $param;
	}
}
