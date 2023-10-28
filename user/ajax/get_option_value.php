<?php
include('../lib/db_connection.php');

$sel=dbQuery("SELECT * FROM tabl_product_option_value WHERE option_id='".$_REQUEST['id']."'");
while($res=dbFetchAssoc($sel)){
	echo '<option value="'.$res['id'].'">'.$res['option_value'].'</option>';
	}

?>