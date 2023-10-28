<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

$ins2="INSERT INTO `tabl_sale` SET
			order_id='".$_REQUEST['order_id']."',
			shop_id='".$_REQUEST['sale_id']."',
			product_id='".$_REQUEST['product_id']."',
			qty='".mysql_escape_string($_REQUEST['qty'])."',
			total='".mysql_escape_string($_REQUEST['payout'])."',
			date_added='".$date."'";
	mysql_query($ins2) or die(mysql_error());
 $stock="UPDATE `tabl_stock_master` SET out_stock=out_stock+'".$_REQUEST['qty']."' WHERE product_id='".$_REQUEST['product_id']."'";
mysql_query($stock) or die(mysql_error());
$ins="INSERT INTO `tabl_stock_temp` SET 
			product_id='".$_REQUEST['product_id']."',
			stock='".mysql_escape_string($_REQUEST['qty'])."',
			type='2',
			date_added='".$date."'";
mysql_query($ins)or die(mysql_error());
echo "1";	
	
?>