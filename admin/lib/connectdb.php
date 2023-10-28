<?php 
$db_host = "localhost"; //can be "localhost" for local development
$db_name = "navigator_db";
$db_password = "9m3h6@Bk";
$db_username = "navigator_db";
//$db_password = "";
//$db_username = "root";
$db = new mysqli($db_host,$db_username,$db_password,$db_name) or die(mysqli_error());
?>