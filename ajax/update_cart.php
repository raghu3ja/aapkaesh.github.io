<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
//$ses=$_SESSION['shop_det'];
$csd=$_SESSION['shop_uniq'];

$pro_id=$_REQUEST['proid'];
$id=$_REQUEST['cartid'];
$action=$_REQUEST['action']; 

if($action == '0')
{
    $qty='-1';
}
else
{
    $qty='1';
}
$follow = "SELECT * FROM `tbl_cart` WHERE `pro_id` ='$pro_id' AND `ses_uniq`='$csd'";
$c = mysqli_query($conn,$follow);
$rows = mysqli_fetch_assoc($c);
$num=mysqli_num_rows($c);

  if($num > 0)
 {
       $oldqty=$rows['qty']+$qty;
       if($oldqty == '0')
       {
          $oldqty='1'; 
       }
       else
       {
           $oldqty=$oldqty;
       }
       $tot=$oldqty*$rows['price'];
        
      $upro=  $conn->query("UPDATE `tbl_cart` SET `qty`='$oldqty',`total`='$tot' WHERE
      `pro_id` ='$pro_id' AND `ses_uniq`='$csd'");
       echo "";
 }
 else
 {
   // echo "";
 }

?>