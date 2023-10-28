<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

$ins2="DELETE FROM `tabl_sale` WHERE id='".$_REQUEST['id']."'";
mysql_query($ins2) or die(mysql_error());

$stock="UPDATE `tabl_stock_master` SET out_stock=out_stock-'".$_REQUEST['qty']."' WHERE product_id='".$_REQUEST['p_id']."'";
mysql_query($stock) or die(mysql_error());


$ins="INSERT INTO `tabl_stock_temp` SET 
			product_id='".$_REQUEST['p_id']."',
			stock='".mysql_real_escape_string($_REQUEST['qty'])."',
			type='3',
			date_added='".$date."'";
			
mysql_query($ins)or die(mysql_error());
echo "1";	
	
?>