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
                    <h4 class="page-title">Pengiriman</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Pengiriman View</h4>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Status Pengiriman</th>
                                            <th>Status Transaksi</th>
                                            <th>Third Party</th>
                                            <th>Delivery Date</th>
                                            <th>Delivery Time</th>
                                            <th>No Resi</th>
                                            <th>Cabang</th>
                                            <th>Periode Transaksi</th>
                                            <th>Kode Transaksi</th>
                                            <th>Keterangan/Catatan</th>
                                            <th>Kode Reseller</th>
                                            <th>Nama Reseller</th>
                                            <th>Shipping Name</th>
                                            <th>Shipping Service</th>
                                            <th>Shipping Amount</th>
                                            <th>Total Amount</th>
                                            <th>Total Qty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $key => $it): ?>
                                            <tr >
                                                <td><?php echo $it['title_ekspedisi_status'] ?></td>
                                                <td style="<?php if ($it['transaction_status'] == 1) { echo "color:blue;"; } else if($it['transaction_status'] == 2){ echo "color:#02c0ce;"; } else { echo "color:red;"; } ?>">
                                                    <?php echo $it['nama_status_transaksi'] ?></td>
                                                <?php if (!empty($it['id_order_biteship'])){ ?>
                                                <td>BiteShip </td>
                                                <?php } else { ?>
                                                <td>Diary </td>
                                                <?php } ?>
                                                <td><?php echo $it['delivery_date'] ?></td>
                                                <td><?php echo $it['delivery_time'] ?></td>
                                                <td><a href="https://cekresi.com/?v=wi1&noresi=<?php echo $it['nomer_resi'] ?>" target="_blank"><?php echo $it['nomer_resi'] ?></a></td>
                                                <td><?php echo $it['email'] ?></td>
                                                <td><?php echo date('Y-m-d H:i:s',strtotime($it['date_created'])) ?></td>
                                                <td><?php echo $it['transaction_id'] ?></td>
                                                <td><?php echo $it['user_description'] ?></td>
                                                <td><?php echo 'RSLR' . $it['id_user_customer']; ?></td>
                                                <td><?php echo $it['user_name'] ?></td>
                                                <td><?php echo $it['user_kurir'] ?></td>
                                                <td><?php echo $it['ekspedisi_service'] ?></td>
                                                <td><?php echo number_format($it['shipping_amount']) ?> IDR</td>
                                                <td><?php echo number_format($it['total_harga']) ?> IDR</td>
                                                <td><?php echo $it['total_qty'] ?></td>
                                                <td>
                                                    <a href="<?php echo BASEURL.'residiary/print/'.$it['transaction_id'] ?>" class="btn btn-info"><i class="fa fa-print m-r-5"></i> Resi</a>
                                                    <a href="<?php echo BASEURL.'transaksi/orders/detail/'.$it['transaction_order_id'] ?>" class="btn btn-warning" target="_blank"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
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
<!-- Required datatable js -->
<script src="<?php echo PLUGINS ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo PLUGINS ?>datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/jszip.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/pdfmake.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/vfs_fonts.js"></script>
<script src="<?php echo PLUGINS ?>datatables/buttons.html5.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/buttons.print.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo PLUGINS ?>datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/responsive.bootstrap4.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        // Default Datatable
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        // Responsive Datatable
        $('#responsive-datatable').DataTable();

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


    });



</script>        <!-- end wrapper -->
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