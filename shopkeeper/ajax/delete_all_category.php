<?php
include('../lib/connectdb.php');

foreach($_REQUEST['val'] as $k=>$data){
	include('../lib/connectdb.php');
	$r=$db->query("DELETE FROM `category` WHERE category_id='".$data."'");	
	$qry=mysql_query($r);
		//$del=dbQuery("DELETE FROM `category` WHERE category_id='".$data."'");
}
echo "1";

?>