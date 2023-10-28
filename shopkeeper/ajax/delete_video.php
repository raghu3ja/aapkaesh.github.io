<?php
include('../lib/connectdb.php');
//include('lib/connectdb.php');
$cat=$db->query("DELETE FROM `v_log` WHERE vdo_id='".$_REQUEST['id']."'");
//$delete="delete from tabl_category where id='".$_REQUEST['id']."'";
$qry=mysql_query($cat);
if($qry)
{
echo '1';	
}

?>