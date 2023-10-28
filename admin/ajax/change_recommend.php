<?php
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

dbQuery("update tabl_product set is_recommend='".$_REQUEST['val']."' where id='".$_REQUEST['pro_id']."'");
echo "1";	
	
?>