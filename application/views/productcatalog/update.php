<link href="<?php echo PLUGINS ?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PLUGINS ?>select2/js/select2.min.js" type="text/javascript"></script>
<!-- Bootstrap fileupload css -->
<link href="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
<script src="<?php echo PLUGINS ?>bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<!--Summernote js-->
<link href="<?php echo PLUGINS ?>summernote/summernote-bs4.css" rel="stylesheet" />
<script src="<?php echo PLUGINS ?>summernote/summernote-bs4.min.js"></script>
<script src="<?php echo PLUGINS ?>bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<!-- Bootstrap fileupload js -->
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link href="<?php echo PLUGINS ?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PLUGINS ?>select2/js/select2.min.js" type="text/javascript"></script>

<style type="text/css">
    .select2-container .select2-selection--multiple .select2-selection__choice {
    background-color: #02c0ce;
    border: 1px solid transparent;
    color: #ffffff;
    border-radius: 3px;
    padding: 0 7px;
}
</style>
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
                    <h4 class="page-title">Product Katalog </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Update Product Katalog</h4>
                    <form method="POST" action="<?php echo BASEURL.'productkatalog/editOnAct/'.$productkatalog['id_product_catalog'] ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" class="form-control" name="metaTitle" value="<?php echo $productkatalog['meta_title'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea class="form-control" name="metaDesc" required><?php echo $productkatalog['meta_desc'] ?></textarea> 
                        </div>
                        <div class="form-group">
                        	<label>Katalog Name</label>
                        	<input type="text" class="form-control" required name="katalogName" value="<?php echo $productkatalog['product_catalog_name'] ?>">
                        </div>
                        <div class="form-group">
                            <?php 
                            $explodeItem = explode(',', $productkatalog['product_catalog_item']);
                             ?>
                        	<label>Katalog Item</label>
                        	<select class="select2 form-control select2-multiple" name="katalogItem[]" multiple="multiple" multiple data-placeholder="Choose ...">
                        		<?php foreach ($product as $key => $prod): ?>
                            		<option value="<?php echo $prod['id_product'] ?>" <?php foreach ($explodeItem as $keyexp => $exp): ?> <?php if($exp == $prod['id_product']) { echo 'selected="selected"';} ?> <?php endforeach ?>><?php echo $prod['nama_product'] ?>
                                    </option>
                        		<?php endforeach ?>
                        	</select>
                        </div>
                        <div class="form-group">
                        	<label>Katalog Banner</label>
                        	<div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo BASEURL.$productkatalog['product_catalog_banner'] ?>" alt="image" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <button type="button" class="btn btn-custom btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="btn-light" name="banner" />
                                    </button>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Katalog Headline</label>
                            <input type="text" class="form-control" name="headline" value="<?php echo $productkatalog['product_catalog_headline'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Katalog Desc</label>
                            <textarea class="form-control summernote" name="katalogDesc" required><?php echo $productkatalog['product_catalog_desc'] ?></textarea>
                        </div>
                        <button class="btn btn-info" type="submit">Submit</button>
                    </form>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>


<script>
    jQuery(document).ready(function(){
        $(".select2").select2();
        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false ,                // set focus to editable area after initializing summernote
            callbacks: {

                onImageUpload: function(image) {
                    uploadImage(image[0]);

                },

                onMediaDelete : function(target) {

                    deleteImage(target[0].src);

                }

            }
        });

        function uploadImage(image) {

                var data = new FormData();
                data.append("image", image);

                $.ajax({

                    url: "<?php echo BASEURL.'productkatalog/upload_image'?>",

                    cache: false,

                    contentType: false,

                    processData: false,

                    data: data,

                    type: "POST",

                    success: function(url) {

                        $('.summernote').summernote("insertImage", url);

                    },

                    error: function(data) {

                        console.log(data);

                    }

                });

            }

 

            function deleteImage(src) {

                $.ajax({

                    data: {src : src},

                    type: "POST",

                    url: "<?php echo BASEURL.'productkatalog/delete_image' ?>",

                    cache: false,

                    success: function(response) {

                        console.log(response);

                    }

                });

            }

    });
</script>