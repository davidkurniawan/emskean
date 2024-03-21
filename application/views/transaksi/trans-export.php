<!-- DataTables -->
<link href="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?php echo PLUGINS ?>datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.js"></script>
<link href="<?php echo PLUGINS ?>bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                            <li class="breadcrumb-item active">Table</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Export </h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12">
               
                <div class="card-box">
                    <form action="<?php echo BASEURL.'transexport/getDataExport' ?>" method="POST">
                        
                    <div class="row mb-2" >
                        <div class="col-lg-6">
                             <div class="form-group">
                                <label>Date Range</label>
                                <div>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" class="form-control" name="start" placeholder="Date Start" required />
                                        <input type="text" class="form-control" name="end" placeholder="Date End" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Cabang</label>
                                <select class="form-control" name="cabang" required>
                                    <?php foreach ($cabang as $key => $value): ?>
                                    <option value="<?php echo $value['id_administrator'] ?>"><?php echo $value['email'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    
                    </form>
                    

                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<script src="<?php echo PLUGINS ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo PLUGINS ?>bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- end wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable();
        $('#date-range').datepicker({
            toggleActive: true,
        });
    });
</script>