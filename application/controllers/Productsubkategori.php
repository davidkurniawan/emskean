<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productsubkategori extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['kategori'] = $this->GlobalModel->queryManual("SELECT psc.id_productsub_category, psc.name as subkategori, psc.slug, pc.name as kategori FROM productsub_category psc JOIN product_category pc ON psc.id_product_category=pc.id_product_category");

		$this->load->view('global/header');
		$this->load->view('productkategori/productsubkategori/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('product_category',null);
		$this->load->view('global/header');
		$this->load->view('productkategori/productsubkategori/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahact($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'id_product_category'	=>	$post['kategori'],
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'created_date'	=>	date('Y-m-d')
		);

		$this->GlobalModel->insertData('productsub_category',$insertData);
		
		redirect(BASEURL.'productsubkategori');
	}

	public function edit($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('product_category',null);
		$viewData['sub'] = $this->GlobalModel->getDataRow('productsub_category',array('id_productsub_category'=>$value));

		$this->load->view('global/header');
		$this->load->view('productkategori/productsubkategori/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$updateData = array(
			'id_product_category'	=>	$post['kategori'],
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'created_date'	=>	date('Y-m-d')
		);

		$this->GlobalModel->updateData('productsub_category',array('id_productsub_category'=>$value),$updateData);

		redirect(BASEURL.'productsubkategori');
	}

	public function deletekategori($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('product_category',array('id_product_category'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}
