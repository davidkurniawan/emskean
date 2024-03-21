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
                    <h4 class="page-title">Jenis Product </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <div class="row mb-2" >
                        <div class="col-6">
                            <h4 class="header-title m-t-0 m-b-20">Table Jenis Product</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?php echo BASEURL.'itemproduct/tambah' ?>" class="btn btn-info">Tambah</a>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Parent Product</th>
                                <th>SKU</th>
                                <th>Nama Variant/Kategori</th>
                                <th>QTY</th>
                                <th>Image</th>
                                <th>Tanggal</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($item as $key => $it): ?>
                                <tr>
                                    <td><?php echo $it['nama_product'] ?></td>
                                    <td><?php echo $it['sku_item_product'] ?></td>
                                    <td><?php echo $it['nama_jenis_product'] ?></td>
                                    <td><?php echo $it['qty_item'] ?></td>
                                    <td><img src="<?php echo BASEURL.$it['image_varian'] ?>" style="width: 200px;"></td>
                                    <td><?php echo $it['created_date'] ?></td>
                                    <td>
                                        <a href="<?php echo BASEURL.'itemproduct/edit/'.$it['product_item_id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger trash-confirm" data-iditem="<?php echo $it['sku_item_product'] ?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

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



</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable();

        $('.trash-confirm').on('click', function(){
            var idprod = $(this).data('iditem');
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
                                            return $.post( "<?php echo BASEURL.'itemproduct/deleteItem' ?>", { id_delete: idprod }).done(function( data ) {
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