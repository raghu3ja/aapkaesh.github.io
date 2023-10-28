<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
//$ses=$_SESSION['shop_det'];
$csd=$_SESSION['shop_uniq'];

$proid=$_REQUEST['product'];

$conn->query("DELETE FROM `tbl_cart` WHERE id='$proid' AND `ses_uniq`='$csd'");
echo "";
?>