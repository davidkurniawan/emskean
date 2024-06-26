<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['item'] = $this->GlobalModel->queryManual('SELECT * FROM banner b JOIN banner_category bc ON b.id_banner_category=bc.id_banner_category');
		$this->load->view('global/header');
		$this->load->view('banner/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['category'] = $this->GlobalModel->getData('banner_category',null);
		$this->load->view('global/header');
		$this->load->view('banner/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/banner/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);

        $fileOne = $this->upload->do_upload('image');
        $fileOne = $this->upload->data();

		$dataInsert = array(
			'title'			=>	$post['title'],
			'id_banner_category'			=>	$post['page'],
			'description'	=>	$post['description'],
			'link'	=>	$post['link'],
			'created_date'	=>	date('Y-m-d'),
			'image'			=>	'images/banner/'.$fileOne['file_name'],
		);

		$this->GlobalModel->insertData('banner',$dataInsert);

		redirect(BASEURL.'banner');
	}

	public function edit($id='')
	{
		$viewData['category'] = $this->GlobalModel->getData('banner_category',null);
		$viewData['item']	=	$this->GlobalModel->getDataRow('banner',array('id_banner'=>$id));
		$this->load->view('global/header');
		$this->load->view('banner/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
		
		$dataBan = $this->GlobalModel->getDataRow('banner',array('id_banner'=>$value));		
		$config['upload_path']          = './images/banner/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);

        $fileOne = $this->upload->do_upload('image');
        $fileOne = $this->upload->data();

		$dataInsert = array(
			'title'			=>	$post['title'],
			'description'	=>	$post['description'],
			'link'	=>	$post['link'],
			'id_banner_category'			=>	$post['page'],
			'image'			=>	((!empty($fileOne['file_name'])) ? 'images/banner/'.$fileOne['file_name'] : $dataBan['image']),
		);

		$this->GlobalModel->updateData('banner',array('id_banner'=>$value),$dataInsert);
		redirect(BASEURL.'banner');
	}

	public function deleteItem($value='')
	{
		$post = $this->input->post();
		// pre($post);
		$this->GlobalModel->deleteData('banner',array('id_banner'=>$post['id_delete']));
		echo "Data Berhasil di hapus";
	}
}