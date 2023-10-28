<?php
include('../lib/db_connection.php');
$delete1="UPDATE tabl_testimonials SET status='".$_REQUEST['val']."' where id='".$_REQUEST['id']."'";
$qry1=mysql_query($delete1);

if($qry1)
{
echo '1';	
}

?>