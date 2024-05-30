<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}

	public function index()
	{
		$viewData['news'] = $this->GlobalModel->getData('news',null);
		$this->load->view('global/header');
		$this->load->view('news/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$viewData['kategori'] = $this->GlobalModel->getData('news_kategori',null);

		$this->load->view('global/header');
		$this->load->view('news/tambah',$viewData);
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path'] = './images/news/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/news/'.date('Y-m-d')))
	    {
	        mkdir('./images/news/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);
        $this->upload->do_upload('image');

		$dataInsert = array(
			'meta_title'	=>	$post['title'],
			'meta_desc'		=>	$post['metadesc'],
			'meta_keywords'	=>	$post['keywords'],
			'title'			=>	$post['title'],
			'description'	=>	$post['description'],
			'thumbnail'		=>	'images/news/'.date('Y-m-d').'/'.$this->upload->data('file_name'),
			'url'			=>	url_title(strtolower($post['title']),'-'),
			'id_kategori'	=>	$post['kategori'],
			'created_date'	=>	date('Y-m-d H:i:s'),
			'id_author'		=>	$this->session->userdata('idAdmin')
		);


		$this->GlobalModel->insertData('news',$dataInsert);

		redirect(BASEURL.'news');
	}

	public function edit($id='')
	{
		$viewData['news']	=	$this->GlobalModel->getDataRow('news',array('id_news'=>$id));
		$viewData['kategori'] = $this->GlobalModel->getData('news_kategori',null);

		$this->load->view('global/header');
		$this->load->view('news/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
			
		$config['upload_path'] = './images/news/'.date('Y-m-d').'/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';

        if (!is_dir('images/news/'.date('Y-m-d')))
	    {
	        mkdir('./images/news/'.date('Y-m-d'), 0777, true);
	    }

	    $this->load->library('upload', $config);
        $this->upload->do_upload('image');

		$dataInsert = array(
			'meta_title'	=>	$post['title'],
			'meta_desc'		=>	$post['metadesc'],
			'meta_keywords'	=>	$post['keywords'],
			'title'			=>	$post['title'],
			'description'	=>	$post['description'],
			'url'			=>	url_title(strtolower($post['title']),'-'),
			'id_kategori'	=>	$post['kategori'],
			'id_sub_kategori'=>	$post['subkategori'],
			'created_date'	=>	date('Y-m-d H:i:s'),
			'id_author'		=>	$this->session->userdata('idAdmin')
		);

		if ($front = $this->upload->do_upload('imgFileFront')) {
			$dataInsert['thumbnail'] = 'images/product/'.$this->session->userdata('brandSlug').'/'.date('Y-m-d').'/'.$this->upload->data('file_name');
		}
		
		$this->GlobalModel->updateData('news',array('id_news'=>$value),$dataInsert);
		redirect(BASEURL.'news');
	}

	public function deleteItem($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->deleteData('news',array('id_news'=>$post['id_delete']));
		echo "Data Berhasil di hapus";
	}


	//Upload image summernote
    public function upload_image(){
		$this->load->library('upload');

        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './images/news/'.date('Y-m-d').'/';
	        $config['allowed_types'] = '*';
	        $config['max_size'] = '2048';

	        if (!is_dir('images/news/'.date('Y-m-d')))
		    {
		        mkdir('./images/news/'.date('Y-m-d'), 0777, true);
		    }

		    $this->load->library('upload', $config);

            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                echo BASEURL.'images/news/'.date('Y-m-d').'/'.$data['file_name'];
            }
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