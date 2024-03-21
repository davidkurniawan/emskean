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
                    <h4 class="page-title">Item Product </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Edit Item Product</h4>
                    <form method="POST" action="<?php echo BASEURL.'itemproduct/editOnAct/'.$item['product_item_id'] ?>" enctype="multipart/form-data">

                        <div class="form-group">

                            <label>Artikel</label>
                            <select class="form-control selectpicker" data-title="Pilih Artikel" data-size="4" name="artikelProd">
                            	<?php foreach ($product as $key => $prod): ?>
                            		<option <?php if ($prod['id_product'] == $item['id_product']) {
                            			echo "selected='selected'";
                            		} ?> value="<?php echo $prod['id_product'] ?>"><?php echo $prod['nama_product'] ?></option>
                            	<?php endforeach ?>
                            </select>

                        </div>



                        <div class="table-responsive">

                            <table class="table table-bordered" id="item_table">

                                <tr>
                                    <th>SKU</th>
                                    <th>Nama</th>
                                    <th>Img</th>
                                    <th>Kategori</th>
                                    <th>Qty Item</th>
                                    <th>Harga</th>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="skuItem" value="<?php echo $item['sku_item_product'] ?>" required></td>
                                    <td>
                                        <select class="form-control selectpicker" data-live-search="true" name="namaItem" required>
                                            <optgroup label="Variant">
                                            <?php foreach($variant as $key => $var){ ?>
                                                <option <?php if ($item['nama_item_product'] == $var['id_jenis_product']): ?> selected="selected" <?php endif ?> value="<?php echo $var['id_jenis_product'] ?>"><?php echo $var['nama_jenis_product'] ?></option>
                                            <?php }?>
                                            </optgroup>
                                        </select>
                                    </td>
                                    <td><input type="file" name="imgVarian" ></td>
                                    <td><select class="form-control" name="jenisItem"><option value="2">Variant</option></td>
                                    <td><input type="text" name="qtyItem" class="form-control qty_item" value="<?php echo $item['qty_item'] ?>" /></td>
                                    <td><input type="text" name="harga" class="form-control harga" value="<?php echo $item['harga'] ?>" /></td>
                                </tr>
                                </table>
                                <textarea class="form-control summernote" name="descItem"><?php echo $item['description_product_item'] ?></textarea>
                                <div align="center">
                                    <button type="submit" class="btn btn-info mt-5">Submit</button>
                                </div>

                        </div>
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
<script>

$(document).ready(function(){

 

     $(document).on('click', '.add', function(){

        var html = '';

        html += '<tr>';
        html += '<input type="hidden" value="" name="idItem">';
        html += '<td><select name="size_item[]" class="form-control selectpicker" data-title="pilih size"><option value="S">S</option><option value="M">M</option><option value="L">L</option><option value="XL">XL</option></select></td>';
        html += '<td><input type="text" name="qty_item[]" class="form-control qty_item" /></td>';

        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus"></button></td></tr>';
        $('#item_table').append(html);
        $('.selectpicker').selectpicker('refresh');

    });

 

    $(document).on('click', '.remove', function(){

        $(this).closest('tr').remove();

    });

});

</script>