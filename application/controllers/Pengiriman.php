<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
		
	}
	
	public function index()
	{
		$today = date("Y-m-d");
		$tanggalKemarin = strtotime('-1 days', strtotime( $today ));
		$tglKemarin = date('Y-m-d', $tanggalKemarin);
		$tanggalBesok = strtotime('+1 days', strtotime( $today ));
		$tglBesok = date('Y-m-d', $tanggalBesok);
		$idAdmin = $this->session->userdata('idAdmin');

		if ($this->session->userdata('flagAdmin') == 1) {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator JOIN ekspedisi_status eks ON tor.ekspedisi_status=eks.id_ekspedisi_status WHERE tor.transaction_status="2" AND (tor.user_kurir="jne" OR tor.user_kurir="sicepat" OR tor.user_kurir="sap" OR tor.user_kurir="anteraja") AND (tor.ekspedisi_status="3" OR tor.ekspedisi_status="2") ORDER BY tor.date_created DESC ');
		} else {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator JOIN ekspedisi_status eks ON tor.ekspedisi_status=eks.id_ekspedisi_status WHERE tor.id_administrator="'.$idAdmin.'" AND tor.transaction_status="2" AND (tor.user_kurir="jne" OR tor.user_kurir="sicepat" OR tor.user_kurir="sap" OR tor.user_kurir="anteraja") AND (tor.ekspedisi_status="3" OR tor.ekspedisi_status="2") ORDER BY tor.date_created DESC ');	
		}
		$this->load->view('global/header');
		$this->load->view('pengiriman/view',$viewData);
		$this->load->view('global/footer');
	}	
	public function sudahsampai()
	{
		$today = date("Y-m-d");
		$tanggalKemarin = strtotime('-1 days', strtotime( $today ));
		$tglKemarin = date('Y-m-d', $tanggalKemarin);
		$tanggalBesok = strtotime('+1 days', strtotime( $today ));
		$tglBesok = date('Y-m-d', $tanggalBesok);

		if ($this->session->userdata('flagAdmin') == 1) {
		$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator JOIN ekspedisi_status eks ON tor.ekspedisi_status=eks.id_ekspedisi_status WHERE tor.transaction_status="2" AND (tor.user_kurir="jne" OR tor.user_kurir="sicepat") AND tor.ekspedisi_status="4" ORDER BY tor.date_created DESC ');
		} else {
			$viewData['orders'] = $this->GlobalModel->queryManual('SELECT * FROM transaction_order tor JOIN status_transaksi sti ON tor.transaction_status=sti.id_status_transaksi JOIN administrator adt ON tor.id_administrator=adt.id_administrator JOIN ekspedisi_status eks ON tor.ekspedisi_status=eks.id_ekspedisi_status WHERE tor.id_administrator="'.$idAdmin.'" AND tor.transaction_status="2" AND (tor.user_kurir="jne" OR tor.user_kurir="sicepat") AND tor.ekspedisi_status="4" ORDER BY tor.date_created DESC ');
		}
		$this->load->view('global/header');
		$this->load->view('pengiriman/view',$viewData);
		$this->load->view('global/footer');
	}	
}