<?php 
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");
}
else {

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inserting new posts</title>

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
                    <li>
                        <a href="view_post.php"><i class="fa fa-fw fa-bar-chart-o"></i>View Posts </a>
                    </li>
                    <li class="active">
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
                            Adding New Posts
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i ></i> Add New Post
                            </li>
                        </ol>
                    </div>
					
                </div>
                <div>
				<form method="post" action="insert_post.php" enctype="multipart/form-data">
<table width="600" align="center" border="10">
<tr>
<td align="center" bgcolor="yellow" colspan="6"><h1>Insert New Post Here</h1></td>
</tr>
<tr>
<td align="right">Post Title:</td>
<td><input type="text" name="title" size="30"></td>
</tr>
<td align="right">Post Author:</td>
<td><input type="text" name="author" size="30"></td>
</tr>
<td align="right">Post Keywords:</td>
<td><input type="text" name="keywords" size="30"></td>
</tr>
<td align="right">Post Image:</td>
<td><input type="file"  name="image" size="30"></td>
</tr>
<td align="right">Post Content:</td>
<td><textarea name="content" cols="30" rows="15"> </textarea></td>
</tr>
<td align="center" colspan="6"><input type="submit" name="submit" value="Publish Now"></td>
</tr>
</table>
</form>
				
				
				
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


<?php
include("includes/connect.php");

if(isset($_POST['submit']))

{
	 $post_title = $_POST['title'];
	 $post_date = date('m-d-y');
	 $post_author = $_POST['author'];
	 $post_keywords = $_POST['keywords'];
	 $post_content = $_POST['content'];
	 $post_image = $_FILES['image']['name'];
	 $image_tmp = $_FILES['image']['tmp_name'];
	if($post_title=='' or $post_keywords=='' or $post_content=='' or $post_author=='') {
		
		echo "<script>alert('Any of the fields is empty')</script>";
		exit();
	}
		else {
			move_uploaded_file($image_tmp,"../images/$post_image");
			$insert_query ="insert into posts (post_title, post_date, post_author, post_image, post_keywords, post_content) values ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$post_content')";
			if(mysql_query($insert_query)){
				echo "<script>alert('Post Published Successfully!')</script>";
				
			}
		}
	}

?>


<?php } ?>