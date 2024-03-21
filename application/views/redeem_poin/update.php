<link href="<?php echo PLUGINS ?>summernote/summernote-bs4.css" rel="stylesheet" />
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
                    <h4 class="page-title">Update Redeem Poin User </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Update Redeem Poin User</h4>
                    <form method="POST" action="<?php echo BASEURL.'redeempoin/editOnAct/'.$item['id_redeem_poin'] ?>" enctype="multipart/form-data">
                    	<div class="form-group">
                         <label>Nama User</label>
                         <input type="text" class="form-control" name="namaUser" value="<?php echo $item['nama'] ?>" readonly>   
                        </div>
                        <div class="form-group">
                         <label>Email</label>
                         <input type="text" class="form-control" name="email" value="<?php echo $item['email'] ?>" readonly>   
                        </div>
                        <div class="form-group">
                         <label>Phone</label>
                         <input type="text" class="form-control" name="phone" value="<?php echo $item['phone'] ?>" readonly>   
                        </div>
                        <div class="form-group">
                         <label>Alamat</label>
                         <textarea class="form-control" name="alamat" readonly><?php echo $item['alamat'].', '.$item['provinsi'].', '.$item['kota'].', '.$item['kelurahan'].', '.$item['kode_pos'] ?></textarea> 
                        </div>
                        <div class="form-group">
                            <label>No Resi</label>
                            <input type="text" class="form-control" required name="noResi">
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
<script src="<?php echo PLUGINS ?>summernote/summernote-bs4.min.js"></script>

<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });

    });
</script>
