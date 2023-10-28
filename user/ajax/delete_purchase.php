<?php
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

$sel="SELECT * FROM `tabl_purchase` WHERE invoice_no='".$_REQUEST['id']."'";
$qry=mysql_query($sel);
while($res=mysql_fetch_assoc($qry)){
  
   $upd="UPDATE `tabl_stock_master` SET in_stock=in_stock-'".$res['qty']."' WHERE product_id='".$res['product_id']."'";
   mysql_query($upd) or die(mysql_error());
   
   $ins="INSERT INTO `tabl_stock_temp` SET
        product_id='".$res['product_id']."',
		stock='".$res['qty']."',
		type='4',
		date_added='".$date."'";
	mysql_query($ins) or die(mysql_error());	
  
}
$delete="delete from tabl_purchase where invoice_no='".$_REQUEST['id']."'";
$qry=mysql_query($delete) or die(mysql_error());


$delete2="delete from tabl_purchase_master where invoice_no='".$_REQUEST['id']."'";
$qry2=mysql_query($delete2)or die(mysql_error());

if($qry && $qry2)
{
echo '1';	
}

?>