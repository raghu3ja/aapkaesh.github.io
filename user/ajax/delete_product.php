<?php
include('../lib/db_connection.php');

	dbQuery("delete from tabl_product where id='".$_REQUEST['id']."'");
	dbQuery("delete from tabl_product_to_category where product_id='".$_REQUEST['id']."'");
	dbQuery("delete from tabl_product_img where product_id='".$_REQUEST['id']."'");
	dbQuery("DELETE FROM `tabl_product_option_details` WHERE p_id='".$data."'");
echo '1';	

?>