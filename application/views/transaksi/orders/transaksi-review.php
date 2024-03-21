<!-- DataTables -->
<link href="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?php echo PLUGINS ?>datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.js"></script>
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
                    <h4 class="page-title">Transaksi</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Transaksi Review</h4>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Transaksi ID</td>
                                    <td width="65%"><?php echo $orders['transaction_id'] ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $orders['user_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $orders['user_email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Telephone</td>
                                    <td><?php echo $orders['user_phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td><?php echo $orders['user_description'] ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>IDR <?php echo number_format($orders['total_harga']) ?></td>
                                </tr>
                                <tr>
                                    <td>payment Method</td>
                                    <td><?php echo $orders['payment_method'] ?></td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td><?php echo $orders['date_created'] ?></td>
                                </tr>
                                <tr>
                                    <td>Update Administrator</td>
                                    <td><?php echo $orders['id_administrator'] ?></td>
                                </tr>
                                <tr>
                                    <td>Update Date</td>
                                    <td><?php echo $orders['update_trans_date'] ?></td>
                                </tr>
                                <tr>
                                    <td>Bukti Transfer</td>
                                    <td><img src="<?php echo BASEURLFRONT.$orders['bukti_pembayaran'] ?>" style="width: 300px;"></td>
                                </tr>
                                <?php if ($this->session->userdata('flagAdmin') == 1){ ?>
                                <tr>
                                    <td>Status Transaksi</td>
                                    <td><form action="<?php echo BASEURL.'transaksi/orders/updateStatus/'.$orders['transaction_order_id'] ?>" method="POST">
                                        <div class="form-group">
                                            <label>Status Transaksi</label>
                                            <select class="form-control" name="statusTransaksi" required readonly>
                                                <?php foreach ($status_transaksi as $key => $status): ?>
                                                    <option value="<?php echo $status['id_status_transaksi'] ?>" <?php if($status['id_status_transaksi'] == $orders['transaction_status']){ echo "selected='selected'";} ?>><?php echo $status['nama_status_transaksi'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">submit</button>
                                    </form></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                
                                <?php } else if($orders['transaction_status'] == "3") { ?>
                                
                                <tr>
                                    <td>Status Transaksi</td>
                                    <td><form action="<?php echo BASEURL.'transaksi/orders/updateStatus/'.$orders['transaction_order_id'] ?>" method="POST">
                                        <div class="form-group">
                                            <label>Status Transaksi</label>
                                            <select class="form-control" name="statusTransaksi" required readonly>
                                                <?php foreach ($status_transaksi as $key => $status): ?>
                                                    <option value="<?php echo $status['id_status_transaksi'] ?>" <?php if($status['id_status_transaksi'] == $orders['transaction_status']){ echo "selected='selected'";} ?>><?php echo $status['nama_status_transaksi'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <!-- <button class="btn btn-primary" type="submit">submit</button> -->
                                    </form></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Bukti Pengiriman</td>
                                    <td>
                                        <form action="<?php echo BASEURL.'transaksi/orders/buktipengiriman/'.$orders['transaction_order_id'] ?>" method="post" enctype="multipart/form-data">
                                            <div class="input-group form-group mb-3">
                                                <input type="file" class="form-control" name="filePengiriman" required>
                                                <!-- <button class="btn btn-outline-secondary" type="submit" id="button-addon2">submit</button> -->
                                            </div>
                                        </form>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Status Pengiriman</td>
                                    <td>
                                        <form action="<?php echo BASEURL.'transaksi/orders/updatePengiriman/'.$orders['transaction_order_id'] ?>" method="post">
                                            <div class="input-group form-group mb-3">
                                                <select class="form-control" name="expedisiStatus" readonly>
                                                    <?php foreach ($status_ekspedisi as $key => $eksstatus): ?>
                                                    <option value="<?php echo $eksstatus['id_ekspedisi_status'] ?>" <?php if($orders['ekspedisi_status'] == $eksstatus['id_ekspedisi_status']){ echo "selected='selected'";} ?>><?php echo $eksstatus['title_ekspedisi_status'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                              <!-- <button class="btn btn-outline-secondary" type="submit" id="button-addon2">submit</button> -->
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Resi</td>
                                    <td>
                                        <form action="<?php echo BASEURL.'transaksi/orders/updateResi/'.$orders['transaction_order_id'] ?>" method="post">
                                            <div class="input-group mb-3">
                                              <input type="text" class="form-control" name="nomer_resi" value="<?php echo $orders['nomer_resi'] ?>" readonly>
                                              <!-- <button class="btn btn-outline-secondary" type="submit" id="button-addon2">submit</button> -->
                                            </div>
                                        </form>
                                    </td>
                                </tr>   
                                <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    

                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<script src="<?php echo PLUGINS ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.js"></script>
        <!-- end wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable();

        $('.trash-confirm').on('click', function(){
            var idprod = $(this).data('idorders');
            $.confirm({
                title: 'A secure action',
                content: 'Its smooth to do multiple confirms at a time. <br> Click confirm or cancel for another modal',
                icon: 'fa fa-question-circle',
                animation: 'scale',
                closeAnimation: 'scale',
                opacity: 0.5,
                buttons: {
                    'confirm': {
                        text: 'Proceed',
                        btnClass: 'btn-blue',
                        action: function(){
                            $.confirm({
                                title: 'This maybe critical',
                                content: 'Critical actions can have multiple confirmations like this one.',
                                icon: 'fa fa-warning',
                                animation: 'scale',
                                closeAnimation: 'zoom',
                                buttons: {
                                    confirm: {
                                        text: 'Yes, sure!',
                                        btnClass: 'btn-orange',
                                        action: function(){
                                            return $.post( "<?php echo BASEURL.'transaksi/orders/deletedata' ?>", { id_delete: idprod }).done(function( data ) {
                                                location.reload();
                                              });
                                            $.alert('A very critical action <strong>triggered!</strong>');
                                        }
                                    },
                                    cancel: function(){
                                        $.alert('you clicked on <strong>cancel</strong>');
                                    }
                                }
                            });
                        }
                    },
                    cancel: function(){
                        $.alert('you clicked on <strong>cancel</strong>');
                    },
                    moreButtons: {
                        text: 'something else',
                        action: function(){
                            $.alert('you clicked on <strong>something else</strong>');
                        }
                    },
                }
            });
        });
    });
</script>