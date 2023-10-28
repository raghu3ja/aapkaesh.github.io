<?php
include('../lib/db_connection.php');

foreach($_REQUEST['val'] as $k=>$data){
		
		$del=dbQuery("DELETE FROM `tabl_vendor` WHERE id='".$data."'");
}
echo "1";

?>