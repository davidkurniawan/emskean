<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['banner'] = $this->GlobalModel->getData('banner',null);
		$this->load->view('global/header');
		$this->load->view('tampilan/banner/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('tampilan/banner/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'nama_banner'	=>	$post['titleBanner'],
			'image_banner'	=>	$post['urlBanner'],
			'created_date'	=>	date('Y-m-d'),
			'url_banner'	=>	$post['imgBanner']
		);
		$this->GlobalModel->insertData('banner',$insertData);
		redirect(BASEURL.'tampilan/banner');
	}

	public function edit($id='')
	{
		$viewData['banner'] = $this->GlobalModel->getDataRow('banner',array('id_banner'=>$id));
		$this->load->view('global/header');
		$this->load->view('tampilan/banner/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
		if (empty($post['imgBanner'])) {
			$updateData = array(
				'nama_banner'	=>	$post['titleBanner'],
				'created_date'	=>	date('Y-m-d'),
				'url_banner'	=>	$post['urlBanner']
			);
		} else {
			$updateData = array(
				'nama_banner'	=>	$post['titleBanner'],
				'image_banner'	=>	$post['imgBanner'],
				'created_date'	=>	date('Y-m-d'),
				'url_banner'	=>	$post['urlBanner']
			);
		}
		
		$this->GlobalModel->updateData('banner',array('id_banner'=>$post['id_banner']),$updateData);
		redirect(BASEURL.'tampilan/banner');
	}

	public function deletedata($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('banner',array('id_banner'=>$post['id_delete']));
		echo "data berhasil didelete";
	}


}