<?php 
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('y-m-d');

$ins=dbQuery("INSERT INTO tabl_wallet_detail SET c_id='".$_REQUEST['minus_c_id']."',amount='".$_REQUEST['minus_amount']."',detail='".$_REQUEST['minus_detail']."',type='M',date_added='".$date."'");

$upd=dbQuery("update tabl_wallet set out_amount=out_amount+'".$_REQUEST['minus_amount']."' WHERE  c_id='".$_REQUEST['minus_c_id']."'");
echo '1';
?>

