<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residiary extends CI_Controller {

    function __construct() {
        parent::__construct();
        sessionLogin();
        
    }
    
    public function print($value='')
    {
        $viewData['orders'] = $this->GlobalModel->queryManualRow('SELECT adm.email as email_admin,adm.alamat_lengkap as alamat_admin, ucr.kode_pos, ucr.email as email_user,ucr.provinsi as provinsi_user, ucr.kota as kota_user, ucr.kelurahan as kelurahan_user, ucr.kecamatan as kecamatan_user, ucr.alamat as alamat_user,tor.* FROM transaction_order tor JOIN administrator adm ON tor.id_administrator=adm.id_administrator JOIN user_customer ucr ON tor.id_user_customer=ucr.id_user_customer WHERE tor.transaction_id="'.$value.'" ');
        // pre($viewData);
        $viewData['user'] = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$viewData['orders']['id_user_customer']));
        $viewData['status_transaksi'] = $this->GlobalModel->getData('status_transaksi',null);
        $this->load->view('global/header');
        $this->load->view('resi/view',$viewData);
        $this->load->view('global/footer');
    }

}