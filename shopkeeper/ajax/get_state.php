<?php
include('../lib/db_connection.php');
include('../lib/get_functions.php');
date_default_timezone_set("Asia/Kolkata");
$status_date=date('Y-m-d H:i:s');


$sel =mysql_query("select zone_id,name from tabl_zone where country_id='".$_REQUEST['country_id']."'") or die(mysql_error());
	while($res=mysql_fetch_assoc($sel)){

echo '<option value="'.$res['zone_id'].'">'.$res['name'].'</option>';
	}

