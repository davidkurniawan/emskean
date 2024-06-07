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
                    <h4 class="page-title">Voucher </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Tambah Voucher</h4>

                    <form method="POST" action="<?php echo BASEURL.'pemasaran/voucher/tambahOnAct' ?>">
                        <div class="form-group">
                            <label>Title Voucher</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Voucher</label>
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Syarat Dan Ketentuan</label>
                            <textarea class="form-control" name="sk"></textarea>
                        </div>
                    	<div class="form-group">
                    		<label>Kode Voucher</label>
                    		<input type="text" class="form-control" name="namaPromo" required>
                    	</div>
                        <div class="form-group">
                            <label>Start Date (Masa Berlaku)</label>
                            <input type="text" class="form-control" name="start" required>
                        </div>
                        <div class="form-group">
                            <label>End Date (Masa Berlaku)</label>
                            <input type="text" class="form-control" name="end" required>
                        </div>
                        <div class="form-group">
                            <label>Promo Discount Amount</label>
                            <input type="number" class="form-control" required name="discountAmount">
                        </div>
                        <div class="form-group">
                            <label>Voucher Category</label>
                            <select class="form-control" name="category" required>
                                <option></option>
                                <option value="1">Diskon</option>
                                <option value="2">Potongan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Voucher Flag</label>
                            <select class="form-control" name="flag" required>
                                <option></option>
                                <option value="1">Internal</option>
                                <option value="2">External</option>
                            </select>
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
