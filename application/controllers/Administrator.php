<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['adm'] = $this->GlobalModel->getData('administrator',array('flag_admin'=>1));
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

	public function tambahOnAction($value='')
	{
		$post = $this->input->post();

		$config['upload_path'] = './images/administrator/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/administrator/'.date('Y-m-d')))
	    {
	        mkdir('./images/administrator/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);
        $this->upload->do_upload('image');

		$dataInsert = array(
			'nama'			=>	$post['nama'],
			'email'			=>	$post['email'],
			'no_telepon'	=>	$post['phone'],
			'password'		=>	password_hash($post['password'], PASSWORD_DEFAULT),
			'provinsi'		=>	$post['provinsi'],
			'kota'			=>	$post['kota'],
			'alamat_lengkap'=>	$post['alamat'],
			'kode_pos'		=>	$post['kodePos'],
			'image'			=>	'images/administrator/'.date('Y-m-d').'/'.$this->upload->data('file_name'),
			// 'nama_bank'		=>	$post['namaBank'],
			// 'no_rekening'	=>	$post['noRek'],
			// 'an_rekening'	=>	$post['anRek'],
			'flag_admin'	=>	1,
			'created_date'	=>	date('Y-m-d H:i:s'),
			'update_date'	=>	date('Y-m-d H:i:s')
	);

		$this->GlobalModel->insertData('administrator',$dataInsert);

		redirect(BASEURL.'brand');
	}

	public function edit($id='')
	{
		$viewData['acc']	=	$this->GlobalModel->getDataRow('administrator',array('id_administrator'=>$id));
		$this->load->view('global/header');
		$this->load->view('administrator/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
		
		$config['upload_path'] = './images/administrator/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/administrator/'.date('Y-m-d')))
	    {
	        mkdir('./images/administrator/'.date('Y-m-d'), 0755, true);
	    }

	    $this->load->library('upload', $config);
        $this->upload->do_upload('image');

		$dataInsert = array(
			'nama'			=>	$post['nama'],
			'email'			=>	$post['email'],
			'no_telepon'	=>	$post['phone'],
			'provinsi'		=>	$post['provinsi'],
			'kota'			=>	$post['kota'],
			'alamat_lengkap'=>	$post['alamat'],
			'kode_pos'		=>	$post['kodePos'],
			'image'			=>	'images/administrator/'.date('Y-m-d').'/'.$this->upload->data('file_name'),
			// 'nama_bank'		=>	$post['namaBank'],
			// 'no_rekening'	=>	$post['noRek'],
			// 'an_rekening'	=>	$post['anRek'],
			'flag_admin'	=>	1,
			'update_date'	=>	date('Y-m-d H:i:s')
		);

		if (!empty($post['password'])) {
			$dataInsert['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		}

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