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
                    <h4 class="page-title">Kategori </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <div class="row mb-2" >
                        <div class="col-6">
                            <h4 class="header-title m-t-0 m-b-20">Table Voucher</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?php echo BASEURL.'pemasaran/voucher/tambah' ?>" class="btn btn-info">Tambah</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title Voucher</th>
                                <th>Deskripsi Voucher</th>
                                <th>Code Voucher</th>
                                <th>Discount</th>
                                <th>Kategory</th>
                                <th>Flag</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($voucher as $key => $pro): ?>
                                <tr>
                                    <td><?php echo $pro['voucher_title'] ?></td>
                                    <td><?php echo $pro['voucher_desc'] ?></td>
                                    <td><?php echo $pro['voucher_code'] ?></td>
                                    <td><?php echo $pro['voucher_value'] ?></td>
                                    <td>
                                        <?php if ($pro['voucher_category'] == 1) { ?>
                                            Diskon
                                        <?php } else { ?>
                                            Potongan
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($pro['voucher_flag'] == 1) { ?>
                                            Internal
                                        <?php } else { ?>
                                            External
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $pro['created_date'] ?></td>
                                    <td>
                                        <a href="<?php echo BASEURL.'pemasaran/voucher/edit/'.$pro['id_voucher'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger trash-confirm" data-idpromo="<?php echo $pro['id_voucher'] ?>"><i class="fa fa-trash"></i></button>
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
            var idprod = $(this).data('idpromo');
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
                                            return $.post( "<?php echo BASEURL.'pemasaran/voucher/deletepromo' ?>", { id_delete: idprod }).done(function( data ) {
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