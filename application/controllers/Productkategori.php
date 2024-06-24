<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productkategori extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['kategori'] = $this->GlobalModel->getData('product_category',null);
		$this->load->view('global/header');
		$this->load->view('productkategori/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('product_category',null);
		$this->load->view('global/header');
		$this->load->view('productkategori/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahact($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/category/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');

		$insertData = array(
			'meta_title'	=>	$post['metaTitle'],
			'mate_desc'	=>	$post['metaDesc'],
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'image'	=>	$this->upload->data('file_name'),
			'created_date'	=>	date('Y-m-d')
		);

		$this->GlobalModel->insertData('product_category',$insertData);
		
		redirect(BASEURL.'productkategori');
	}

	public function edit($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getDataRow('product_category',array('id_product_category'=>$value));

		$this->load->view('global/header');
		$this->load->view('productkategori/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/category/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        
		$updateData = array(
			'meta_title'	=>	$post['metaTitle'],
			'mate_desc'	=>	$post['metaDesc'],
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'created_date'	=>	date('Y-m-d')
		);

		if ($front = $this->upload->do_upload('image')) {
			$updateData['image'] = 'images/category/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->updateData('product_category',array('id_product_category'=>$value),$updateData);

		redirect(BASEURL.'productkategori');
	}

	public function deletekategori($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('product_category',array('id_product_category'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}
