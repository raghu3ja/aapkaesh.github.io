<?php 
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('y-m-d');

$ins=dbQuery("INSERT INTO tabl_wallet_detail SET c_id='".$_REQUEST['c_id']."',amount='".$_REQUEST['amount']."',detail='".$_REQUEST['detail']."',type='A',date_added='".$date."'");

$upd=dbQuery("update tabl_wallet set in_amount=in_amount+'".$_REQUEST['amount']."' WHERE  c_id='".$_REQUEST['c_id']."'");
echo '1';
?>

