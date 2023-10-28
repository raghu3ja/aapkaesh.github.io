<?php
include('../lib/db_connection.php');
include('../lib/functions.php');
date_default_timezone_set("Asia/Kolkata");
$status_date=date('Y-m-d H:i:s');

if(!empty($_POST["keyword"])){	
$sel ="SELECT * FROM `tabl_product` WHERE name LIKE '%".$_POST["keyword"]."%' ORDER BY name ASC";
$query = mysql_query($sel);
$num_rows=mysql_num_rows($query);
if($num_rows>0){
?>

<ul id="country-list">
<?php
while($result= mysql_fetch_assoc($query)){
?>
<li onClick="click2('<?php echo $result["id"];?>,<?php echo $result["name"];?>');"><?php echo $result["name"]; ?></li>
<?php } ?>
</ul>
<?php  }else{ echo "2";} }?>
