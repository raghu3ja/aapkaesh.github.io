<?php
include('../lib/connectdb.php');
$r=$db->query("DELETE FROM sub_category WHERE sub_id='".$_REQUEST['id']."'");
//$del="DELETE FROM customer_info WHERE c_id='".$_REQUEST['id']."'";
mysql_query($r);

echo '1';





?>