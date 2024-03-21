
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriproducts extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}

	
	public function index()
	{
		$viewData['kategori'] = $this->GlobalModel->getData('kategori_product',null);
		$this->load->view('global/header');
		$this->load->view('kategoriproduct/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('kategori_product',null);
		$this->load->view('global/header');
		$this->load->view('kategoriproduct/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahact($value='')
	{
		$post = $this->input->post();

		$dataInsert = array(
			'parent_kategori'	=>	$post['parent'],
			'nama_kategori_product'	=>	$post['namaKategori'],
			'url_kategori_product'	=>	url_title(strtolower($post['namaKategori'])),
			'created_date'	=>	date('Y-m-d')
		);
		$this->GlobalModel->insertData('kategori_product',$dataInsert);
		redirect(BASEURL.'product');
	}

	public function edit($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getDataRow('kategori_product',array('id_kategori_product'=>$value));
		$viewData['kategoriParent'] = $this->GlobalModel->getData('kategori_product',array('parent_kategori'=>0));
		$this->load->view('global/header');
		$this->load->view('kategoriproduct/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$dataInsert = array(
			'parent_kategori'	=>	$post['parent'],
			'nama_kategori_product'	=>	$post['namaKategori'],
			'url_kategori_product'	=>	url_title(strtolower($post['namaKategori'])),
			'created_date'	=>	date('Y-m-d')
		);

		$this->GlobalModel->updateData('kategori_product',array('id_kategori_product'=>$post['id_kategori_product']),$dataInsert);

		redirect(BASEURL.'kategoriproduct');
	}

	public function deletekategori($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('kategori_product',array('id_kategori_product'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}
