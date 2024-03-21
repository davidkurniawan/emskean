<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventdiary extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{

		$viewData['event']  = $this->GlobalModel->getData('event_diary',null);
		$this->load->view('global/header');
		$this->load->view('event/view',$viewData);
		$this->load->view('global/footer');
	}

	public function updateStatus($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->updateData('event_diary',array('id_event_diary'=>$value),array('status_event_diary'=>$post['status']));
		redirect(BASEURL.'eventdiary');
	}
}
