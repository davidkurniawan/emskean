<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Orders extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		$this->load->library('ciqrcode');
	}
	
	public function index()
	{
		if ($this->session->userdata('flagAdmin') == 1) {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE tor.transaction_status="2" ');
		} else {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE adt.id_administrator="'.$idAdmin.'" AND tor.transaction_status="2" ');
		}
		$viewData['flagedit']	=	0;

		$this->load->view('global/header');
		$this->load->view('transaksi/orders/view',$viewData);
		$this->load->view('global/footer');
	}	

	public function pending($value='')
	{
		if ($this->session->userdata('flagAdmin') == 1) {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE tor.transaction_status="1" ');
		} else {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE adt.id_administrator="'.$idAdmin.'" AND tor.transaction_status="1" ');
		}
		$viewData['flagedit']	=	0;

		$this->load->view('global/header');
		$this->load->view('transaksi/orders/view',$viewData);
		$this->load->view('global/footer');
	}

	public function expired($value='')
	{
		if ($this->session->userdata('flagAdmin') == 1) {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE tor.transaction_status="3" ');
		} else {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE adt.id_administrator="'.$idAdmin.'" AND tor.transaction_status="3" ');
		}
		$viewData['flagedit']	=	0;

		$this->load->view('global/header');
		$this->load->view('transaksi/orders/view',$viewData);
		$this->load->view('global/footer');
	}

	public function manualtf($value='')
	{
		if ($this->session->userdata('flagAdmin') == 1) {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE tor.transaction_status="6" ');
		} else {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator WHERE adt.id_administrator="'.$idAdmin.'" AND tor.transaction_status="0" ');
		}
		
		$viewData['flagedit']	=	0;

		$this->load->view('global/header');
		$this->load->view('transaksi/orders/view',$viewData);
		$this->load->view('global/footer');
	}

	public function detail($value='')
	{
		$viewData['orders'] = $this->GlobalModel->queryManualRow('SELECT * FROM transaction_order tor JOIN user_customer ucr ON tor.id_user_customer=ucr.id_user_customer WHERE tor.transaction_order_id="'.$value.'" ');
		$viewData['status_transaksi'] = $this->GlobalModel->getData('status_transaksi',null);	
		$viewData['status_ekspedisi'] = $this->GlobalModel->getData('ekspedisi_status',null);	


		$this->load->view('global/header');
		$this->load->view('transaksi/orders/transaksi-review',$viewData);
		$this->load->view('global/footer');
	}

	public function detailno($value='')
	{
		$viewData['orders'] = $this->GlobalModel->queryManualRow('SELECT * FROM transaction_order tor JOIN user_customer ucr ON tor.id_user_customer=ucr.id_user_customer WHERE tor.transaction_order_id="'.$value.'" ');
		$viewData['status_transaksi'] = $this->GlobalModel->getData('status_transaksi',null);	
		$viewData['status_ekspedisi'] = $this->GlobalModel->getData('ekspedisi_status',null);	
		
		
		$this->load->view('global/header');
		$this->load->view('transaksi/orders/transaksi-review-no',$viewData);
		$this->load->view('global/footer');
	}

	public function updateStatus($value='')
	{
		$post= $this->input->post();
		// pre($value);
		$insertData = array(
			'transaction_status'	=>	$post['statusTransaksi'],
			'update_trans_date'	=>	date("Y-m-d H:i:s"),
			'payment_code'		=>	'dashboard',
		);
		$this->GlobalModel->updateData('transaction_order',array('transaction_order_id'=>$value),$insertData);
		$getDataTransaksi = $this->GlobalModel->getDataRow('transaction_order',array('transaction_order_id'=>$value));

		if ($post['statusTransaksi'] == 2) {
			$getDataUser = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$getDataTransaksi['id_user_customer']));
			$poinCalculate = (($getDataTransaksi['total_harga'] - $checkID['potongan_product']) / 1000) / 100;

			$generateQrCode = $this->bardcodeGenerate(BASEURL.'tiket/validasi/'.$getDataTransaksi['transaction_reff_id'],$getDataTransaksi['transaction_reff_id']);
			// Insert Poin
			// $this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$getDataUser['id_user_customer']),array('poin'=> $getDataUser['poin'] + $poinCalculate));
		}
		

		if (!empty($getDataTransaksi['id_order_biteship'])) {
			
			$responseConfirmBiteShip = json_decode(confirmBiteShipApi($getDataTransaksi['id_order_biteship']),TRUE);
		  	$updateEkpedisi = array(
		  		'ekspedisi_status'	=> 2,
		  		'id_tracking_biteship'	=>	$responseConfirmBiteShip['courier']['tracking_id'],
		  		'nomer_resi'	=>	$responseConfirmBiteShip['courier']['waybill_id']
		  	);

	  		$this->GlobalModel->updateData('transaction_order',array('transaction_order_id'=>$value),$updateEkpedisi);
		
		}


		redirect(BASEURL.'transaksi/orders/detail/'.$value);
	}

	public function updateResi($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'nomer_resi'=>	$post['nomer_resi'],
			'update_trans_date'	=>	date("Y-m-d H:i:s")
		);
		// pre($insertData);
		$this->GlobalModel->updateData('transaction_order',array('transaction_order_id'=>$value),$insertData);
		redirect(BASEURL.'transaksi/orders/detail/'.$value);
	}

	public function updatePengiriman($value='')
	{
		$post = $this->input->post();
		$insertData = array(
			'ekspedisi_status'=>	$post['expedisiStatus'],
			'update_trans_date'	=>	date("Y-m-d H:i:s")
		);
		$this->GlobalModel->updateData('transaction_order',array('transaction_order_id'=>$value),$insertData);
		redirect(BASEURL.'transaksi/orders/detail/'.$value);
	}
	public function invoice($value='')
	{
		$orders = $this->GlobalModel->queryManualRow('SELECT * FROM transaction_order tor JOIN product pro ON tor.id_product=pro.id_product WHERE tor.transaction_id="'.$value.'"');

		$data = array(
	        "qrcode" => BASEURL.'assets/images/qrcode/'.$orders['transaction_reff_id'].'.png',
	        'reff_id'	=>	$orders['transaction_reff_id'],
	        'titleTiket' => $orders['nama_product'],
	        'qty'	=>	$orders['total_qty']
	    );
	    $this->load->library('pdf');

	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "transaksi-code.pdf";
	    $this->pdf->load_view('print-tiket', $data);
	}

	public function buktipengiriman($value='')
	{
		$config['upload_path']          = './images/transaksi/';
		$config['allowed_types']        = '*';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('filePengiriman'))
		{
		       $error = array('error' => $this->upload->display_errors());

		       pre($error);
		} else {
			$insertData = array(
				'bukti_pengiriman_barang'=>	'images/transaksi/'.$this->upload->data('file_name')
			);
			$this->GlobalModel->updateData('transaction_order',array('transaction_order_id'=>$value),$insertData);
			redirect(BASEURL.'transaksi/orders/detail/'.$value);
		}
	}


	public function bardcodeGenerate($urlCode='',$filename="")
	{
		$directory = './assets/images/qrcode/';
		$file_name = $filename;

		if (!is_dir($directory)) {
			mkdir($directory,0777,TRUE);
		}

		$params['data'] = $urlCode;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = $directory.$file_name.'.png';
		$this->ciqrcode->generate($params);

		echo '<img src="'.BASEURL.$directory.$file_name.'.png" />';
	}

	public function pdfGenerate($transReff='',$titleTiket,$qty)
	{
		$data = array(
	        "qrcode" => BASEURL.'assets/images/qrcode/'.$transReff.'.png',
	        'titleTiket' => $titleTiket,
	        'qty'	=>	$qty
	    );

	    $this->load->library('pdf');

	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "transaksi-code.pdf";
	    $this->pdf->load_view('print-tiket', $data);
	}
}
