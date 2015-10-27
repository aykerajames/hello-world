<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> <?php echo $_SESSION['user_name']; ?></a>
                    </li>
                    <li class="active">
                        <a href="view_post.php"><i class="fa fa-fw fa-bar-chart-o"></i>View Posts </a>
                    </li>
                    <li>
                        <a href="insert_post.php"><i class="fa fa-fw fa-table"></i> Add New Post</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-edit"></i> View Comments</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-desktop"></i> Logout</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i ></i> View Post
                            </li>
                        </ol>
                    </div>
					
                </div>
                <div>
				<table width="1000" border="5" align="center">
				<tr> 
				<td colspan="10" align="center" bgcolor="yellow"><h1>View All Posts</h1></td>
				</tr>
				<tr > 
				<th align="center">Post No:</th>
				<th align="center">Post Date:</th>
				<th align="center">Post Title:</th>
				<th align="center">Post Author:</th>
				<th align="center">Post Image:</th>
				<th align="center">Post Content:</th>
				<th align="center">Delete Post</th>
				<th align="center">Edit Post</th>
				</tr>
				<tr align="center" > 
				<?php include("includes/connect.php");
				$query = "select * from posts";
				
				$run = mysql_query($query);
				
				while ($row = mysql_fetch_array($run)) {
					
					$post_id = $row['post_id'];
					$post_date = $row['post_date'];
					$post_title = $row['post_title'];
					$post_author = $row['post_author'];
					$post_image = $row['post_image'];
					$post_content = substr($row['post_content'],0,100);
					
				
				?>
				<td align="center"><?php echo $post_id ?></td>
				<td align="center"><?php echo $post_date ?></td>
				<td align="center"><?php echo $post_title ?></td>
				<td align="center"><?php echo $post_author ?></td>
				<td align="center"><img src="../images/<?php echo $post_image; ?>" width="80" height="80" ></td>
				<td align="center"><?php echo $post_content ?></td>
				<td align="center"><a href="delete.php?del=<?php echo $post_id; ?>">Delete</a></td>
				<td align="center"><a href="edit.php?edit=<?php echo $post_id; ?>">Edit</a></td>
				</tr>
				<?php } ?>
				</div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>