<?php
include('../lib/db_connection.php');

$sel="SELECT * FROM `tabl_purchase` WHERE invoice_no='".$_REQUEST['invoice_no']."'";
  $qry=mysql_query($sel);
		while($res=mysql_fetch_assoc($qry)){
	if($_REQUEST['payment_type']==2){		
$upd="UPDATE `tabl_purchase` SET 
      payment_type='1',
	  paid='".$res['total']."' WHERE id='".$res['id']."'";
mysql_query($upd) or die(mysql_error());	
	   }else{
$upd="UPDATE `tabl_purchase` SET 
      payment_type='2',
	  paid='0' WHERE id='".$res['id']."'";
mysql_query($upd) or die(mysql_error());   
		 }
}
if($_REQUEST['payment_type']==2){
$upd1="UPDATE `tabl_purchase_master` SET 
      payment_type='1',
	  paid='".$_REQUEST['total']."' WHERE invoice_no='".$_REQUEST['invoice_no']."'";
mysql_query($upd1) or die(mysql_error());
				}else{ 
$upd1="UPDATE `tabl_purchase_master` SET 
	 payment_type='2',
	 paid='0' WHERE invoice_no='".$_REQUEST['invoice_no']."'";
mysql_query($upd1) or die(mysql_error()); 		
  }
echo "1";

?>