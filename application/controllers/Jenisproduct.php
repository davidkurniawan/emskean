<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisproduct extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['jenis'] = $this->GlobalModel->getData('jenis_product',null);
		$this->load->view('global/header');
		$this->load->view('jenisproduct/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('jenisproduct/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'nama_jenis_product' => $post['namaJenis'],
			'url_jenis_product'	=>	url_title(strtolower($post['namaJenis'])),
			'kode_warna'	=>	$post['kodeWarna']
		);
		$this->GlobalModel->insertData('jenis_product',$insertData);
		redirect(BASEURL.'jenisproduct');
	}

	public function edit($id='')
	{
		$viewData['jenis'] = $this->GlobalModel->getDataRow('jenis_product',array('id_jenis_product' => $id));
		$this->load->view('global/header');
		$this->load->view('jenisproduct/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$updateData = array(
			'nama_jenis_product' => $post['namaJenis'],
			'kode_warna'	=>	$post['kodeWarna'],
			'url_jenis_product'	=>	url_title(strtolower($post['namaJenis']))
		);
		$this->GlobalModel->updateData('jenis_product',array('id_jenis_product'=>$post['idJenis']),$updateData);
		redirect(BASEURL.'jenisproduct');
	}

	public function deletejenis($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('jenis_product',array('id_jenis_product'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}
