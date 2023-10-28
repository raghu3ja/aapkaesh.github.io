<?php
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

$paid2="UPDATE `tabl_purchase_master` SET paid=paid +'".$_REQUEST['amount']."' WHERE invoice_no='".$_REQUEST['invoice']."'";
$qry2=mysql_query($paid2) or die(mysql_error());

$ins_pay_summ="INSERT INTO `tabl_pay_summary` SET 
						invoice='".$_REQUEST['invoice']."',
						amount='".$_REQUEST['amount']."',
						type='2',
						date_added='".$date."',
						description='Paid Payment'";
$qry3=mysql_query($ins_pay_summ) or die(mysql_error());


if($qry2 && $qry3)
{
echo '1';	
}

?>