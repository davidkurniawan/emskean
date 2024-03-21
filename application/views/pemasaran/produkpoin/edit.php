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
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>Value Discount Amount</label>
                            <input type="number" class="form-control" name="value" value="<?php echo $produkpoin['value'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Poin Amount</label>
                            <input type="number" class="form-control" required name="poin" value="<?php echo $produkpoin['poin'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc"><?php echo $produkpoin['description'] ?></textarea>
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
