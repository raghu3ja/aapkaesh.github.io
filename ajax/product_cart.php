<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
//$ses=$_SESSION['shop_det'];
$csd=$_SESSION['shop_uniq'];

$pro_id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$qty=$_REQUEST['qty'];
$price=$_REQUEST['price'];
$total=$_REQUEST['total'];

$conn->query("DELETE FROM `tbl_cart` WHERE `ses_uniq`=''");

$follow = "SELECT * FROM `tbl_cart` WHERE `pro_id` ='$pro_id' AND `ses_uniq`='$csd'";
$c = mysqli_query($conn,$follow);
$rows = mysqli_fetch_assoc($c);
$num=mysqli_num_rows($c);

  if($num > 0)
 {
       $oldqty=$rows['qty']+$qty;
       $tot=$oldqty*$rows['price'];
        
      $upro=  $conn->query("UPDATE `tbl_cart` SET `qty`='$oldqty',`total`='$tot' 
      WHERE `pro_id` ='$pro_id' AND `ses_uniq`='$csd'");
       echo "";

 }
else
{

$insert_cart=$conn->query("INSERT INTO `tbl_cart`(`pro_id`, `qty`, `price`, `total`, `p_name`,`ses_uniq`)
VALUES ('$pro_id','$qty','$price','$total','$name','$csd')");

    echo "";
}
?>