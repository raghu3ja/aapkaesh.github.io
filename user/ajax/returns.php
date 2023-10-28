<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');


if($_REQUEST['stock_type']==2){
	
$ins="INSERT INTO `tabl_defected` SET 
					order_id='".$_REQUEST['order_id']."',
					product_id='".$_REQUEST['product_id']."',
					qty='".$_REQUEST['qty']."',
					date_added='".$date."'";
mysql_query($ins) or die(mysql_error());
			

$upd="UPDATE `tabl_sale` SET
			`return`='1',defected='1' WHERE id='".$_REQUEST['id']."'";
mysql_query($upd) or die(mysql_error());

$sel="SELECT * FROM `tabl_defected_stock` WHERE product_id='".$_REQUEST['product_id']."'";
$qry=mysql_query($sel);
$num_rows=mysql_num_rows($qry);
	if($num_rows>0){
		$upd1="UPDATE `tabl_defected_stock` SET in_stock=in_stock +'".$_REQUEST['qty']."'";
		mysql_query($upd1)or die(mysql_error());
	}else{
		$ins1="INSERT INTO `tabl_defected_stock` SET 
		in_stock='".$_REQUEST['qty']."',product_id='".$_REQUEST['qty']."'";
		mysql_query($ins1)or die(mysql_error());
	}
}else{
	
	$upd="UPDATE `tabl_sale` SET
			`return`='1' WHERE id='".$_REQUEST['id']."'";
mysql_query($upd) or die(mysql_error());

$stock="UPDATE `tabl_stock_master` SET out_stock=out_stock+'".$_REQUEST['qty']."' WHERE product_id='".$_REQUEST['product_id']."'";
mysql_query($stock) or die(mysql_error());
$ins="INSERT INTO `tabl_stock_temp` SET 
			product_id='".$_REQUEST['product_id']."',
			stock='".mysql_real_escape_string($_REQUEST['qty'])."',
			type='4',
			date_added='".$date."'";
mysql_query($ins)or die(mysql_error());
	}
echo "1";	
	
?>