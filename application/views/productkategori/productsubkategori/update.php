<link href="<?php echo PLUGINS ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

<div class="wrapper">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Update Product Kategori</h4>

                    <form method="POST" action="<?php echo BASEURL.'productsubkategori/editOnAct/'.$sub['id_productsub_category'] ?>">
                    	<div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <?php foreach ($kategori as $key => $kat): ?>
                                    <option <?php if($kat['id_product_category'] == $sub['id_product_category']){ echo "selected='selected'";} ?> value="<?php echo $kat['id_product_category'] ?>"><?php echo $kat['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Sub Kategori</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $sub['name'] ?>" required>
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
