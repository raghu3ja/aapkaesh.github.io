<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

$ins2="UPDATE `tabl_sale` SET
			total='".mysql_real_escape_string($_REQUEST['payout'])."' WHERE id='".$_REQUEST['id']."'";
$qry=mysql_query($ins2) or die(mysql_error());

if($qry){
echo "1";	
}
?>