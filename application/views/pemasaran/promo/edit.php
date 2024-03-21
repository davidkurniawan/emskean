<link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

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
                    <h4 class="page-title">Promo </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Edit Promo</h4>

                    <form method="POST" action="<?php echo BASEURL.'pemasaran/voucher/editOnAct' ?>">
                    	<div class="form-group">
                    		<label>Nama Promo</label>
                    		<input type="hidden" value="<?php echo $promo['promo_product_id'] ?>" name="idPromo">
                    		<input type="text" class="form-control" name="namaPromo" value="<?php echo $promo['promo_product_name'] ?>" required>
                    	</div>
                        <div class="form-group">
                            <label>Promo Discount Amount</label>
                            <input type="number" class="form-control" required value="<?php echo $promo['promo_product_discount'] ?>" name="discountAmount">
                        </div>
                    	<button class="btn btn-info" type="submit">Submit</button>
                    </form>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<script src="<?php echo PLUGINS ?>bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
