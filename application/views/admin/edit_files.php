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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <!-- /.row -->

                  <div class="row">
                    <div class="col-lg-8">
<?php  if($status_error=='1'):?><div style="text-align: center; color: red; font-weight: bold; font-size: 12px;"><?php  echo $warning;?></div><?php  endif;?>
                        <form role="form" class="form-horizontal" action="<?php echo $base_url."index.php/admin/update_files" ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" id="txtid" name="txtid" value="<?php echo $file_id;?>">
							<!--<div class="form-group">
                                <label class="col-sm-2">Link</label>
								<div class="col-sm-10">
                                <input class="form-control" name="link" placeholder="Link" required>
								</div>
                            </div>-->
							<div class="form-group">
                                <label class="col-sm-2">File</label>
								<div class="col-sm-10">
                                <input type="file" name="attach">
								</div>
                            </div>
							<input type="hidden" class="form-control" name="edit_file" value="<?php echo $url;?>">
							<div class="form-group">
                                <label class="col-sm-2">Title</label>
								<div class="col-sm-10">
                                <input class="form-control" name="title" value="<?php echo $title;?>">
								</div>
                            </div>
			    <div class="form-group">
                                <label class="col-sm-2">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category">
                                        <option value="0" <?php if($category=='0') { echo 'selected';}?>>All</option>
                                        <option value="1" <?php if($category=='1') { echo 'selected';}?>>Investor Update</option>
                                        <option value="2" <?php if($category=='2') { echo 'selected';}?>>Financial Statement & Annual Report</option>
                                        <option value="3" <?php if($category=='3') { echo 'selected';}?>>Company Presentation</option>
                                    </select>
                                </div>
                            </div>	

                          <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" class="btn btn-default" value="Save">
							</div>
							
						  </div>

                        </form>

                    </div>
                    
                </div>
				<br>
                <!-- /.row -->

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

</body>

</html>
