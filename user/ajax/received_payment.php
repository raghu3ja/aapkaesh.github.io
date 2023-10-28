<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');


 $sale="UPDATE `tabl_sale` SET received='1' WHERE id='".$_REQUEST['id']."'";
mysql_query($sale) or die(mysql_error());
echo "1";	
	
?>