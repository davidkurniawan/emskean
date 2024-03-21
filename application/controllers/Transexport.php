<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transexport extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['cabang']	=	$this->GlobalModel->getData('administrator',null);
		$this->load->view('global/header');
		$this->load->view('transaksi/trans-export',$viewData);
		$this->load->view('global/footer');
	}

	public function getDataExport($value='')
	{
		$post = $this->input->post();
		$viewData['cabang']	=	$this->GlobalModel->getData('administrator',null);
		$viewData['reseller'] = $this->GlobalModel->getData('user_customer',null); 
		$viewData['data'] = $this->GlobalModel->queryManual('SELECT ator.email as cabang,ator.nama as nama_cabang ,tor.payment_method,tor.payment_code, uc.id_user_customer,uc.kode_pos,uc.phone, uc.user_nik, uc.nama, uc.provinsi,uc.kota,uc.kecamatan,uc.kelurahan,uc.alamat,uc.created_date,stro.nama_status_transaksi, tor.pajak, tor.transaction_id, tor.date_created,tor.total_qty,tor.total_harga,tor.potongan_product, tor.shipping_amount FROM transaction_order tor JOIN administrator ator ON tor.id_administrator=ator.id_administrator JOIN user_customer uc ON tor.id_user_customer=uc.id_user_customer JOIN status_transaksi stro ON tor.transaction_status=stro.id_status_transaksi WHERE tor.date_created >="'.date("Y-m-d",strtotime($post["start"])).'" AND tor.date_created <="'.date("Y-m-d",strtotime($post["end"])).'"    ');
		$viewData['paymentFee'] = $this->GlobalModel->getData('payment_xendit',null);
		$this->load->view('global/header');
		$this->load->view('transaksi/data-export',$viewData);
		$this->load->view('global/footer');
	}
}
