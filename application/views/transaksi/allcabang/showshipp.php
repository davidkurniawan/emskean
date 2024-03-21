
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                            <li class="breadcrumb-item active">All Cabang</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Account Shipping</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Account Overview Shipping</h4>

                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo BASEURL.'transaksi/allcabang/shipping' ?>" method="POST">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <?php $bulan = array(1=>"Januari",2=>"Februari",3=>"Maret",4=>"April",5=>"Mei",6=>"Juni",7=>"Juli",8=>"Agustus",9=>"September",10=>"Oktober",11=>"November",12=>"Desember"); ?>
                                    <select class="form-control" name="bulan">
                                    <?php foreach ($bulan as $key => $value): ?>
                                        <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                    <?php endforeach ?>
                                    </select>
                                </div>
                                <button class="btn btn-info" type="submit">Submit</button>
                            </form>
                        </div>
                    	<div class="col-12">
                    		<?php if (empty($dataShip)): ?>
                    			<h4>Data Kosong</h4>
                    		<?php endif ?>
                    		<?php foreach ($dataShip as $key => $value): ?>
		                        <div class="col-sm-6 col-lg-6 col-xl-3">
		                            <div class="card-box mb-0 widget-chart-two">
		                                <div class="widget-chart-two-content">
		                                    <p class="text-muted mb-0 mt-2">Cabang <?php echo $value['nama_admin'] ?></p>
		                                    <h3 class=""><?php echo $value['shipping_amount'] ?></h3>
		                                </div>

		                            </div>
		                        </div>
		                    <?php endforeach ?>
                    	</div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->
	</div>
</div>