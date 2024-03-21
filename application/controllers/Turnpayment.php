<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnpayment extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{

		$viewData['payment']  = $this->GlobalModel->getData('turn_payment',null);
		$this->load->view('global/header');
		$this->load->view('turnpayment/view',$viewData);
		$this->load->view('global/footer');
	}

	public function updateStatus($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->updateData('turn_payment',array('id_turn_payment'=>$value),array('status_turn_payment'=>$post['status']));
		redirect(BASEURL.'turnpayment');
	}
}
