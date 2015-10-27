<div class="container" id="main_content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <?php
include("includes/connect.php");

$select_post = "select * from posts order by rand() LIMIT 0,4";

$run_posts = mysql_query($select_post);

while($row = mysql_fetch_array($run_posts)){
	
	$post_id = $row['post_id'];
	$post_title = $row['post_title'];
	$post_date = $row['post_date'];
	$post_author = $row['post_author'];
	$post_image = $row['post_image'];
	$post_content = substr ($row['post_content'],0,200);
	


?>

<h2 align="left">
<a href="pages.php?id=<?php echo $post_id; ?>">
<?php echo $post_title; ?>
</a>
</h2>
<p align="left">Published on:<b><?php echo $post_date; ?></b></p>
<p align="left">Posted by:<b><?php echo $post_author; ?></b></p>

<center><img src="images/<?php echo $post_image; ?>" width="500" height="300" </center>

<p align="justify"><?php echo $post_content; ?></p>

<p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>
<?php } ?>
                </div>
               <hr>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>