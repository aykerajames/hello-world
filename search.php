<html>
<head>
<title>Welcome to Dynamicms </title>
<link rel="stylesheet" href="style.css" media="all">
</head>
<body>
<div><?php include("includes/header.php"); ?></div>
<div><?php include("includes/navbar.php"); ?></div>

<div id="main_content">
<h2 align="center">Search Results</h2>
<?php
include("includes/connect.php");

if(isset($_GET['search'])){
	
	$search_id =$_GET['value'];
	
	$search_query = "select * from posts where post_keywords like '%$search_id%'";
	
	$run_query = mysql_query($search_query);
	
	while ($search_row = mysql_fetch_array($run_query)) {
		
		$post_id = $search_row['post_id'];
		$post_title = $search_row['post_title'];
	    $post_image = $search_row['post_image'];
	    $post_content = substr ($search_row['post_content'],0,150);
	

?>
<center>
<a href="pages.php?id=<?php echo $post_id;?>">
<?php echo $post_title; ?>
</a>
<img src="images/<?php echo $post_image; ?>">

<p><?php echo $post_content; ?></p>
<?php } } ?>
</center>
</div>
<div><?php include("includes/footer.php"); ?></div>





</body>
</html>