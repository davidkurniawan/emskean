<link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

<link href="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>

 <!-- Dropzone css -->
<link href="<?php echo PLUGINS ?>dropzone/dropzone.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo PLUGINS ?>summernote/summernote-bs4.css" rel="stylesheet" />

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

                    <form method="POST" action="<?php echo BASEURL.'pemasaran/produkpoin/editOnAct/'.$produkpoin['id_produk_poin'] ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Produk Title Poin</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $produkpoin['produk_poin_title'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">
                                    <img src="<?php echo BASEURL.$produkpoin['image'] ?>" alt="image" />
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
                        <div class="form-group">
                            <label>Value Discount Amount</label>
                            <input type="number" class="form-control" name="value" value="<?php echo $produkpoin['diskon'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Poin Amount</label>
                            <input type="number" class="form-control" required name="poin" value="<?php echo $produkpoin['poin'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control summernote" name="desc"><?php echo $produkpoin['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="discount" <?php if($produkpoin['status_poin'] == "discount"){echo "selected='selected'";} ?>>Discount</option>
                                <option value="produk" <?php if($produkpoin['status_poin'] == "produk"){echo "selected='selected'";} ?>>Produk</option>
                                <option value="item" <?php if($produkpoin['status_poin'] == "item"){echo "selected='selected'";} ?>>Item</option>
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
<!--Wysiwig js-->
<script src="<?php echo PLUGINS ?>summernote/summernote-bs4.min.js"></script>
<!-- Dropzone js -->
<script src="<?php echo PLUGINS ?>dropzone/dropzone.js"></script>

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