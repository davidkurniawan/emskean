<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newskategori extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['kategori'] = $this->GlobalModel->getData('news_kategori',null);
		$this->load->view('global/header');
		$this->load->view('newskategori/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('news_kategori',null);
		$this->load->view('global/header');
		$this->load->view('newskategori/tambah',$viewData);
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
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'image'	=>	'images/category/'.$this->upload->data('file_name'),
			'created_date'	=>	date('Y-m-d'),
			'id_admin'	=>	$this->session->userdata('idAdmin'),
		);

		$this->GlobalModel->insertData('news_kategori',$insertData);
		
		redirect(BASEURL.'newskategori');
	}

	public function edit($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getDataRow('news_kategori',array('id_news_kategori'=>$value));

		$this->load->view('global/header');
		$this->load->view('newskategori/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/category/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        
		$updateData = array(
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'created_date'	=>	date('Y-m-d')
		);

		if ($front = $this->upload->do_upload('image')) {
			$updateData['image'] = 'images/category/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->updateData('news_kategori',array('id_news_kategori'=>$value),$updateData);

		redirect(BASEURL.'newskategori');
	}

	public function deletekategori($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('news_kategori',array('id_news_kategori'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}
