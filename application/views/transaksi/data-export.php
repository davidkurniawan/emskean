<!-- DataTables -->
<link href="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?php echo PLUGINS ?>datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.js"></script>
<link href="<?php echo PLUGINS ?>bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                            <li class="breadcrumb-item active">Table</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Export </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <form action="<?php echo BASEURL.'transexport/getDataExport' ?>" method="POST">
                        
                    <div class="row mb-2" >

                        <div class="col-lg-6">
                             <div class="form-group">
                                <label>Date Range</label>
                                <div>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" class="form-control" name="start" placeholder="Date Start" required />
                                        <input type="text" class="form-control" name="end" placeholder="Date End" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="form-group">
                                <label>Cabang</label>
                                <select class="form-control" name="cabang" required>
                                    <?php // foreach ($cabang as $key => $value): ?>
                                    <option value="<?php // echo $value['id_administrator'] ?>"><?php // echo $value['email'] ?></option>
                                    <?php // endforeach ?>
                                </select>
                            </div>
                        </div> -->
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Cabang</th>
                                    <th>Status</th>
                                    <th>Kode Reseller</th>
                                    <th>Nama Reseller</th>
                                    <th>Kode Post</th>
                                    <th>No Telp</th>
                                    <th>NIK</th>
                                    <th>Tgl Registrasi</th>
                                    <th>Kabupaten</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Periode Transaksi</th>
                                    <th>Kode Transaksi</th>
                                    <th>Kode Barang</th>
                                    <th>Harga Per Barang</th>
                                    <th>Qty Per Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Total Qty</th>
                                    <th>PCS</th>
                                    <th>Harga</th>
                                    <th>Jumlah Gross</th>
                                    <th>Nilai Potongan</th>

                                    <th>Payment</th>
                                    <th>Payment Code</th>

                                    <th>Payment Fee</th>
                                    <th>Payment Vat</th>

                                    <th>Shipping Amount</th>
                                    <th>Net Amount</th>
                                    <th>Total Dibayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $keyData => $value): ?>
                                    <?php $childItem = getProdItem($value['transaction_id']); ?>
                                        <?php foreach ($childItem as $keychild => $childs): ?>
                                <tr>
                                    <td><?php echo $value['nama_cabang'] ?></td>
                                    <td><?php echo $value['nama_status_transaksi'] ?></td>
                                    <td><?php echo 'RSLR' . $value['id_user_customer']; ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td><?php echo $value['kode_pos'] ?></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['user_nik'] ?></td>
                                    <td><?php echo $value['created_date'] ?></td>
                                    <td><?php echo $value['provinsi'] ?></td> 
                                    <td><?php echo $value['kota'] ?></td>
                                    <td><?php echo $value['kecamatan'] ?></td>
                                    <td><?php echo $value['kelurahan'] ?></td>
                                    <td><?php echo $value['created_date'] ?></td>
                                    <td><?php echo date('m',strtotime($value['created_date'])) ?></td>
                                    <td><?php echo $value['transaction_id'] ?></td>
                                    <td><?php echo $childs['sku_item_product'] ?></td>
                                    <td><?php echo $childs['price'] ?></td>
                                    <td><?php echo $childs['qty'] ?></td>
                                    <td><?php echo $childs['name'] ?></td>
                                    <td>
                                        <?php $qtyChil = 0; ?>
                                        <?php foreach ($childItem as $keychild => $child): ?>
                                            <?php $qtyChil += $child['qty']; ?> 
                                        <?php endforeach ?>
                                        <?php echo $qtyChil; ?>
                                    </td>
                                    <td>PCS</td>
                                    <td><?php echo number_format($value['total_harga']) ?></td>
                                    <td><?php echo number_format(($childs['qty'] * $childs['price'])) ?></td>
                                    <td><?php echo number_format($value['potongan_product']) ?></td>
                                    <td><?php echo $value['payment_method'] ?></td>
                                    <td><?php echo $value['payment_code'] ?></td>
                                    <?php $feePayment = getFeePayment($value['payment_code']); ?>
                                    <td>
                                        <?php if ($feePayment['sistem_fee'] == 'flat'){ ?>
                                            <?php echo number_format($feePayment['fee_payment']) ?>
                                        <?php } else { ?>
                                            <?php  $feePersetase = (($value['total_harga'] * $feePayment['fee_payment']) / 100); echo number_format($feePersetase);  ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($feePayment['sistem_fee'] == 'flat'){ ?>
                                            <?php echo number_format($feePayment['vat_payment']) ?>
                                        <?php } else { ?>
                                            <?php $ppnPayment = round((($feePersetase * $feePayment['vat_payment']) / 100)); echo number_format($ppnPayment) ?>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo number_format($value['shipping_amount']) ?></td>
                                    <td><?php echo number_format(($value['total_harga'] + $value['shipping_amount']) - $value['potongan_product']) ?></td>

                                    <td>
                                        <?php if ($feePayment['sistem_fee'] == 'flat'){ ?>
                                            <?php echo number_format(($value['total_harga'] + $value['shipping_amount']) - $feePayment['fee_payment'] - $feePayment['vat_payment']);  ?>
                                        <?php } else { ?>
                                            <?php echo number_format(($value['total_harga'] + $value['shipping_amount']) - $feePersetase - $ppnPayment);  ?>
                                        <?php } ?>
                                        
                                    </td>
                                </tr>
                                        <?php endforeach ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    </form>
                    

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


<script src="<?php echo PLUGINS ?>bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- end wrapper -->
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