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
                    <h4 class="page-title">Tag Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Tambah Tag Product</h4>
                    <form method="POST" action="<?php echo BASEURL.'tag/tambahOnAct' ?>">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="item_table">
                            <tr>
                                <th>Tag Product</th>
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
     $(document).on('click', '.add', function(){

        var html = '';

        html += '<tr>';

        html += '<td><input type="text" class="form-control" name="tagProd[]" placeholder="Tag For Product" required></td>';

        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus"></button></td></tr>';
        $('#item_table').append(html);

    });

    $(document).on('click', '.remove', function(){

        $(this).closest('tr').remove();

    });
});

</script>