<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingpage extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function index()
	{
		$viewData['setting'] = $this->GlobalModel->getDataRow('setting_page',array('id_setting_page'=>1));
		$this->load->view('global/header');
		$this->load->view('settingpage/update',$viewData);
		$this->load->view('global/footer');
	}
}