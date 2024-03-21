<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claimreferral extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['item'] = $this->GlobalModel->queryManual('SELECT * FROM referral_code_voucher rcv JOIN user_customer usc ON rcv.id_user_customer=usc.id_user_customer WHERE rcv.status_voucher="3" ');
		$viewData['itemtwo'] = $this->GlobalModel->queryManual('SELECT * FROM referral_code_voucher rcv JOIN user_customer usc ON rcv.id_user_customer=usc.id_user_customer WHERE rcv.status_voucher="4" ');

		$this->load->view('global/header');
		$this->load->view('claimreferral/view',$viewData);
		$this->load->view('global/footer');
	}

	public function claimAct($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->updateData('referral_code_voucher',array('id_referral_code_voucher'=>$value),array('status_voucher'=>4,'kategori_voucher'=>'acc_claim_duit'));
		redirect(BASEURL.'claimreferral');
	}
}