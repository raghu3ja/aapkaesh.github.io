<?php
include('../lib/db_connection.php');

foreach($_REQUEST['val'] as $k=>$data){
		
	dbQuery("DELETE FROM `tabl_product` WHERE id='".$data."'");
	dbQuery("DELETE FROM `tabl_product_option_details` WHERE p_id='".$data."'");
	dbQuery("DELETE FROM `tabl_product_to_category` WHERE product_id='".$data."'");
	dbQuery("DELETE FROM `tabl_product_img` WHERE product_id='".$data."'");
	
		
}
echo "1";

?>