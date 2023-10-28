<?php
include('../lib/db_connection.php');

$delete="delete from tabl_vendor where id='".$_REQUEST['id']."'";
$qry=mysql_query($delete);


$delete="delete from tabl_product where seller_id='".$_REQUEST['id']."'";
$qry=mysql_query($delete);


if($qry && $qry1)
{
echo '1';	
}

?>