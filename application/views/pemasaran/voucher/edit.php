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

                    <form method="POST" action="<?php echo BASEURL.'pemasaran/voucher/editOnAct/'.$voucher['id_voucher'] ?>">
                    	<div class="form-group">
                            <label>Title Voucher</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $voucher['voucher_title'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Voucher</label>
                            <textarea class="form-control" name="desc"><?php echo $voucher['voucher_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Syarat Dan Ketentuan</label>
                            <textarea class="form-control" name="sk"><?php echo $voucher['voucher_sk'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kode Voucher</label>
                            <input type="text" class="form-control" name="namaPromo" value="<?php echo $voucher['voucher_code'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Start Date (Masa Berlaku)</label>
                            <input type="datetime-local" class="form-control" name="start" value="<?php echo $voucher['start_date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>End Date (Masa Berlaku)</label>
                            <input type="datetime-local" class="form-control" name="end" value="<?php echo $voucher['end_date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Promo Discount Amount</label>
                            <input type="number" class="form-control" value="<?php echo $voucher['voucher_value'] ?>" required name="discountAmount">
                        </div>
                        <div class="form-group">
                            <label>Voucher Category</label>
                            <select class="form-control" name="category" required>
                                <option>Pilih Voucher Category</option>
                                <option <?php if ($voucher['voucher_category'] == 1) { echo "selected='selected'";} ?> value="1">Diskon</option>
                                <option <?php if ($voucher['voucher_category'] == 2) { echo "selected='selected'";} ?> value="2">Potongan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Voucher Flag</label>
                            <select class="form-control" name="flag" required>
                                <option>Pilih Voucher Flag</option>
                                <option <?php if ($voucher['voucher_category'] == 1) { echo "selected='selected'";} ?> value="1">Internal</option>
                                <option <?php if ($voucher['voucher_category'] == 2) { echo "selected='selected'";} ?> value="2">External</option>
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
