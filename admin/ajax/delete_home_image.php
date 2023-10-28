<?php
session_start();
include('../lib/db_connection.php');
$qry=mysql_query("DELETE FROM tabl_home_image WHERE id='".$_REQUEST['id']."'") or die(mysql_error());
echo 1;
?>