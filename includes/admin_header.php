<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Flikr Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/sb-admin.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Flickr Admin</a>
                </div>

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                      <li>
                          <a href="../index.php"><i class="fa fa-fw fa-eye"></i> View Site</a>
                      </li>
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="upload.php"><i class="fa fa-fw fa-bar-chart-o"></i> Upload Photo</a>
                        </li>
                        <li>
                            <a href="managePhoto.php"><i class="fa fa-fw fa-table"></i> Manage Photos</a>
                        </li>
                        <li>
                            <a href="users.php"><i class="fa fa-fw fa-edit"></i> Manage Users</a>
                        </li>
                        <li>
                            <a href="comments.php"><i class="fa fa-fw fa-desktop"></i> Manage Comments</a>
                        </li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-wrench"></i> Logout</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">