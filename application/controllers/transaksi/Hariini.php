<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hariini extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$today = date("Y-m-d");
		$idAdmin = $this->session->userdata('idAdmin');

		
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN product pro ON tor.id_product=pro.id_product');

		$this->load->view('global/header');
		$this->load->view('transaksi/orders/view',$viewData);
		$this->load->view('global/footer');
	}	
}