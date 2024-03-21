<!-- DataTables -->
<link href="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="<?php echo PLUGINS ?>datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PLUGINS ?>jqueryconfirm/jquery-confirm.min.js"></script>

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
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active">Datatable</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Event Diary</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h4 class="m-t-0 header-title">Event Diary</h4>
                        </div>
                    </div>
                    
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nama Event</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($event as $key => $prod): ?>
                                <tr>
                                    <td><?php echo $prod['title_event_diary'] ?></td> 
                                    <td>
                                    	<form action="<?php echo BASEURL.'eventdiary/updateStatus/'.$prod['id_event_diary'] ?>" method="post">
	                                    	<div class="input-group form-group	 mb-3">
	                                    		<select class="form-control" name="status" aria-describedby="button-addon2">
	                                    			<option <?php if($prod['status_event_diary'] == 1){echo "selected='selected'";} ?> value="1">Not Active</option>
	                                    			<option <?php if($prod['status_event_diary'] == 2){echo "selected='selected'";} ?> value="2">Active</option>
	                                    		</select>
												<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
											</div>
                                    	</form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- Required datatable js -->
<script src="<?php echo PLUGINS ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo PLUGINS ?>datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo PLUGINS ?>datatables/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Default Datatable
        $('#datatable').DataTable();


    });



</script>