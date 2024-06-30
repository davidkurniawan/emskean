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
                    <h4 class="page-title">Jenis Product </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Tambah Banner </h4>
                    <form method="POST" action="<?php echo BASEURL.'banner/editOnAct/'.$item['id_banner'] ?>" enctype="multipart/form-data">
                    	<div class="form-group">
                    		<label>Title</label>
                    		<input type="hidden" name="idJenis" value="<?php echo $item['id_banner'] ?>">
                    		<input type="text" class="form-control" name="title" value="<?php echo $item['title'] ?>" required>
                    	</div>
                        <div class="form-group">
                            <label>Link Banner</label>
                            <input type="text" class="form-control" name="link" value="<?php echo $item['link'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" ><?php echo $item['description'] ?></textarea> 
                        </div>
                        <div class="form-group">
                            <label>Page</label>
                            <select class="form-control" name="page" required>
                                <?php foreach ($category as $key => $cat): ?>
                                    <option value="<?php echo $cat['id_banner_category'] ?>" <?php if ($cat['id_banner_category'] == $item['id_banner_category']): ?>
                                        selected='selected'
                                    <?php endif ?>><?php echo $cat['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Image Upload</label>
                            <div class="col-9">
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
<!-- Bootstrap fileupload js -->
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>