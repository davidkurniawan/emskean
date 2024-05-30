<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newssubkategori extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['kategori'] = $this->GlobalModel->queryManual("SELECT psc.id_news_subkategori, psc.name as subkategori, psc.slug, pc.name as kategori FROM news_subkategori psc JOIN news_kategori pc ON psc.id_news_kategori=pc.id_news_kategori");
		$this->load->view('global/header');
		$this->load->view('newskategori/newssubkategori/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('news_kategori',null);
		$this->load->view('global/header');
		$this->load->view('newskategori/newssubkategori/tambah',$viewData);
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
			'id_news_kategori'	=>	$post['kategori'],
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'image'	=>	$this->upload->data('file_name'),
			'created_date'	=>	date('Y-m-d')
		);

		$this->GlobalModel->insertData('news_subkategori',$insertData);
		
		redirect(BASEURL.'newssubkategori');
	}

	public function edit($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('news_kategori',null);
		$viewData['sub'] = $this->GlobalModel->getDataRow('news_subkategori',array('id_news_subkategori'=>$value));

		$this->load->view('global/header');
		$this->load->view('newskategori/newssubkategori/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/category/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        
		$updateData = array(
			'id_news_kategori'	=>	$post['kategori'],
			'name'	=>	$post['name'],
			'slug'	=>	url_title($post['name'],'-'),
			'created_date'	=>	date('Y-m-d')
		);

		if ($front = $this->upload->do_upload('image')) {
			$updateData['image'] = 'images/category/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->updateData('news_subkategori',array('id_news_subkategori'=>$value),$updateData);

		redirect(BASEURL.'newssubkategori');
	}

	public function deletekategori($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('news_subkategori',array('id_news_subkategori'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}
