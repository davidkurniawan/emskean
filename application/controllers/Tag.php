<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['tag'] = $this->GlobalModel->getData('tag_product',null);
		$this->load->view('global/header');
		$this->load->view('tag/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('tag/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		foreach ($post['tagProd'] as $key => $prod) {
			$dataInsert = array(
				'tag_product_name'	=>	$prod,
				'created_date'	=>	date('Y-m-d')
			);
			$this->GlobalModel->insertData('tag_product',$dataInsert);
		}

		redirect(BASEURL.'tag');
	}

	public function edit($id='')
	{
		$viewData['tag'] = $this->GlobalModel->getDataRow('tag_product',array('tag_product_id'=>$id));
		$this->load->view('global/header');
		$this->load->view('tag/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$dataInsert = array(
			'tag_product_name'	=>	$post['tag'],
			'created_date'	=>	date('Y-m-d')
		);
		$this->GlobalModel->updateData('tag_product',array('tag_product_id'=>$value),$dataInsert);

		redirect(BASEURL.'tag');
	}

	public function deletetag($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('tag_product',array('tag_product_id'=>$post['id_delete']));
		echo "data berhasil di hapus";
	}
}