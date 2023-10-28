<?php
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

dbQuery("DELETE  FROM tabl_product_option_value where id='".$_REQUEST['id']."'");

dbQuery("DELETE  FROM  tabl_product_option_details where option_value='".$_REQUEST['id']."'");

echo "1";	
	
?>