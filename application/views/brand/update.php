<link href="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />

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
                    <h4 class="page-title">Table Account Brand </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20" >Tambah Account Brand</h4>
                    <form method="POST" action="<?php echo BASEURL.'brand/editOnAct/'.$acc['id_administrator'] ?>" enctype="multipart/form-data">
                    	<div class="form-group">
                    		<label>Brand Name</label>
                    		<input type="text" class="form-control" value="<?php echo $acc['brand_name'] ?>" required name="brand">
                    	</div>
                    	<div class="form-group">
                    		<label>Nama Lengkap</label>
                    		<input type="text" class="form-control" name="nama" value="<?php echo $acc['nama'] ?>" required>
                    	</div>
                    	<div class="form-group">
                    		<label>Email</label>
                    		<input type="email" class="form-control" required value="<?php echo $acc['email'] ?>" name="email">
                    	</div>
                    	<div class="form-group">
                    		<label>Password</label>
                    		<input type="password" class="form-control" name="password">
                    	</div>
                    	<div class="form-group">
                    		<label>No Telephone</label>
                    		<input type="text" class="form-control" required value="<?php echo $acc['no_telepon'] ?>" name="phone">
                    	</div>
                    	<div class="form-group">
                    		<label>Provinsi</label>
                    		<input type="text" class="form-control" required value="<?php echo $acc['provinsi'] ?>" name="provinsi">
                    	</div>
                    	<div class="form-group">
                    		<label>Kota</label>
                    		<input type="text" class="form-control" required value="<?php echo $acc['kota'] ?>" name="kota">
                    	</div>
                    	<div class="form-group">
                    		<label>Alamat Lengkap</label>
                    		<textarea class="form-control" name="alamat"><?php echo $acc['alamat_lengkap'] ?></textarea>
                    	</div>
                    	<div class="form-group">
                    		<label>Kode Pos</label>
                    		<input type="text" class="form-control" required value="<?php echo $acc['kode_pos'] ?>" name="kodePos">
                    	</div>
                    	<div class="form-group">
                    		<div class="form-group">
                                <label>Image/Logo/Avatar</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">
                                        <img src="<?php echo BASEURL.$acc['image'] ?>" alt="image" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <button type="button" class="btn btn-custom btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" class="btn-light" name="image"/>
                                        </button>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                    	</div>
                    	<button class="btn btn-info" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>
