<?php
include('../lib/db_connection.php');

$delete=dbQuery("UPDATE `tabl_product` SET is_click='0' WHERE product_id='".$_REQUEST['id']."'");
$delete1=dbQuery("DELETE FROM `tabl_most_viewed` WHERE product_id='".$_REQUEST['id']."'");

if($delete && $delete1)
{
echo '1';	
}
?>