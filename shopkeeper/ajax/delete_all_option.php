<?php
include('../lib/db_connection.php');

foreach($_REQUEST['val'] as $k=>$data){
		
		$del=dbQuery("DELETE FROM `tabl_product_option` WHERE id='".$data."'");
		$del=dbQuery("DELETE FROM `tabl_product_option_value` WHERE option_id='".$data."'");
		$del=dbQuery("DELETE FROM `tabl_product_option_details` WHERE option_id='".$data."'");
	 
		
}
echo "1";

?>