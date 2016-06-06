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
                            Change password
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo $base_url;?>index.php/admin">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Change password
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                  <div class="row">
                    <div class="col-lg-8">

                        <form role="form" class="form-horizontal" action="<?php echo $base_url."index.php/admin/change_password" ?>" method="post">
							<input type="hidden" id="txtid" name="txtid" value="<?php echo $user_id;?>">
                            <div class="form-group">
                                <label class="col-sm-2">Email</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" name="email" disabled>
								</div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-2">Password</label>
								<div class="col-sm-10">
                                <input type="password" class="form-control" name="password" value="<?php echo $password ?>">
								</div>
                            </div>


                          <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" class="btn btn-default" value="Save">
								<button type="reset" class="btn btn-default">Reset</button>
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
