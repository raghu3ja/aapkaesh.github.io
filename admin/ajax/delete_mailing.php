<?php


include('../lib/db_connection.php');

$del="DELETE FROM  tabl_mailing_list WHERE id='".$_REQUEST['id']."'";

$qry=mysql_query($del);

echo '1';


?>