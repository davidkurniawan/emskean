<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produkpoin extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['produkpoin'] = $this->GlobalModel->getData('produk_poin',null);
		$this->load->view('global/header');
		$this->load->view('pemasaran/produkpoin/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('pemasaran/produkpoin/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/produkpoin/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $insertData = array(
				'produk_poin_title'	=>	$post['title'],
				'diskon'	=>	$post['value'],
				'poin'	=>	$post['poin'],
				'description'	=>	$post['desc'],
				'sent_by'	=>	$post['sent'],
				'status_poin'	=>	$post['status'],
			);
			$this->GlobalModel->insertData('produk_poin',$insertData);
			redirect(BASEURL.'pemasaran/produkpoin');
        } else {
        	$insertData = array(
				'produk_poin_title'	=>	$post['title'],
				'image'	=>	'images/produkpoin/'.$this->upload->data('file_name'),
				'diskon'	=>	$post['value'],
				'poin'	=>	$post['poin'],
				'description'	=>	$post['desc'],
				'sent_by'	=>	$post['sent'],
				'status_poin'	=>	$post['status'],
			);
			$this->GlobalModel->insertData('produk_poin',$insertData);
			redirect(BASEURL.'pemasaran/produkpoin');
        }
		
	}

	public function edit($id='')
	{
		$viewData['produkpoin'] = $this->GlobalModel->getDataRow('produk_poin',array('id_produk_poin'=>$id));
		// pre($viewData);
		$this->load->view('global/header');
		$this->load->view('pemasaran/produkpoin/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/produkpoin/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        if (empty($this->upload->data('file_name')))
        {
           $insertData = array(
				'produk_poin_title'	=>	$post['title'],
				'diskon'	=>	$post['value'],
				'poin'	=>	$post['poin'],
				'description'	=>	$post['desc'],
				'sent_by'	=>	$post['sent'],
				'status_poin'	=>	$post['status'],
			);
        } else {
			$insertData = array(
				'produk_poin_title'	=>	$post['title'],
				'image'	=>	'images/produkpoin/'.$this->upload->data('file_name'),
				'diskon'	=>	$post['value'],
				'poin'	=>	$post['poin'],
				'description'	=>	$post['desc'],
				'sent_by'	=>	$post['sent'],
				'status_poin'	=>	$post['status'],
			);
		}
		$this->GlobalModel->updateData('produk_poin',array('id_produk_poin'=>$value),$insertData);
		redirect(BASEURL.'pemasaran/produkpoin');
	}

	public function delete($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('produk_poin',array('id_produk_poin'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}
}