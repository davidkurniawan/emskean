<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		// pre($this->session->userdata());

		$getDataOrders = $this->GlobalModel->getData('transaction_order',array('transaction_status'=>1));
		foreach ($getDataOrders as $key => $value) {
			if (date('Y-m-d H:i:s') >= $value['date_expired']) {
				$this->GlobalModel->updateData('transaction_order',array('transaction_order_id'=>$value['transaction_order_id'],'transaction_status'=>1),array('transaction_status'=>3));
			}
		}
		
		$this->load->view('global/header');
		$this->load->view('dashboard/view');
		$this->load->view('global/footer');
	}
}
