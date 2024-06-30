<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productkatalog extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['product'] = $this->GlobalModel->getData('product_catalog',null);
		$this->load->view('global/header');
		$this->load->view('productcatalog/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['product'] = $this->GlobalModel->getData('product',null);
		$this->load->view('global/header');
		$this->load->view('productcatalog/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();
		$itemImplode = implode(',', $post['katalogItem']);

		$config['upload_path'] = './images/productkatalog/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/productkatalog/'.date('Y-m-d')))
	    {
	        mkdir('./images/productkatalog/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);

		$insertData = array(
			'meta_title' 	=>	$post['metaTitle'],
			'meta_desc'	=>	$post['metaDesc'],
			'product_catalog_name'	=>	$post['katalogName'],
			'slug'	=>	url_title(strtolower($post['katalogName']),'-'),
			'product_catalog_item'	=>	$itemImplode,
			'product_catalog_headline'	=>	$post['headline'],
			'product_catalog_desc'	=>	$post['katalogDesc'],
			'created_date'	=>	date('Y-m-d H:i:s'),
			'update_date'	=>	date('Y-m-d H:i:s'),
			'id_administrator'	=>	$this->session->userdata('idAdmin'),
		);

		if ($this->upload->do_upload('banner')) {
			$insertData['product_catalog_banner'] =	'images/productkatalog/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}

		if ($this->upload->do_upload('thumbnail')) {
			$insertData['product_catalog_thumbnail'] =	'images/productkatalog/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->insertData('product_catalog',$insertData);
		
		redirect(BASEURL.'productkatalog');
	}

	public function edit($value='')
	{
		$viewData['productkatalog'] = $this->GlobalModel->getDataRow('product_catalog',array('id_product_catalog'=>$value));
		$viewData['product'] = $this->GlobalModel->getData('product',null);

		$this->load->view('global/header');
		$this->load->view('productcatalog/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$itemImplode = implode(',', $post['katalogItem']);

		$config['upload_path'] = './images/productkatalog/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/productkatalog/'.date('Y-m-d')))
	    {
	        mkdir('./images/productkatalog/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);

		$updateData = array(
			'meta_title' 	=>	$post['metaTitle'],
			'meta_desc'	=>	$post['metaDesc'],
			'product_catalog_name'	=>	$post['katalogName'],
			'slug'	=>	url_title(strtolower($post['katalogName']),'-'),
			'product_catalog_item'	=>	$itemImplode,
			'product_catalog_headline'	=>	$post['headline'],
			'product_catalog_desc'	=>	$post['katalogDesc'],
			'created_date'	=>	date('Y-m-d H:i:s'),
			'update_date'	=>	date('Y-m-d H:i:s'),
			'id_administrator'	=>	$this->session->userdata('idAdmin'),
		);

		if ($this->upload->do_upload('banner')) {
			$updateData['product_catalog_banner'] = 'images/productkatalog/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}

		if ($this->upload->do_upload('thumbnail')) {
			$updateData['product_catalog_thumbnail'] =	'images/productkatalog/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}

		$this->GlobalModel->updateData('product_catalog',array('id_product_catalog'=>$value),$updateData);

		redirect(BASEURL.'productkatalog');
	}

	public function deletekategori($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('product_catalog',array('id_product_catalog'=>$post['id_delete']));
		echo "data berhasil dihapus";
	}

	//Upload image summernote
    public function upload_image(){
		$this->load->library('upload');

		$config['upload_path'] = './images/productkatalog/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/productkatalog/'.date('Y-m-d')))
	    {
	        mkdir('./images/productkatalog/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);
		$this->upload->initialize($config);

        if(!$this->upload->do_upload('image')){
            $this->upload->display_errors();
            pre($this->upload->display_errors());
        }else{
            $data = $this->upload->data();
            //Compress Image
            echo BASEURL.'images/productkatalog/'.date('Y-m-d').'/'.$data['file_name'];
        }
    }
 
    //Delete image summernote
    public function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(BASEURL, '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }
}
