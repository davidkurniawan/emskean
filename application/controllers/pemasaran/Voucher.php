<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['voucher'] = $this->GlobalModel->getData('voucher',null);
		$this->load->view('global/header');
		$this->load->view('pemasaran/voucher/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('pemasaran/voucher/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'voucher_title'		=>	$post['title'],
			'voucher_desc'		=>	$post['desc'],
			'voucher_sk'		=>	$post['sk'],
			'voucher_code'		=>	$post['namaPromo'],
			'voucher_category'	=>	$post['category'],
			'voucher_flag'		=>	$post['flag'],
			'voucher_value'	=>	$post['discountAmount'],
			'created_date'	=>	date('Y-m-d H:i:s'),
			'id_administrator'	=>	$this->session->userdata('idAdmin'),
			'voucher_status'	=> 1
		);
		$this->GlobalModel->insertData('voucher',$insertData);
		redirect(BASEURL.'pemasaran/voucher');
	}

	public function edit($id='')
	{
		$viewData['voucher'] = $this->GlobalModel->getDataRow('voucher',array('id_voucher'=>$id));
		// pre($viewData);
		$this->load->view('global/header');
		$this->load->view('pemasaran/voucher/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
		$insertData = array(
			'voucher_title'		=>	$post['title'],
			'voucher_desc'		=>	$post['desc'],
			'voucher_sk'		=>	$post['sk'],
			'voucher_category'	=>	$post['category'],
			'voucher_flag'		=>	$post['flag'],
			'start_date'		=>	$post['start'],
			'end_date'			=>	$post['end'],
			'voucher_code'		=>	$post['namaPromo'],
			'voucher_value'		=>	$post['discountAmount'],
			'created_date'		=>	date('Y-m-d H:i:s'),
			'id_administrator'	=>	$this->session->userdata('idAdmin'),
			'voucher_status'	=> 1
		);
		$this->GlobalModel->updateData('voucher',array('id_voucher'=>$value),$insertData);
		redirect(BASEURL.'pemasaran/voucher');
	}

	public function deletepromo($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('voucher',array('voucher'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}