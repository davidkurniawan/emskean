<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class beautytips extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['item'] = $this->GlobalModel->getData('beautytips',null);
		$this->load->view('global/header');
		$this->load->view('beautytips/view',$viewData);
		$this->load->view('global/footer');
	}

	public function tambah($value='')
	{
		$this->load->view('global/header');
		$this->load->view('beautytips/tambah');
		$this->load->view('global/footer');
	}

	public function tambahOnAct($value='')
	{
		$post = $this->input->post();

		$config['upload_path']          = './images/beautytips/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
		$dataInsert = array(
			'title'		=>	$post['title'],
			'description'	=>	$post['description'],
			'url_title'		=>	url_title($post['title'],'-'),
			'image'		=>	'images/beautytips/'.$this->upload->data('file_name')
		);

		$this->GlobalModel->insertData('beautytips',$dataInsert);

		redirect(BASEURL.'beautytips');
	}

	public function edit($id='')
	{
		$viewData['item']	=	$this->GlobalModel->getDataRow('beautytips',array('id_beautytips'=>$id));
		// pre($viewData);
		$this->load->view('global/header');
		$this->load->view('beautytips/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();
			
		$config['upload_path']          = './images/beautytips/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        if (empty($this->upload->data('file_name'))) {
        	$dataInsert = array(
				'title'		=>	$post['title'],
				'url_title'		=>	url_title(strtolower($post['title']),'-'),
				'description'	=>	$post['description'],
			);

        } else {
	        $dataInsert = array(
				'title'		=>	$post['title'],
				'url_title'		=>	url_title(strtolower($post['title']),'-'),
				'description'	=>	$post['description'],
				'image'		=>	'images/beautytips/'.$this->upload->data('file_name')
			);

        }
        // pre($value);
		$this->GlobalModel->updateData('beautytips',array('id_beautytips'=>$value),$dataInsert);
		redirect(BASEURL.'beautytips');
	}

	public function deleteItem($value='')
	{
		$post = $this->input->post();
		// pre($post);
		$this->GlobalModel->deleteData('beautytips',array('id_beautytips'=>$post['id_delete']));
		echo "Data Berhasil di hapus";
	}

	//Upload image summernote
    public function upload_image(){
		$this->load->library('upload');

        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './images/beautytips/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./images/beautytips/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['new_image']= './images/beautytips/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo BASEURL.'images/beautytips/'.$data['file_name'];
            }
        }
    }
 
    //Delete image summernote
    public function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

}