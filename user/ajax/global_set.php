<?php
include '../../includes/conn.php';
$r=$conn->query("UPDATE `".$_REQUEST['tablname']."` SET ".$_REQUEST['colname']."='".$_REQUEST['val']."' WHERE p_id='".$_REQUEST['id']."'");	
if(mysqli_affected_rows($conn))
{
	echo "1";
}
?>