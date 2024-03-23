<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['product'] = $this->GlobalModel->getData('product',null);
		$this->load->view('global/header');
		$this->load->view('product/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('kategori_product',array('parent_kategori'=>0));
		$viewData['varian'] = $this->GlobalModel->getData('jenis_product',null);
		
		$viewData['brand'] = $this->GlobalModel->getData('brand_product',null);
		$this->load->view('global/header');
		$this->load->view('product/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahkategori($sa='')
	{
		$post = $this->input->post();
		$kategori = $this->GlobalModel->getData('kategori_product',array('parent_kategori'=>$post['idKategori']));
		$html = '';
		foreach ($kategori as $key => $value) {
			$html .= '<option value='.$value['url_kategori_product'].'>'.$value['nama_kategori_product'].'</option>';
		}
		echo $html;
	}

	public function tambahOnAction($value='')
	{
		$post = $this->input->post();

		$config['upload_path'] = './images/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048';

		$dataInsert = array(
			'nama_product'				=> $post['namaProduct'],
			'qty_item'					=> $post['qty_item'],
			'gender_pakaian_product'	=> $post['genderPakaian'],
			'created_date'				=> $post['tanggal'],
			'harga_product'				=> $post['hargaProduct'],
			'deskripsi_product'			=> $post['deskripsi'],
			'diskon'					=> $post['diskon'],
			'url_product'				=> url_title(strtolower($post['namaProduct'])),
			'status_product'			=> $post['status'],
		);

		$this->GlobalModel->insertData('product',$dataInsert);
		$id_product = $this->db->insert_id();
		$arrayImg = array();
		foreach ($_FILES['imgProd']['name'] as $key => $image) {
			$array[] = $image;

        	$config['file_name'] = $_FILES['imgProd']['name'][$key];
			$_FILES['imgFile']['name'] 		= $_FILES['imgProd']['name'][$key];
            $_FILES['imgFile']['type'] 		= $_FILES['imgProd']['type'][$key];
            $_FILES['imgFile']['tmp_name'] 	= $_FILES['imgProd']['tmp_name'][$key];
            $_FILES['imgFile']['error'] 	= $_FILES['imgProd']['error'][$key];
            $_FILES['imgFile']['size'] 		= $_FILES['imgProd']['size'][$key];

	        $this->load->library('upload', $config);
            $this->upload->do_upload('imgFile');

	        $imageGambar = 'images/product/'.$this->upload->data('file_name');
	        $arrayImg[] = $imageGambar;
			$dataImage = array(
				'source_image_product'	=>	$imageGambar,
				'id_product'			=>	$id_product
			);
			$this->GlobalModel->insertData('image_product',$dataImage);
		}
		$updateImage = array(
			'product_image_front'	=>	$arrayImg[0],
		);

		$this->GlobalModel->updateData('product',array('id_product'=>$id_product),$updateImage);

		redirect(BASEURL.'product');
	}

	public function deleteImage($value='')
	{
		$post = $this->input->post();
		$imgDelete = $this->GlobalModel->getDataRow('image_product',array('id_image_product'=>$post['id_delete']));
		unlink($imgDelete['source_image_product']);
		$this->GlobalModel->deleteData('image_product',array('id_image_product'=>$post['id_delete']));
		echo "data berhasil di hapus";
	}

	public function edit($id='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('kategori_product',array('parent_kategori'=>0));
		$viewData['image'] = $this->GlobalModel->getData('image_product',array('id_product'=>$id));
		$viewData['brand'] = $this->GlobalModel->getData('brand_product',null);
		$viewData['dataProd'] = $this->GlobalModel->getDataRow('product',array('id_product'=>$id));
		$viewData['varian'] = $this->GlobalModel->getData('jenis_product',null);

		$this->load->view('global/header');
		$this->load->view('product/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAction($value='')
	{
		$post = $this->input->post();
		$dataProduct = $this->GlobalModel->getData('image_product',array('id_product'=>$post['id_product']));

		$updateData = array(
			'nama_product'				=> $post['namaProduct'],
			'qty_item'					=> $post['qty_item'],
			'gender_pakaian_product'	=> $post['genderPakaian'],
			'created_date'				=> $post['tanggal'],
			'harga_product'				=> $post['hargaProduct'],
			'deskripsi_product'			=> $post['deskripsi'],
			'diskon'					=> $post['diskon'],
			'url_product'				=> url_title(strtolower($post['namaProduct'])),
			'status_product'			=> $post['status'],
		);
		$whereProd = array(
			'id_product' => $post['id_product'] 
		);
		$this->GlobalModel->updateData('product',$whereProd,$updateData);

		$arrayImg = array();
		foreach ($_FILES['imgProd']['name'] as $key => $image) {
			$config['upload_path'] = './images/product/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '2048';
	        $config['file_ext_tolower'] = true;
	        $config['file_name'] = $_FILES['imgProd']['name'][$key];


			$_FILES['imgFile']['name'] 		= $_FILES['imgProd']['name'][$key];
            $_FILES['imgFile']['type'] 		= $_FILES['imgProd']['type'][$key];
            $_FILES['imgFile']['tmp_name'] 	= $_FILES['imgProd']['tmp_name'][$key];
            $_FILES['imgFile']['error'] 	= $_FILES['imgProd']['error'][$key];
            $_FILES['imgFile']['size'] 		= $_FILES['imgProd']['size'][$key];

	        $this->load->library('upload', $config);
            $this->upload->do_upload('imgFile');

	        $imageGambar = 'images/product/'.$this->upload->data('file_name');
			$dataImage = array(
				'source_image_product'	=>	$imageGambar,
				'id_product'			=>	$post['id_product']
			);
			$whereImage = array(
				'id_image_product' => $image 
			);
			if ($key == 0) {
				$updateImage = array(
					'product_image_front'	=>	(empty($this->upload->data('file_name')) ? $dataProduct[0]['source_image_product'] : $imageGambar),
				);
				// pre($updateImage);
				$this->GlobalModel->updateData('product',array('id_product'=>$post['id_product']),$updateImage);
			}


			$insertNewImage = $this->GlobalModel->getDataRow('image_product',$whereImage);
			if (!empty($_FILES['imgProd']['name'][$key])) {
				$this->GlobalModel->insertData('image_product',$dataImage);
			} else {
				$this->GlobalModel->updateData('image_product',$whereImage,$dataImage);
			}
		}
		redirect(BASEURL.'product');
		
	}

	public function deleteProduct($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('product',array('id_product' => $post['id_delete']));
		echo "data berhasil di hapus";
	}

}
