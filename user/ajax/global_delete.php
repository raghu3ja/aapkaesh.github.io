<?php
include('../lib/connectdb.php');
//include('lib/connectdb.php');
$cat=$db->query("DELETE FROM `".$_REQUEST['tablname']."` WHERE ".$_REQUEST['colname']."='".$_REQUEST['id']."'");
//$delete="delete from tabl_category where id='".$_REQUEST['id']."'";
//$qry=mysqli_query($cat);
if(mysqli_affected_rows ($db))
{
echo '1';	
}

?>