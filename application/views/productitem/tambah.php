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
                    <h4 class="page-title">Item Product </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Tambah Item Product</h4>
                    <form method="POST" action="<?php echo BASEURL.'itemproduct/tambahOnAct' ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Product</label>
                            <select class="form-control selectpicker" data-live-search="true" required name="artikelProd">
                            	<option>Select Product</option>
                            	<?php foreach ($product as $key => $prod): ?>
                            		<option value="<?php echo $prod['id_product'] ?>"><?php echo $prod['nama_product'] ?></option>
                            	<?php endforeach ?>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="item_table">
                                <tr>
                                    <th>*SKU</th>
                                    <th>*Varian</th>
                                    <th>*Img</th>
                                    <th>*Kategori</th>
                                    <th>*Qty Item</th>
                                    <th>*Harga</th>
                                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fa fa-plus"></i></button></th>
                                </tr>
                            </table>
                            <div align="center">
                                <button type="submit" class="btn btn-info">Submit</button>
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
<script>

$(document).ready(function(){
        $('.selectpicker').selectpicker();

 
	$('.selectpicker').selectpicker();
     $(document).on('click', '.add', function(){

        var html = '';

        html += '<tr>';
        html += '<td><input type="text" class="form-control" name="skuItem[]" required></td>';
        html += '<td><select class="form-control selectpicker" data-live-search="true" name="namaItem[]" required>';
        html += '<optgroup label="Variant">';
        <?php foreach($variant as $key => $var){ ?>
            html += '<option value="<?php echo $var['id_jenis_product'] ?>"><?php echo $var['nama_jenis_product'] ?></option>';
        <?php }?>
        html += '</optgroup>';
        html += '</select></td>';

        html += '<td><input type="file" name="imgVarian[]" required></td>';
        html += '<td><select class="form-control" name="jenisItem[]"><option value="2">Variant</option></td>';
        html += '<td><input type="text" name="qtyItem[]" class="form-control qty_item" /></td>';
        html += '<td><input type="text" name="harga[]" class="form-control harga" /></td>';

        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus"></button></td></tr>';
        $('#item_table').append(html);
        $('.selectpicker').selectpicker('refresh');

    });

 

    $(document).on('click', '.remove', function(){

        $(this).closest('tr').remove();

    });

});

</script>