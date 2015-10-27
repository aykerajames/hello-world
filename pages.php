<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dynamic Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div><?php include("includes/navbar.php"); ?></div>
<div><?php include("includes/header.php"); ?></div>


<div id="main_content">
<article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php
include("includes/connect.php");

if(isset($_GET['id'])){
	
$page_id = $_GET['id'];

$select_query ="select * from posts where post_id='$page_id'";

$run_query = mysql_query($select_query);

while($row = mysql_fetch_array($run_query)){
	
	$post_id = $row['post_id'];
	$post_title = $row['post_title'];
	$post_date = $row['post_date'];
	$post_author = $row['post_author'];
	$post_image = $row['post_image'];
	$post_content = $row['post_content'];
	


?>

<h2 align="left">
<a href="pages.php?id=<?php echo $post_id; ?>">
<?php echo $post_title; ?>
</a>
</h2>
<p align="left">Published on:<b><?php echo $post_date; ?></b></p>
<p align="left">Posted by:<b><?php echo $post_author; ?></b></p>

<center><img src="images/<?php echo $post_image; ?>" width="500" height="300" ></center>

<p align="justify"><?php echo $post_content; ?></p>


<?php } }?>
                </div>
            </div>
        </div>
    </article>


</div>

<div><?php include("includes/footer.php"); ?></div>

</body>
</html>