<?php 
include('../lib/db_connection.php');

if(!empty($_POST["keyword"])){	
$res=dbQuery("select * from tabl_category where name LIKE '".$_POST["keyword"]."%'");

$num=dbNumRows($res);


if($num>0)
{?>

<ul id="category-list">
<?php
while($rs=dbFetchAssoc($res))
{?>
<li onClick="click5('<?php echo $rs["id"];?>,<?php echo $rs["name"];?>');"><?php echo $rs["name"]; ?></li>
<?php } ?>
</ul>
<?php
}
else
{
echo "Category not found <a data-toggle='modal' data-target='#myModal' href=''> Add New</a> Category";	
	
}}
?>

