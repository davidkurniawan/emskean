<link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="<?php echo PLUGINS ?>summernote/summernote-bs4.css" rel="stylesheet" />
<link href="<?php echo PLUGINS ?>bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
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
                    <h4 class="page-title">Diary News </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Update Diary News</h4>
                    <form method="POST" action="<?php echo BASEURL.'beautytips/editOnAct/'.$item['id_beautytips'] ?>" enctype="multipart/form-data">
                    	<div class="form-group">
                    		<label>Title</label>
                    		<input type="hidden" name="idJenis" value="<?php echo $item['id_beautytips'] ?>">
                    		<input type="text" class="form-control" name="title" value="<?php echo $item['title'] ?>" required>
                    	</div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control summernote" name="description" required><?php echo $item['description'] ?></textarea> 
                        </div>
                        <div class="form-group row">
                        <label class="col-2 col-form-label">*Image Upload</label>
                            <div class="col-10">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="<?php echo BASEURL.$item['image'] ?>" alt="image" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <button type="button" class="btn btn-custom btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" class="btn-light" name="image" />
                                        </button>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                                <div class="alert alert-info"><strong>Notice!</strong> Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead.</div>
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

<script src="<?php echo PLUGINS ?>bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<!--Summernote js-->
<script src="<?php echo PLUGINS ?>summernote/summernote-bs4.min.js"></script>
<script src="<?php echo PLUGINS ?>bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<!-- Bootstrap fileupload js -->
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,                 // set focus to editable area after initializing summernote
            callbacks: {

                onImageUpload: function(image) {
                    uploadImage(image[0]);

                },

                onMediaDelete : function(target) {

                    deleteImage(target[0].src);

                }

            }
        });

        $('.inline-editor').summernote({
            airMode: true
        });

        function uploadImage(image) {

                var data = new FormData();

                data.append("image", image);

                $.ajax({

                    url: "<?php echo BASEURL.'beautytips/upload_image'?>",

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

                    url: "<?php echo BASEURL.'beautytips/delete_image' ?>",

                    cache: false,

                    success: function(response) {

                        console.log(response);

                    }

                });

            }
    });
</script>