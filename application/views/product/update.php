<!-- Bootstrap fileupload css -->
 <link href="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />

 <!-- Dropzone css -->
<link href="<?php echo PLUGINS ?>dropzone/dropzone.css" rel="stylesheet" type="text/css" /> 
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
                    <h4 class="page-title">Form Advanced</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!-- Bootstrap-select -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Update Product</h4>
                    	<form action="<?php echo BASEURL.'product/editOnAction' ?>" enctype="multipart/form-data" method="POST">
                    		<div class="row">
                    			<div class="col-6">
		                    		<div class="form-group">
		                    			<label>Nama Produk</label>
                                        <input type="hidden" value="<?php echo $dataProd['id_product'] ?>" name="id_product">
		                    			<input type="text" class="form-control" name="namaProduct" value="<?php echo $dataProd['nama_product'] ?>" required>
		                    		</div>
		                    		
		                    		<div class="form-group">
		                    			<label>Gender Pakaian</label>
		                    			<select class="form-control selectpicker" name="genderPakaian" required>
		                    				<option <?php if ("men" == $dataProd['gender_product']) {
                                                    echo "selected='selected'";
                                                } ?> value="men">MEN</option>
		                    				<option <?php if ("women" == $dataProd['gender_product']) {
                                                    echo "selected='selected'";
                                                } ?> value="women">WOMEN</option>
		                    			</select>
		                    		</div>
                                    <div class="form-group">
                                        <label>Kategori Produk</label>
                                        <select class="form-control" name="kategoriProduk" id="kategoriProduk" required>
                                            <option value="">Piih Kategori</option>
                                            <?php foreach ($kategori as $key => $kat): ?>
                                                <option <?php if($dataProd['id_product_category'] == $kat['id_product_category']){echo "selected='selected'";} ?> value="<?php echo $kat['id_product_category'] ?>"><?php echo strtoupper($kat['name']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Sub Produk</label>
                                        <select class="form-control" name="subkategoriProduk" id="subkategoriProduk" required>
                                            <?php foreach ($subkategori as $key => $subkat): ?>
                                                <option value="<?php echo $subkat['id_productsub_category'] ?>"><?php echo strtoupper($subkat['name']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Produk</label>
                                        <select class="form-control" name="status" required>
                                            <option value="0" <?php if ($dataProd['status_product'] == 0) { echo "selected='selected'"; } ?>>Publish</option>
                                            <option value="1" <?php if ($dataProd['status_product'] == 1) { echo "selected='selected'"; } ?>>Hold</option>
                                            <option value="2" <?php if ($dataProd['status_product'] == 2) { echo "selected='selected'"; } ?>>Hide</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Featured</label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">
                                                <img src="<?php echo BASEURL.$dataProd['product_image_front'] ?>" alt="image" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <button type="button" class="btn btn-custom btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="btn-light" name="imgFileFront"/>
                                                </button>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                    			</div>
                    			<div class="col-6">
                                    <div class="form-group">
                                        <label>Diskon Produk</label>
                                        <input type="number" class="form-control" name="diskon" value="<?php echo $dataProd['diskon'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="harga" value="<?php echo $dataProd['harga'] ?>" required>
                                    </div>
                    				<div class="form-group">
                    					<label>Deksripsi</label>
                    					<textarea class="form-control summernote" name="deskripsi"  required><?php echo $dataProd['deskripsi_product'] ?></textarea>
                    				</div>
                                    
                    			</div>
                    			<div class="col-sm-12">
                    				<div class="table-responsive">
			                            <table class="table table-bordered" id="item_table">
		                                <tr>
		                                    <th>IMAGES</th>
		                                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fa fa-plus"></i></button></th>
		                                </tr>
                                            <?php foreach ($image as $key => $img): ?>
                                                <tr>
                                                    <td>
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">
                                                                '<img src="<?php echo BASEURL.$img['source_image_product'] ?>" alt="image" />
                                                            </div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                            <div>
                                                                <button type="button" class="btn btn-custom btn-file">
                                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" class="btn-light" name="imgProd[]"/>
                                                                    <input type="hidden" name="id_image_product[]" value="<?php echo $img['id_image_product'] ?>">
                                                                </button>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><button type="button" name="remove" data-id="<?php echo $img['id_image_product'] ?>" class="btn btn-danger btn-sm remove"><i class="fa fa-minus"></button></td>
                                                </tr>
                                            <?php endforeach ?>
		                                </table>

			                        </div>
                    				<button class="btn btn-info" type="submit">SUBMIT</button>
                    			</div>
                    		</div>
                    	</form>
                </div>
                <!-- ed card-box -->
            </div> <!-- end col -->

            <div class="col-sm-12">
                <div class="card-box">
                    <div class="">
                        <h4 class="m-t-0 header-title">Tambah Item Product</h4>
                    </div>
                    <form method="POST" action="<?php echo BASEURL.'product/itemproductTambah' ?>" class="" enctype="multipart/form-data">
                        <input type="hidden" name="id_product" value="<?php echo $dataProd['id_product'] ?>">
                        <div class="append-itemprod">
                            <table class="table table-bordered" id="item_product">
                                <tr>
                                    <th>Form</th>
                                    <th>
                                        <button type="button" name="add" class="btn btn-success btn-sm additem" style="float:right;"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                                <?php foreach ($productItem as $key => $prodItem): ?>
                                <input type="hidden" name="product_item_id[]" value="<?php echo $prodItem['product_item_id'] ?>">
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="form-group col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>*SKU</label>
                                                    <input type="text" class="form-control " name="sku[]" value="<?php echo $prodItem['sku'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*NAME COLOR</label>
                                                    <input type="text" class="form-control " name="nameColor[]" value="<?php echo $prodItem['name_color'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*COLOR</label>
                                                    <input type="text" class="form-control " name="color[]" value="<?php echo $prodItem['color'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*SIZE</label>
                                                    <input type="text" class="form-control" name="size[]" value="<?php echo $prodItem['size'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>QTY ITEM</label>
                                                    <input type="number" class="form-control" name="qty[]" value="<?php echo $prodItem['qty_item'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>*HARGA</label>
                                                    <input type="number" class="form-control" name="harga[]" value="<?php echo $prodItem['harga'] ?>" required>
                                                </div>
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">
                                                        <img src="<?php echo BASEURL.$prodItem['source_image_product'] ?>" alt="image" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <button type="button" class="btn btn-custom btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" class="btn-light" name="imgProd[]"/>
                                                        </button>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" name="remove" data-id="<?php echo $prodItem['product_item_id'] ?>" class="btn btn-danger btn-sm remove-additem"><i class="fa fa-minus"></button>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-info">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script src="<?php echo PLUGINS ?>bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<!--Wysiwig js-->
<script src="<?php echo PLUGINS ?>summernote/summernote-bs4.min.js"></script>
<!-- Bootstrap fileupload js -->
<script src="<?php echo PLUGINS ?>bootstrap-fileupload/bootstrap-fileupload.js"></script>

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
        $('#kategoriProduk').change(function () {
            var idprod = $(this).find('option:selected').val();
            $.post( "<?php echo BASEURL.'product/getsubproduct' ?>", { idprod:idprod }).done(function( data ) {
                $('#subkategoriProduk').html(data);
            });
        });

    });
</script>

<script>

$(document).ready(function(){

     $(document).on('click', '.add', function(){
        var html = '';
        html += '<tr>';
        html += '<td><div class="fileupload fileupload-new" data-provides="fileupload">'+
                    '<div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">'+
                        '<img src="<?php echo ASSETS ?>images/small/img-1.jpg" alt="image" />'+
                    '</div>'+
                    '<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>'+
                    '<div>'+
                        '<button type="button" class="btn btn-custom btn-file">'+
                            '<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>'+
                            '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'+
                            '<input type="file" class="btn-light" name="imgProd[]"/>'+
                        '</button>'+
                        '<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>'+
                    '</div>'+
                '</div></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus"></button></td></tr>';
        $('#item_table').append(html);
    });

    $(document).on('click', '.additem', function(){
        var html = '';
        html += '<tr>';
        html += '<td>'+
                    '<div class="row">'+
                        '<div class="form-group col-12 col-lg-6">'+
                            '<div class="form-group">'+
                                '<label>*SKU</label>'+
                                '<input type="text" class="form-control " name="sku[]" required>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label>*NAME COLOR</label>'+
                                '<input type="text" class="form-control " name="nameColor[]" required>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label>*COLOR</label>'+
                                '<input type="text" class="form-control " name="color[]" required>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label>*SIZE</label>'+
                                '<input type="text" class="form-control" name="size[]" required>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-12 col-lg-6">'+
                            '<div class="form-group">'+
                                '<label>QTY ITEM</label>'+
                                '<input type="number" class="form-control" name="qty[]" required>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label>*HARGA</label>'+
                                '<input type="number" class="form-control" name="harga[]" required>'+
                            '</div>'+
                            '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                '<div class="fileupload-new thumbnail" style="width: 500px; height: 150px;">'+
                                    '<img src="<?php echo ASSETS ?>images/small/img-1.jpg" alt="image" />'+
                                '</div>'+
                                '<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>'+
                                '<div>'+
                                    '<button type="button" class="btn btn-custom btn-file">'+
                                        '<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>'+
                                        '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'+
                                        '<input type="file" class="btn-light" name="imgProd[]"/>'+
                                    '</button>'+
                                    '<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<button type="button" name="remove" class="btn btn-danger btn-sm remove-additem"><i class="fa fa-minus"></button>'+
                '</td>';
        $('#item_product').append(html);
    });

    $(document).on('click', '.remove', function(){
        var confirmText = "Yakin Mau Di Hapus?";
        if(confirm(confirmText)) {
        $(this).closest('tr').remove();
        var id = $(this).data('id');
            $.post( "<?php echo BASEURL.'product/deleteImage' ?>", { id_delete: id }).done(function( data ) {
                console.log( "Data Loaded: " + data );
              });
        }
    });

    $(document).on('click', '.remove-additem', function(){
        var confirmText = "Yakin Mau Di Hapus?";
        if(confirm(confirmText)) {
        $(this).closest('tr').remove();
        var id = $(this).data('id');
            $.post( "<?php echo BASEURL.'product/deleteItemProd' ?>", { id_delete: id }).done(function( data ) {
                console.log( "Data Loaded: " + data );
              });
        }
    });

});

</script>