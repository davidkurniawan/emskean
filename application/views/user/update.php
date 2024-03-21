<link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<!-- Bootstrap fileupload css -->
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
                    <h4 class="page-title">Update User </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Update User</h4>
                    <form method="POST" action="<?php echo BASEURL.'user/updateAct/'.$user['id_user_customer'] ?>" enctype="multipart/form-data">
                    	<div class="form-group">
                    		<label>Nama</label>
                    		<input type="text" class="form-control" name="nama" value="<?php echo $user['nama'] ?>" >
                    	</div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $user['phone'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $user['email'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $user['alamat'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" value="<?php echo $user['provinsi'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" class="form-control" name="kota" value="<?php echo $user['kota'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" value="<?php echo $user['kelurahan'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" value="<?php echo $user['kecamatan'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" class="form-control" name="kode_pos" value="<?php echo $user['kode_pos'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Poin</label>
                            <input type="text" class="form-control" name="Poin" value="<?php echo $user['poin'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>KTP NIK</label>
                            <input type="text" class="form-control" name="user_nik" value="<?php echo $user['user_nik'] ?>" >
                        </div>
                        <div class="form-group">
                            <label>Status Event</label>
                            <select class="form-control" name="event" required>
                                <option <?php if ($user['status_event'] == 1): ?> selected="selected" <?php endif ?> value="1">Aktif</option>
                                <option <?php if ($user['status_event'] == 0): ?> selected="selected" <?php endif ?> value="0">Not Aktif</option>
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
<!-- Bootstrap fileupload js -->
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>