<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sidomuncul - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $base_url;?>sido_tools/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $base_url;?>sido_tools/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $base_url;?>sido_tools/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $base_url;?>sido_tools/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
	  function confirmDelete(id){
		 var conf = confirm('Are you sure you want to delete!');
		if(conf) 
		window.location='<?php echo $base_url."index.php/admin/delete_files/"?>'+id;
	}
	</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "header.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Files
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $base_url;?>index.php/admin">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Files
                            </li>
                        </ol>
						
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-12">
						<a href="<?php echo $base_url;?>index.php/admin/add_files" style="float:right">
								<button type="button" class="btn btn-default">Add</button>
						</a>
						
                    </div>
                </div>
				<br>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12">
					<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
					<thead>
						<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="File id: activate to sort column descending" style="width: 138px;">File id</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 219px;">Title</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Url: activate to sort column ascending" style="width: 99px;">URL</th>
						<th class="sorting" style="width: 100px;text-align:center">Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($data_files as $a) {?> 
						<tr role="row" class="odd">
							<td class="sorting_1"><?php echo $a->file_id;?></td>
							<td><?php echo $a->title;?></td>
							<td><?php echo $a->url;?></td>
							
							<td align="center" colspan="2">
								<a href="<?php echo $base_url;?>index.php/admin/edit_files/<?php echo $a->file_id;?>">
									<button type="button" class="btn btn-default">Edit</button>
								</a>
								<button type="button" class="btn btn-default" onclick="return confirmDelete('<?php echo $a->file_id?>')">Delete</button>
							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
				</div>
				</div>
				</div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo $base_url;?>sido_tools/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $base_url;?>sido_tools/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	</script>
</body>

</html>
