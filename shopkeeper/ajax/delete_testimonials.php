<?php
include('../lib/db_connection.php');
$delete1="delete from tabl_testimonials where id='".$_REQUEST['id']."'";
$qry1=mysql_query($delete1);

if($qry1)
{
echo '1';	
}

?>