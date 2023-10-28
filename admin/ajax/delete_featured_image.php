<?php


include('../lib/db_connection.php');

$del="DELETE FROM tabl_menu_featured WHERE id='".$_REQUEST['id']."'";

$qry=mysql_query($del);

echo '1';


?>