<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['brand'] = $this->GlobalModel->getData('brand_product',null);
		$this->load->view('global/header');
		$this->load->view('brand/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('brand/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAction($value='')
	{
		$post = $this->input->post();
		$insertData = array(
			'nama_brand_product'	=>	$post['namaBrand'],
			'url_brand_product'		=>	url_title(strtolower($post['namaBrand']))
		);
		$this->GlobalModel->insertData('brand_product',$insertData);
		redirect(BASEURL.'brand');
	}

	public function edit($id='')
	{
		$viewData['brand'] = $this->GlobalModel->getDataRow('brand_product',array('id_brand_product' => $id));
		$this->load->view('global/header');
		$this->load->view('brand/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAction($value='')
	{
		$post = $this->input->post();
		$insertData = array(
			'nama_brand_product'	=>	$post['namaBrand'],
			'url_brand_product'		=>	url_title(strtolower($post['namaBrand']))
		);
		$whereBrand = array(
			'id_brand_product'	=> $post['idbrand']
		);
		$this->GlobalModel->updateData('brand_product',$whereBrand,$insertData);
		redirect(BASEURL.'brand');
	}

	public function deleteAction($value='')
	{
		$post = $this->input->post();
		$whereBrand = array(
			'id_brand_product'	=> $post['id_delete']
		);
		$this->GlobalModel->deleteData('brand_product',$whereBrand);
	}
}
