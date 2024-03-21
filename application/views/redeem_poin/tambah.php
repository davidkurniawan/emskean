<link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
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
                    <h4 class="page-title">Media Social </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Tambah Media Social</h4>
                    <form method="POST" action="<?php echo BASEURL.'mediasocialpost/tambahOnAct' ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" class="form-control" name="url" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required>
                                <option value="instagram">Instagram</option>
                                <option value="tiktok">Tiktok</option>
                                <option value="youtube">Youtube</option>
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
