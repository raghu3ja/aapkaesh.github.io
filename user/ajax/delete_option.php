<?php
include('../lib/db_connection.php');

$delete="delete from tabl_product_option where id='".$_REQUEST['id']."'";
$qry=mysql_query($delete);
if($qry)
{
echo '1';	
}

?>