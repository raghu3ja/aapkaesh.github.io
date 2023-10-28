<?php


include('../lib/connectdb.php');
$r=$db->query("DELETE FROM customer_info WHERE c_id='".$_REQUEST['id']."'");
//$del="DELETE FROM customer_info WHERE c_id='".$_REQUEST['id']."'";

$qry=mysql_query($r);

echo '1';


?>