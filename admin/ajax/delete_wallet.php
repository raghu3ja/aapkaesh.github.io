<?php
include('../lib/db_connection.php');

$delete="delete from tabl_wallet where id='".$_REQUEST['id']."'";
$qry=mysql_query($delete);

$delete1="delete from tabl_wallet_detail where c_id='".$_REQUEST['c_id']."'";
$qry1=mysql_query($delete1);

if($qry && $qry1)
{
echo '1';	
}

?>