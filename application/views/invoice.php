<div class="wrapper">
	<div class="container-fluid">

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <div class="page-title-box">
	                <div class="btn-group pull-right">
	                    <ol class="breadcrumb hide-phone p-0 m-0">
	                        <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
	                        <li class="breadcrumb-item"><a href="#">Extra Pages</a></li>
	                        <li class="breadcrumb-item active">Invoice</li>
	                    </ol>
	                </div>
	                <h4 class="page-title">Invoice</h4>
	            </div>
	        </div>
	    </div>
<!-- end page title end breadcrumb -->

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="clearfix">
                <div class="pull-left mb-3">
                    <img src="<?php echo "https://diaryofficial.id/assets/img/logo.png" ?>" alt="" height="40">
                </div>
                <div class="pull-right">
                    <h4 class="m-0 d-print-none">Invoice</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-6">

                </div><!-- end col -->
                <div class="col-4 offset-2">
                    <div class="mt-3 pull-right">
                        <p class="m-b-10"><strong>Order Date: </strong> <?php echo $orders['date_created'] ?></p>
                        <p class="m-b-10"><strong>Order Status: </strong> 
                        	<span class="badge badge-success">
                        		<?php foreach ($status_transaksi as $key => $status): ?>
                        			<?php if ($status['id_status_transaksi'] == $orders['transaction_status']): ?>
			                        	<?php echo $status['nama_status_transaksi'] ?>
                        			<?php endif ?>
                        		<?php endforeach ?>
                        		
                        	</span>
                        </p>
                        <p class="m-b-10"><strong>Order ID: </strong> #<?php echo $orders['transaction_id'] ?></p>
                        <p class="m-b-10"><strong>Kode Reseller: </strong> <?php echo 'RSLR'.$orders['id_user_customer'] ?></p>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row mt-3">
                <div class="col-6">
                    <h6>Billing Address</h6>

                    <address class="line-h-24">
                        <b><?php echo $orders['email_admin'] ?></b> <br>
                        Jln. Daan Mogot KM. 19,8 <br>Blok B No.1 Kawasan Industri Poris Gaga Baru<br> Batu Ceper<br> Tangerang 15122
                    </address>

                </div>

                <div class="col-6">
                    <h6>Shipping Address</h6>
                    <b><?php echo $orders['user_name'] ?>,<<?php echo $orders['email_user'] ?>></b>
                    <address class="line-h-24">
                        <?php echo $orders['user_alamat'] ?><br>
                    <?php echo $user['kecamatan'] ?>, <?php echo $user['kota'] ?>, <br><?php echo $user['kelurahan'] ?>, <?php echo $user['kecamatan'] ?>, <?php echo $user['kode_pos'] ?>
                    </address>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table mt-4">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Unit Cost</th>
                                <th class="text-right">Total</th>
                            </tr></thead>
                            <tbody>
                            	<?php foreach (transChild($orders['transaction_id']) as $key => $trans): ?>
		                            <tr>
		                                <td>
		                                    <b><?php echo $trans['nama_product'] ?></b> <br/>
                                            (BARCODE) <?php echo $trans['sku_item_product'] ?> <br/>
		                                    <?php echo $trans['nama_jenis_product'] ?>
		                                </td>
		                                <td class="text-right"><?php echo $trans['qty'] ?></td>
		                                <td>IDR <?php echo number_format($trans['price']) ?></td>
		                                <td class="text-right">IDR <?php echo number_format($trans['price'] * $trans['qty']) ?></td>
		                            </tr>
                            	<?php endforeach ?>
                                <tr>
                                    <td><b>Shipping</b><br><?php echo $orders['user_kurir'] ?> <?php echo $orders['ekspedisi_service'] ?></td>
                                    <td>1</td>
                                    <td>IDR <?php echo number_format($orders['shipping_amount']) ?></td>
                                    <td class="text-right">IDR <?php echo number_format($orders['shipping_amount']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="clearfix pt-5">
                        <h6 class="text-muted">Notes:</h6>

                        <small>
                            All accounts are to be paid within 7 days from receipt of
                            invoice. To be paid by cheque or credit card or direct payment
                            online. If account is not paid within 7 days the credits details
                            supplied as confirmation of work undertaken will be charged the
                            agreed quoted fee noted above.
                        </small>
                    </div>

                </div>
                <div class="col-6">
                    <div class="float-right">
                        <p><b>Total Belanja</b> IDR <?php echo number_format($orders['total_harga']) ?></p>
                        <p><b>Shipping & Handling</b> IDR <?php echo number_format($orders['shipping_amount']) ?></p>
                        <p><b>Potongan Voucher</b> IDR <?php echo number_format($orders['potongan_product']) ?></p>
                        <h3>Grand Total IDR <?php echo number_format(($orders['total_harga'] - $orders['potongan_product']) + $orders['shipping_amount']) ?></h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="hidden-print mt-4 mb-4">
                <div class="text-right">
                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                    <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- end row -->

</div> <!-- end container -->
        </div>
        <!-- end wrapper -->
