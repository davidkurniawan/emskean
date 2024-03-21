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
                    <h4 class="page-title">Varian Produk </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Update Varian Produk</h4>
                    <form method="POST" action="<?php echo BASEURL.'jenisproduct/editOnAct' ?>">
                    	<div class="form-group">
                    		<label>Nama Jenis</label>
                    		<input type="hidden" name="idJenis" value="<?php echo $jenis['id_jenis_product'] ?>">
                    		<input type="text" class="form-control" name="namaJenis" value="<?php echo $jenis['nama_jenis_product'] ?>" required>
                    	</div>
                        <div class="form-group">
                            <label>Kode Warna</label>
                            <input type="color" class="form-control" name="kodeWarna" value="<?php echo $jenis['kode_warna'] ?>" required>
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
