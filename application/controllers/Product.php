<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['product'] = $this->GlobalModel->queryManual('SELECT pc.name as kategori, pct.name as sub_kategori, p.gender_product, p.diskon, p.created_date, p.id_administrator, a.nama as namabrand ,p.nama_product , p.status_product, p.id_product FROM product p JOIN product_category pc ON p.id_product_category=pc.id_product_category JOIN productsub_category pct ON p.id_productsub_category=pct.id_productsub_category JOIN administrator a ON p.id_administrator=a.id_administrator');

		$this->load->view('global/header');
		$this->load->view('product/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('product_category',null);
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
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

		$dataInsert = array(
			'nama_product'				=> $post['namaProduct'],
			'gender_product'			=> $post['genderPakaian'],
			'created_date'				=> date('Y-m-d H:i:s'),
			'deskripsi_product'			=> $post['deskripsi'],
			'diskon'					=> $post['diskon'],
			'url_product'				=> url_title(strtolower($post['namaProduct'])),
			'status_product'			=> $post['status'],
			'id_administrator'			=> $this->session->userdata('idAdmin')
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

	public function deleteItemProd($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('product_item',array('product_item_id'=>$post['id_delete']));
		echo "data berhasil di hapus";
	}

	public function edit($id='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('product_category',null);
		$viewData['image'] = $this->GlobalModel->getData('image_product',array('id_product'=>$id));
		$viewData['brand'] = $this->GlobalModel->getData('brand_product',null);
		$viewData['dataProd'] = $this->GlobalModel->getDataRow('product',array('id_product'=>$id));
		$viewData['subkategori'] = $this->GlobalModel->getData('productsub_category',array('id_product_category'=>$viewData['dataProd']['id_product_category']));
		$viewData['productItem'] = $this->GlobalModel->getData('product_item',array('id_product'=>$id));

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
			'id_product_category'		=> $post['kategoriProduk'],
			'id_productsub_category'	=> $post['subkategoriProduk'],
			'gender_product'			=> $post['genderPakaian'],
			'created_date'				=> $post['tanggal'],
			'deskripsi_product'			=> $post['deskripsi'],
			'diskon'					=> $post['diskon'],
			'url_product'				=> url_title(strtolower($post['namaProduct'])),
			'status_product'			=> $post['status'],
			'id_administrator'			=> $this->session->userdata('idAdmin')
		);

		$whereProd = array(
			'id_product' => $post['id_product'] 
		);

		$this->GlobalModel->updateData('product',$whereProd,$updateData);
		
		$config['upload_path'] = './images/product/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

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
            if($this->upload->do_upload('imgFile')){
            	if (!empty($post['id_image_product'])) {
            		$imageGambar = 'images/product/'.$this->upload->data('file_name');
			        $arrayImg[] = $imageGambar;
					$dataImage = array(
						'source_image_product'	=>	$imageGambar,
						'id_product'			=>	$post['id_product']
					);
					$this->GlobalModel->updateData('image_product',array('id_image_product'=>$post['id_image_product'][$key]),$dataImage);
            	} else {
			        $imageGambar = 'images/product/'.$this->upload->data('file_name');
			        $arrayImg[] = $imageGambar;
					$dataImage = array(
						'source_image_product'	=>	$imageGambar,
						'id_product'			=>	$post['id_product']
					);
					$this->GlobalModel->insertData('image_product',$dataImage);
            	}
            }
		}

		redirect(BASEURL.'product/edit/'.$post['id_product']);
		
	}

	public function deleteProduct($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('product',array('id_product' => $post['id_delete']));
		echo "data berhasil di hapus";
	}

	public function getsubproduct($value='')
	{
		$post = $this->input->post();
		$subprod = $this->GlobalModel->getData('productsub_category',array('id_product_category'=>$post['idprod']));
		$html = '';
		$html .= '<option>Pilih Sub Kategori</option>';
		foreach ($subprod as $key => $sub) {
			$html .= '<option value="'.$sub['id_productsub_category'].'">'.strtoupper($sub['name']).'</option>';
		}

		echo $html;
	}

	public function itemproductTambah($value='')
	{
		$post = $this->input->post();
		if (!empty($post['product_item_id'])) {
			foreach ($post['sku'] as $key => $sku) {
				$insertData = array(
					'id_product'	=> $post['id_product'],
					'sku'	=>	$sku,
					'size'	=>	$post['size'][$key],
					'color'	=>	$post['color'][$key],
					'qty_item'	=>	$post['qty'][$key],
					'harga'	=>	$post['harga'][$key],
					'created_date'	=>	date('Y-m-d')
				);

				$this->GlobalModel->updateData('product_item',array('product_item_id'=>$post['product_item_id'][$key]),$insertData);
			}
		} else {
			foreach ($post['sku'] as $key => $sku) {
				$insertData = array(
					'id_product'	=> $post['id_product'],
					'sku'	=>	$sku,
					'size'	=>	$post['size'][$key],
					'color'	=>	$post['color'][$key],
					'qty_item'	=>	$post['qty'][$key],
					'harga'	=>	$post['harga'][$key],
					'created_date'	=>	date('Y-m-d')
				);

				$this->GlobalModel->insertData('product_item',$insertData);
			}
		}
		

		redirect(BASEURL.'product/edit/'.$post['id_product']);
	}
}
