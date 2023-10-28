<?php
include('../lib/connectdb.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');

dbQuery("update tabl_enquiry set status='".$_REQUEST['val']."' where id='".$_REQUEST['id']."'");
echo "1";	
	
?>