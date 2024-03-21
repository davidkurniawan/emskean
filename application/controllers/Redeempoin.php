<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redeempoin extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$viewData['item'] = $this->GlobalModel->queryManual('SELECT rp.signature,rp.nomer_resi,usc.alamat,usc.kode_pos,usc.kota,usc.kecamatan,usc.provinsi,usc.kelurahan,usc.nama, usc.email, usc.phone, usc.poin as poin_user, ppn.produk_poin_title, ppn.poin as poin_produk, usc.id_user_customer, rp.id_redeem_poin, rp.status_redeem_poin FROM redeem_poin rp JOIN user_customer usc ON rp.id_user_customer=usc.id_user_customer JOIN produk_poin ppn ON rp.id_produk_poin=ppn.id_produk_poin');
		$this->load->view('global/header');
		$this->load->view('redeem_poin/view',$viewData);
		$this->load->view('global/footer');
	}

	public function editredeem($value='')
	{
		$viewData['item'] = $this->GlobalModel->queryManualRow('SELECT rp.nomer_resi,usc.alamat,usc.kode_pos,usc.kota,usc.kecamatan,usc.provinsi,usc.kelurahan,usc.nama, usc.email, usc.phone, usc.poin as poin_user, ppn.produk_poin_title, ppn.poin as poin_produk, usc.id_user_customer, rp.id_redeem_poin, rp.status_redeem_poin FROM redeem_poin rp JOIN user_customer usc ON rp.id_user_customer=usc.id_user_customer JOIN produk_poin ppn ON rp.id_produk_poin=ppn.id_produk_poin WHERE rp.id_redeem_poin="'.$value.'" ');
		$this->load->view('global/header');
		$this->load->view('redeem_poin/update',$viewData);
		$this->load->view('global/footer');
	}

	public function editOnAct($value='')
	{
		$post = $this->input->post();

		$this->GlobalModel->updateData('redeem_poin',array('id_redeem_poin'=>$value),array('nomer_resi'=>$post['noResi']));
		redirect(BASEURL.'Redeempoin');
	}

	public function changeStatus($idredeem='',$status='')
	{
		if ($status == 1) {
			$redeem = $this->GlobalModel->getDataRow('redeem_poin',array('id_redeem_poin'=>$idredeem));
			$produk = $this->GlobalModel->getDataRow('produk_poin',array('id_produk_poin'=>$redeem['id_produk_poin']));
			$user = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$redeem['id_user_customer']));
			$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$redeem['id_user_customer']),array('poin'=>$user['poin']-$produk['poin']));

			$this->GlobalModel->updateData('redeem_poin',array('id_redeem_poin'=>$idredeem),array('status_redeem_poin'=>2));
		} else if($status == 2) {
			$this->GlobalModel->updateData('redeem_poin',array('id_redeem_poin'=>$idredeem),array('status_redeem_poin'=>3));
		} else if ($status == 3) {
			$this->GlobalModel->updateData('redeem_poin',array('id_redeem_poin'=>$idredeem),array('status_redeem_poin'=>4));
		}
		redirect(BASEURL.'Redeempoin');
	}

	public function viewalamat($value='')
	{
		$viewData['user'] = $this->GlobalModel->queryManualRow('SELECT rp.signature,rp.nomer_resi,usc.alamat,usc.kode_pos,usc.kota,usc.kecamatan,usc.provinsi,usc.kelurahan,usc.nama, usc.email, usc.phone, usc.poin as poin_user, ppn.produk_poin_title, ppn.poin as poin_produk, usc.id_user_customer, rp.id_redeem_poin, rp.status_redeem_poin FROM redeem_poin rp JOIN user_customer usc ON rp.id_user_customer=usc.id_user_customer JOIN produk_poin ppn ON rp.id_produk_poin=ppn.id_produk_poin WHERE rp.id_redeem_poin="'.$value.'" ');
		$this->load->view('global/header');
		$this->load->view('redeem_poin/viewalamat',$viewData);
		$this->load->view('global/footer');
	}
}