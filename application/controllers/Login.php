<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if (empty($this->session->userdata('userNama'))) {
			$this->load->view('login');
		} else {
			redirect(BASEURL.'dashboard');
		}
		
	}

	public function auth()
	{
		$post = $this->input->post();
		$dataAdmin = $this->GlobalModel->getDataRow('administrator',array('email' => $post['email']));
		// pre(password_hash($post['password'], PASSWORD_DEFAULT));
		if (password_verify($post['password'], $dataAdmin['password'])) {
			$data = array(
				'userNama' 	=> $dataAdmin['nama'],
				'email'		=> $dataAdmin['email'],
				'loggedin'	=> TRUE,
				'idAdmin'	=>	$dataAdmin['id_administrator'],
				'flagAdmin'	=>	$dataAdmin['flag_admin']

			);
			$this->session->set_userdata($data);
			redirect(BASEURL.'dashboard');
		} else {
			$this->session->set_flashdata('msg','maaf anda salah password atau email, mohon di ulang kembali');
			redirect(BASEURL.'login');
		}
	}

	public function out()
	{
		$this->session->sess_destroy();
		redirect(BASEURL.'login');
	}
}