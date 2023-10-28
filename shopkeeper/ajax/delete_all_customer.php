<?php
include('../lib/connectdb.php');

foreach($_REQUEST['val'] as $k=>$data){
	include('../lib/connectdb.php');
	$r=$db->query("DELETE FROM `customer_info` WHERE c_id='".$data."'");	
	$qry=mysql_query($r);
	
	//dbQuery("DELETE FROM `customer_info` WHERE c_id='".$data."'");
}
echo "1";

?>