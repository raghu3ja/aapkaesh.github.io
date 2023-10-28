<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
$conn->query("SELECT * FROM `subscription` WHERE `email`='".$_REQUEST['email']."' AND `shop_id`='".$_REQUEST['shopid']."'");
if(mysqli_affected_rows($conn)>0){
	$cart=$conn->query("DELETE FROM `subscription` WHERE `shop_id`='".$_REQUEST['shopid']."' AND `email`='".$_REQUEST['email']."'");
	if(mysqli_affected_rows($conn)>0){
		echo "1";
	}else{
		echo "3";
	}
}else{
	echo"2";
}

?>