<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$status_date=date('Y-m-d H:i:s');

if(!empty($_POST["order_id"])){	
 $sel ="SELECT * FROM `tabl_sale` WHERE order_id='".$_POST["order_id"]."'";
$query = mysql_query($sel) or die(mysql_error());
$num_rows=mysql_num_rows($query);
if($num_rows>0){
echo "1";	
  }
}
?>
