<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['user'] = $this->GlobalModel->getData('user_customer',null);
		$this->load->view('global/header');
		$this->load->view('user/view',$viewData);
		$this->load->view('global/footer');
	}

	public function refferalcode($value='')
	{
		$date = date('Y-m-d H:i:s');
		$expiredFmt = strtotime('+1 days', strtotime($date));
		pre(date('Y-m-d H:i:s', $expiredFmt));

	}

	public function changeToKaryawan($value='')
	{
		$post = $this->input->post();

		$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$value),array('status_user_karyawan'=>1));
		redirect(BASEURL.'user');
	}

	public function changeToReseller($value='')
	{
		$post = $this->input->post();

		$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$value),array('status_user_karyawan'=>0));
		redirect(BASEURL.'user');
	}

	public function update($value='')
	{
		$viewData['user'] = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$value));

		$this->load->view('global/header');
		$this->load->view('user/update',$viewData);
		$this->load->view('global/footer');
	}

	public function updateAct($value='')
	{
		$post = $this->input->post();
		// pre($post);
		$updateData = array(
			'nama'			=>	$post['nama'],
			'phone'			=>	$post['phone'],
			'email'			=>	$post['email'],
			'alamat'		=>	$post['alamat'],
			'provinsi'		=>	$post['provinsi'],
			'kota'			=>	$post['kota'],
			'kelurahan'		=>	$post['kelurahan'],
			'kecamatan'		=>	$post['kecamatan'],
			'kode_pos'		=>	$post['kode_pos'],
			'update_date'	=>	date('Y-m-d'),
			'poin'			=>	$post['Poin'],
			'user_nik'		=>	$post['user_nik'],
			'status_event'	=>	$post['event']
		);

		$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$value),$updateData);
		redirect(BASEURL.'user');
	}
}