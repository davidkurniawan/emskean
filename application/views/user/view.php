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
                    <h4 class="page-title">User Page </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <div class="row mb-2" >
                        <div class="col-6">
                            <h4 class="header-title m-t-0 m-b-20">Table User</h4>
                        </div>
                       
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable-buttons">
                        <thead>
                            <tr>
                                <th>Created Date</th>
                                <th>Referral Code</th>
                                <th>Kode Reseller</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>File Ktp</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Alamat </th>
                                <th>Kode POS </th>
                                <th>Poin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $key => $it): ?>
                                <tr>
                                    <td><?php echo $it['created_date'] ?></td>
                                    <td><?php echo $it['ref_code'] ?></td>
                                    <td><?php echo 'RSLR' . $it['id_user_customer']; ?></td>
                                    <th><?php echo $it['user_nik'] ?></th>
                                    <td><?php echo $it['nama'] ?></td>
                                    <td><?php echo $it['phone'] ?></td>
                                    <td><?php echo $it['email'] ?></td>
                                    <td><img src="<?php echo BASEURLFRONT.$it['file_ktp'] ?>" style="width: 200px;"></td>
                                    <td><?php echo $it['provinsi'] ?></td>
                                    <td><?php echo $it['kota'] ?></td>
                                    <td><?php echo $it['kecamatan'] ?></td>
                                    <td><?php echo $it['kelurahan'] ?></td>
                                    <td><?php echo $it['alamat'] ?></td>
                                    <td><?php echo $it['kode_pos'] ?></td>
                                    <td><?php echo $it['poin'] ?></td>
                                    <td>
                                        <a href="<?php echo BASEURL.'user/update/'.$it['id_user_customer'] ?>" class="btn btn-danger"><i class="fa fa-edit"></i></a>
                                        <?php if ($it['status_user_karyawan'] == 1){ ?>
                                            <a href="<?php echo BASEURL.'user/changeToReseller/'.$it['id_user_customer'] ?>" class="btn btn-primary ">Karyawan</a>
                                        <?php }else{ ?>
                                            <a href="<?php echo BASEURL.'user/changeToKaryawan/'.$it['id_user_customer'] ?>" data-idtag="" class="btn btn-warning karyawan-confirm">Reseller</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>

                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
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
        <!-- end wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
         //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: [{
            extend: 'excel',
            filename: "User Export <?php echo date('Y-m-d') ?>",
            text: 'Save Excel',
        }]
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        $('.karyawan-confirm').on('click', function(){
            var idprod = $(this).data('idtag');
            $.confirm({
                title: 'A secure action',
                content: 'Kamu yakin ingin merubah menjadi status? <br> Click confirm or cancel for another modal',
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
                                            return $.post( "<?php echo BASEURL.'user/changeToKaryawan' ?>", { id_user: idprod }).done(function( data ) {
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