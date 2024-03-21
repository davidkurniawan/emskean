<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
}