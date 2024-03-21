<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemproduct extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['item'] = $this->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product WHERE pi.kategori_item_product =2 ');
		$this->load->view('global/header');
		$this->load->view('productitem/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['product'] = $this->GlobalModel->getData('product',null);
		$viewData['kategori'] = $this->GlobalModel->getData('kategori_product',null);
		$viewData['variant'] = $this->GlobalModel->getData('jenis_product',null);
		$this->load->view('global/header');
		$this->load->view('productitem/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048';
        $arrayImg = array();
		foreach ($_FILES['imgVarian']['name'] as $key => $image) {
			$array[] = $image;

        	$config['file_name'] = $_FILES['imgVarian']['name'][$key];
			$_FILES['imgVarians']['name'] 		= $_FILES['imgVarian']['name'][$key];
            $_FILES['imgVarians']['type'] 		= $_FILES['imgVarian']['type'][$key];
            $_FILES['imgVarians']['tmp_name'] 	= $_FILES['imgVarian']['tmp_name'][$key];
            $_FILES['imgVarians']['error'] 	= $_FILES['imgVarian']['error'][$key];
            $_FILES['imgVarians']['size'] 		= $_FILES['imgVarian']['size'][$key];

	        $this->load->library('upload', $config);
            $this->upload->do_upload('imgVarians');

	        $imageGambar = 'images/product/'.$this->upload->data('file_name');
	        $arrayImg[] = $imageGambar;
			$dataInsert = array(
				'image_varian'	=>	$imageGambar,
				'nama_item_product'		=>	$post['namaItem'][$key],
				'kategori_item_product'		=>	$post['jenisItem'][$key],
				'created_date'			=>	date('Y-m-d H:i:s'),
				'id_product'			=>	$post['artikelProd'],
				'qty_item'				=>	$post['qtyItem'][$key],
				'harga'					=>	$post['harga'][$key],
				'sku_item_product'		=>	$post['skuItem'][$key]
			);
			$this->GlobalModel->insertData('product_item',$dataInsert);
		}

		
		redirect(BASEURL.'itemproduct');
	}

	public function edit($artikel='')
	{
		$viewData['product'] = $this->GlobalModel->getData('product',null);
		$viewData['variant'] = $this->GlobalModel->getData('jenis_product',null);
		$viewData['item']	=	$this->GlobalModel->getDataRow('product_item',array('product_item_id'=>$artikel));
		$this->load->view('global/header');
		$this->load->view('productitem/edit',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
			// pre($post);
		$config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);
        $this->upload->do_upload('imgVarian');
			if (!empty($this->upload->data('file_name'))) {
				$dataInsert = array(
					'nama_item_product'		=>	$post['namaItem'],
					'kategori_item_product'		=>	$post['jenisItem'],
					'created_date'			=>	date('Y-m-d H:i:s'),
					'id_product'			=>	$post['artikelProd'],
					'qty_item'				=>	$post['qtyItem'],
					'harga'					=>	$post['harga'],
					'image_varian'			=>	'images/product/'.$this->upload->data('file_name'),
					'sku_item_product'		=>	$post['skuItem'],
					'description_product_item'	=>	$post['descItem']
				);
			} else {
				$dataInsert = array(
					'nama_item_product'		=>	$post['namaItem'],
					'kategori_item_product'		=>	$post['jenisItem'],
					'created_date'			=>	date('Y-m-d H:i:s'),
					'id_product'			=>	$post['artikelProd'],
					'qty_item'				=>	$post['qtyItem'],
					'harga'					=>	$post['harga'],
					'sku_item_product'		=>	$post['skuItem'],
					'description_product_item'	=>	$post['descItem']
				);
			}
			
			$this->GlobalModel->updateData('product_item',array('product_item_id'=>$value),$dataInsert);

		redirect(BASEURL.'itemproduct');
	}

	public function deleteItem($value='')
	{
		$post = $this->input->post();
		// pre($post);
		$this->GlobalModel->deleteData('product_item',array('artikel_item_product'=>$post['id_delete']));
		echo "berhasil di hapus";
	}

	public function liatProvince($value='')
	{
		$viewData['province'] = json_decode(getProvinceOngkir(),TRUE);
		pre($viewData);
	}
}