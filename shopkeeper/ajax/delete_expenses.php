<?php
include('../lib/db_connection.php');

$delete="delete from tabl_expenses_master where id='".$_REQUEST['id']."'";
$qry=mysql_query($delete);

$delete1="delete from tabl_expenses_temp where expense_id='".$_REQUEST['id']."'";
$qry1=mysql_query($delete1);


if($qry && $qry1)
{
echo '1';	
}

?>