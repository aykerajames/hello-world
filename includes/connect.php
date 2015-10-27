<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = 'dynamicms';

mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die("Couldn't Connect") ;
mysql_select_db($mysql_db);

?>