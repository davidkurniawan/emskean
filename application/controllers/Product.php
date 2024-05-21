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

		$config['upload_path'] = './images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d')))
	    {
	        mkdir('./images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);

		$dataInsert = array(
			'nama_product'				=> $post['namaProduct'],
			'gender_product'			=> $post['genderPakaian'],
			'id_product_category'		=> $post['kategoriProduk'],
			'id_productsub_category'	=> $post['subkategoriProduk'],
			'created_date'				=> date('Y-m-d H:i:s'),
			'deskripsi_product'			=> $post['deskripsi'],
			'diskon'					=> $post['diskon'],
			'harga'						=> $post['harga'],
			'url_product'				=> url_title(strtolower($post['namaProduct'])),
			'status_product'			=> $post['status'],
			'id_administrator'			=> $this->session->userdata('idAdmin')
		);

		if ($front = $this->upload->do_upload('imgFileFront')) {
			$dataInsert['product_image_front'] = 'images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->insertData('product',$dataInsert);
		$id_product = $this->db->insert_id();

		redirect(BASEURL.'product/edit/'.$id_product);
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

		$config['upload_path'] = './images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

	    $this->load->library('upload', $config);

	    if (!is_dir('images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d')))
	    {
	        mkdir('./images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d'), 0777, true);
	    }

		$dataProduct = $this->GlobalModel->getData('image_product',array('id_product'=>$post['id_product']));

		$updateData = array(
			'nama_product'				=> $post['namaProduct'],
			'id_product_category'		=> $post['kategoriProduk'],
			'id_productsub_category'	=> $post['subkategoriProduk'],
			'gender_product'			=> $post['genderPakaian'],
			'update_date'				=> date('Y-m-d H:i:s'),
			'deskripsi_product'			=> $post['deskripsi'],
			'diskon'					=> $post['diskon'],
			'harga'					=> $post['harga'],
			'url_product'				=> url_title(strtolower($post['namaProduct'])),
			'status_product'			=> $post['status'],
			'id_administrator'			=> $this->session->userdata('idAdmin')
		);

		$whereProd = array(
			'id_product' => $post['id_product'] 
		);

		if ($front = $this->upload->do_upload('imgFileFront')) {
			$updateData['product_image_front'] = 'images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->updateData('product',$whereProd,$updateData);
		
		

		$arrayImg = array();
		foreach ($_FILES['imgProd']['name'] as $key => $image) {
			$array[] = $image;

        	$config['file_name'] = $_FILES['imgProd']['name'][$key];
			$_FILES['imgFile']['name'] 		= $_FILES['imgProd']['name'][$key];
            $_FILES['imgFile']['type'] 		= $_FILES['imgProd']['type'][$key];
            $_FILES['imgFile']['tmp_name'] 	= $_FILES['imgProd']['tmp_name'][$key];
            $_FILES['imgFile']['error'] 	= $_FILES['imgProd']['error'][$key];
            $_FILES['imgFile']['size'] 		= $_FILES['imgProd']['size'][$key];

            if($this->upload->do_upload('imgFile')){
            	if (!empty($post['id_image_product'])) {
            		$imageGambar = 'images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/'.$this->upload->data('file_name');
			        $arrayImg[] = $imageGambar;
					$dataImage = array(
						'source_image_product'	=>	$imageGambar,
						'id_product'			=>	$post['id_product']
					);
					$this->GlobalModel->updateData('image_product',array('id_image_product'=>$post['id_image_product'][$key]),$dataImage);
            	} else {
			        $imageGambar = 'images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/'.$this->upload->data('file_name');
			        $arrayImg[] = $imageGambar;
					$dataImage = array(
						'source_image_product'	=>	$imageGambar,
						'id_product'			=>	$post['id_product']
					);
					$this->GlobalModel->insertData('image_product',$dataImage);
            	}
            }
		}
		chmod('./images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d'), 0755);

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
		$config['upload_path'] = './images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

	    $this->load->library('upload', $config);

		$post = $this->input->post();

		foreach ($post['sku'] as $key => $sku) {

			$_FILES['imgFile']['name'] 		= $_FILES['imgProd']['name'][$key];
            $_FILES['imgFile']['type'] 		= $_FILES['imgProd']['type'][$key];
            $_FILES['imgFile']['tmp_name'] 	= $_FILES['imgProd']['tmp_name'][$key];
            $_FILES['imgFile']['error'] 	= $_FILES['imgProd']['error'][$key];
            $_FILES['imgFile']['size'] 		= $_FILES['imgProd']['size'][$key];

			$insertData = array(
				'id_product'	=> $post['id_product'],
				'sku'	=>	$sku,
				'size'	=>	$post['size'][$key],
				'color'	=>	$post['color'][$key],
				'name_color'	=>	$post['nameColor'][$key],
				'slug_color'	=>	url_title(strtolower($post['nameColor'][$key]),'-'),
				'qty_item'	=>	$post['qty'][$key],
				'harga'	=>	$post['harga'][$key],
				'created_date'	=>	date('Y-m-d')
			);

			if($this->upload->do_upload('imgFile')){
				$imageGambar = 'images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/'.$this->upload->data('file_name');
				$insertData['source_image_product'] = $imageGambar;
			}
			if (!empty($post['product_item_id'][$key])) {
				$this->GlobalModel->updateData('product_item',array('product_item_id'=>$post['product_item_id'][$key]),$insertData);
			} else {
				$this->GlobalModel->insertData('product_item',$insertData);
			}
		}
		
		

		redirect(BASEURL.'product/edit/'.$post['id_product']);
	}

}
