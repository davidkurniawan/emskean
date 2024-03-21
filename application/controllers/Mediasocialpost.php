<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mediasocialpost extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['item'] = $this->GlobalModel->getData('media_social_post',null);
		$this->load->view('global/header');
		$this->load->view('mediasocialpost/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('mediasocialpost/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/mediapost/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
		$dataInsert = array(
			'title'	=>	$post['title'],
			'thumbnail'	=>	'images/mediapost/'.$this->upload->data('file_name'),
			'url'	=>	$post['url'],
			'kategori_media_social'	=>	$post['kategori'],
		);

		$this->GlobalModel->insertData('media_social_post',$dataInsert);

		redirect(BASEURL.'mediasocialpost');
	}

	public function edit($id='')
	{
		$viewData['item']	=	$this->GlobalModel->getDataRow('media_social_post',array('id_media_social_post'=>$id));
		$this->load->view('global/header');
		$this->load->view('mediasocialpost/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
			
		$config['upload_path']          = './images/mediapost/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
		if (empty($this->upload->data('file_name'))) {
			$dataInsert = array(
				'title'	=>	$post['title'],
				'url'	=>	$post['url'],
				'kategori_media_social'	=>	$post['kategori'],
			);
		} else {
			$dataInsert = array(
				'title'	=>	$post['title'],
				'thumbnail'	=>	'images/mediapost/'.$this->upload->data('file_name'),
				'url'	=>	$post['url'],
				'kategori_media_social'	=>	$post['kategori'],
			);
		}
		
		$this->GlobalModel->updateData('media_social_post',array('id_media_social_post'=>$value),$dataInsert);
		redirect(BASEURL.'mediasocialpost');
	}

	public function deleteItem($value='')
	{
		$post = $this->input->post();
		// pre($post);
		$this->GlobalModel->deleteData('media_social_post',array('id_media_social_post'=>$post['id_delete']));
		echo "Data Berhasil di hapus";
	}
}