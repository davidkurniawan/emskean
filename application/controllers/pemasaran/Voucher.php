<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['promo'] = $this->GlobalModel->getData('promo_product',null);
		$this->load->view('global/header');
		$this->load->view('pemasaran/promo/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('pemasaran/promo/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'promo_product_name'		=>	$post['namaPromo'],
			'promo_product_discount'	=>	$post['discountAmount'],
			'created_date'	=>	date('Y-m-d')
		);
		$this->GlobalModel->insertData('promo_product',$insertData);
		redirect(BASEURL.'pemasaran/voucher');
	}

	public function edit($id='')
	{
		$viewData['promo'] = $this->GlobalModel->getDataRow('promo_product',array('promo_product_id'=>$id));
		// pre($viewData);
		$this->load->view('global/header');
		$this->load->view('pemasaran/promo/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'promo_product_name'		=>	$post['namaPromo'],
			'promo_product_discount'	=>	$post['discountAmount'],
			'created_date'				=>	date('Y-m-d')
		);

		$this->GlobalModel->updateData('promo_product',array('promo_product_id'=>$post['idPromo']),$insertData);
		redirect(BASEURL.'pemasaran/voucher');
	}

	public function deletepromo($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('promo_product',array('promo_product_id'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}