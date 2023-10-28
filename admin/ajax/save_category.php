<?php 
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('y-m-d');
$res=dbQuery("insert into tabl_category set name='".$_REQUEST['cat_name']."',date_added='".$date."'");
echo '1';
?>

