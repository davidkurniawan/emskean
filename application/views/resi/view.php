<!-- DataTables -->
<link href="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                            <li class="breadcrumb-item"><a href="#">Components</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Advanced</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Resi Pengiriman </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <table border="1" width="60%">
                        <tr>
                            <td ><img src="https://diaryofficial.id/assets/img/logo.png" height="40"></td>
                            <td colspan="2"><b>LABEL PENGIRIMAN</b></td>
                        </tr>
                        <tr>
                            <td><b>NOMER TRANSACTION</b></td>
                            <td colspan="2"><?php echo $orders['transaction_id'] ?></td>
                        </tr>
                        <tr>
                            <td><b>NOMER RESI</b></td>
                            <td colspan="2"><?php echo $orders['nomer_resi'] ?></td>
                        </tr>
                        <tr>
                            <td><b>JASA KIRIM</b></td>
                            <td><?php echo $orders['user_kurir'] ?></td>
                            <td><?php echo $orders['ekspedisi_service'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>BIAYA ONGKIR</b></td>
                            <td>BERAT</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Rp. <?php echo number_format($orders['shipping_amount']) ?></b><br>
                            </td>
                            <td><?php $brtBrng = (count(transChild($orders['transaction_id'])) * 230); echo $brtBrng; ?> Gram</td>
                        </tr>
                        
                        <tr>
                            <td>Kepada</td>
                            <td>Alamat</td>
                            <td>No Tlfn</td>
                        </tr>
                        <tr>
                            <td><?php echo $orders['user_name'] ?>,<<?php echo $orders['email_user'] ?>></td>
                            <td>
                                <?php echo $orders['user_alamat'] ?><br>
                                <?php echo $user['kecamatan'] ?>, <?php echo $user['kota'] ?>, <br>
                                <?php echo $user['kelurahan'] ?>, <?php echo $user['kecamatan'] ?>, 
                                <?php echo $user['kode_pos'] ?></td>
                            <td><?php echo $user['phone'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Dari</b></td>
                            <td colspan="2">
                                <b>Diary Official </b><br>
                                <?php echo $orders['alamat_admin'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Telp Pengirim</td>
                            <td colspan="2">: 088294669690</td>
                        </tr>
                        <tr>
                            <td>
                                <b>Nama Produk</b>
                            </td>
                            <td colspan="2">
                                <?php foreach (transChild($orders['transaction_id']) as $key => $trans): ?>
                                <b><?php echo $trans['nama_product'] ?></b> (<?php echo $trans['qty'] ?> QTY)<br/>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    </table>
                    <div class="hidden-print mt-4 mb-4">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<script src="<?php echo PLUGINS ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.js"></script>
        <!-- end wrapper -->
