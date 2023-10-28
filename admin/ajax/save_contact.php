<?php 
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('y-m-d');

$res=dbQuery("update tabl_guest_user set name='".$_REQUEST['con_name']."',email_id='".$_REQUEST['con_email']."',address='".$_REQUEST['con_address']."' where id='".$_REQUEST['con_id']."' and ip_address='".$_REQUEST['con_ip']."'");
echo '1';
?>

