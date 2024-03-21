<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allcabang extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['admin']	=	$this->GlobalModel->getData('administrator',null);
		$this->load->view('global/header');
		$this->load->view('transaksi/allcabang/view',$viewData);
		$this->load->view('global/footer');
	}	

	public function shipping($value='')
	{
		$post = $this->input->post();

		$viewData['dataShip'] = $this->GlobalModel->queryManual('SELECT DISTINCT adm.nama as nama_admin,AVG(tor.shipping_amount) as shipping_amount FROM transaction_order tor JOIN administrator adm ON tor.id_administrator=adm.id_administrator WHERE tor.id_tracking_biteship !="" ');

		$this->load->view('global/header');
		$this->load->view('transaksi/allcabang/showshipp',$viewData);
		$this->load->view('global/footer');
	}
}