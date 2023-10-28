<?php
session_start();

include('../lib/connectdb.php');

include('../lib/get_functions.php');

date_default_timezone_set("Asia/Kolkata");


$status=$_REQUEST['status'];
$order_id=$_REQUEST['order_id'];
include('../lib/connectdb.php');
$r=$db->query("UPDATE `order` SET order_status='".$status."' WHERE order_id='".$order_id."'");	
//$update="UPDATE `order` SET order_status='".$status."' WHERE order_id='".$order_id."'";
mysql_query($r);
echo "1";
?>