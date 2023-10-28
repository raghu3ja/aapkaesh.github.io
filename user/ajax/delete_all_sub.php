<?php
include('../lib/connectdb.php');

foreach($_REQUEST['val'] as $k=>$data){
		include('../lib/connectdb.php');
		$r=$db->query("DELETE FROM `sub_category` WHERE sub_id='".$data."'");	
		$qry=mysql_query($r);
		//$del=dbQuery("DELETE FROM `tabl_vendor` WHERE id='".$data."'");
}
echo "1";

?>