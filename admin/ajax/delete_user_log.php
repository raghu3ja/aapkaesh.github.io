<?php
include('../lib/db_connection.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

dbQuery("DELETE  FROM tabl_user_log where id='".$_REQUEST['id']."'");
echo "1";	
	
?>