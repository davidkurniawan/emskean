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
                    <h4 class="page-title">Product Catalog </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <div class="row mb-2" >
                        <div class="col-6">
                            <h4 class="header-title m-t-0 m-b-20">Table Product Catalog</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?php echo BASEURL.'productkatalog/tambah' ?>" class="btn btn-info">Tambah Product Catalog</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Katalog Name</th>
                                <th>Katalog Headline</th>
                                <th>Katalog Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($product as $key => $prod): ?>
                                <tr>
                                    <td><?php echo $prod['product_catalog_name'] ?></td>
                                    <td><?php echo $prod['product_catalog_headline'] ?></td>
                                    <td><img src="<?php echo BASEURL.$prod['product_catalog_banner'] ?>" style="height: 70px;"></td>
                                    <td>
                                        <a href="<?php echo BASEURL.'productkatalog/edit/'.$prod['id_product_catalog'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger trash-confirm" data-idkatalog="<?php echo $prod['id_product_catalog'] ?>"><i class="fa fa-trash"></i></button>
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
<script src="<?php echo PLUGINS ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.js"></script>
        <!-- end wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable();

        $('.trash-confirm').on('click', function(){
            var idkatalog = $(this).data('idkatalog');
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
                                            return $.post( "<?php echo BASEURL.'productkatalog/deleteItem' ?>", { id_delete: idkatalog }).done(function( data ) {
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