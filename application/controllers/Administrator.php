<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['administrator'] = $this->GlobalModel->getData('administrator',null);
		$this->load->view('global/header');
		$this->load->view('administrator/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('administrator/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$dataInsert = array(
			'nama'			=>	$post['nama'],
			'email'			=>	$post['email'],
			'password'		=>	password_hash($post['password'], PASSWORD_DEFAULT),
			'provinsi'		=>	$post['provinsi'],
			'kota'			=>	$post['kota'],
			'flag_admin'	=>	$post['flag'],
			'created_date'	=>	date('Y-m-d H:i:s')

	);

		$this->GlobalModel->insertData('administrator',$dataInsert);

		redirect(BASEURL.'administrator');
	}

	public function edit($id='')
	{
		$viewData['administrator']	=	$this->GlobalModel->getData('administrator',array('administrator'=>$id));
		$this->load->view('global/header');
		$this->load->view('administrator/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
			
		$dataInsert = array(
			'nama'			=>	$post['nama'],
			'email'			=>	$post['email'],
			'password'		=>	password_hash($post['password'], PASSWORD_DEFAULT),
			'provinsi'		=>	$post['provinsi'],
			'kota'			=>	$post['kota'],
			'flag_admin'	=>	$post['flag'],
			'created_date'	=>	date('Y-m-d H:i:s')

		);

		$this->GlobalModel->updateData('administrator',array('id_administrator'=>$value),$dataInsert);
		redirect(BASEURL.'administrator');
	}

	public function deleteItem($value='')
	{
		$post = $this->input->post();
		// pre($post);
		$this->GlobalModel->deleteData('administrator',array('id_administrator'=>$post['id_delete']));
		echo "Data Berhasil di hapus";
	}
}