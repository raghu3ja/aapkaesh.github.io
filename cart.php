<?php  
session_start();
$user_id=$_SESSION['user_id'];
error_reporting(0);
include ("includes/conn.php");
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d H:i:s");
$csd=$_SESSION['shop_uniq'];
$conn->query("DELETE FROM `tbl_cart` WHERE `ses_uniq`='$csd'");

if(isset($_POST['submit']))
{
	$productqty=$_POST['productqty'];
	$productid=$_POST['productid'];
	$productname=$_POST['productname'];
	$productprice=$_POST['productprice'];
	$priceex=explode(",",$productprice);$totalprice=0;
	$qty_ex=explode(",",$productqty);
	for($i=0;$i<count($priceex);$i++)
	{
		$totalprice=$totalprice+$priceex[$i]*$qty_ex[$i];
	}
	$name=$_POST['name'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$city=$_POST['city'];
	$district=$_POST['district'];
	$landmark=$_POST['landmark'];
	$address=$_POST['address'];
	$shopname=$_POST['shopname'];
 $sql="INSERT INTO `cart`( `shop_id`,user_id, `product_id`, `product_name`, `price`, `qty`, `total_price`, `name`, `tel`, `email`, `city`, `district`, `landmark`, `address`,`cdate`) VALUES ('".$_POST['shopid']."','".$user_id."','".$productid."','".$productname."','".$productprice."','".$productqty."','".$totalprice."','".$name."','".$tel."','".$email."','".$city."','".$district."','".$landmark."','".$address."','".$date."')";
			
		
	
 $dat=mysqli_query($conn,$sql);
  if ($dat)     
  {
	  $subject = 'Enquiry Detail | Aapkaeshop';

$message = '<p style="font-weight:600; font-size:16px;">Thanks for your enquiry and visiting Aapkaeshop. Our team will contact you offline.</p>';
$message .= '<br/><br/><p><b>Name :</b> '.$name.' <br/>
<b>Email :</b> '.$email.' <br/>
<b>Telephone :</b> '.$tel.' <br/>
<b>City :</b> '.$city.' <br/>
<b>District :</b> '.$district.' <br/>
<b>Landmark :</b> '.$landmark.' <br/>
<b>Address :</b> '.$address.' <br/>
<b>Shop Name :</b> '.$_POST['shopname'].' <br/>
</p><br/><br/>
<p>Thanks!<br>

    Team Aapkaeshop</p>';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: Aapkaeshop <info@aapkaeshop.com>';
$headers[] = 'Cc: info@aapkaeshop.com';
	mail($email, $subject, $message, implode("\r\n", $headers));
		mail('info@aapkaeshop.com', $subject, $message, implode("\r\n", $headers));
		unset($_SESSION["cart"]);
		echo "<script>alert('Order Received Successfully');

		
		window.location.href='index.php';

		</script>";  
  }
	

else{
	echo "<script>alert('Query not Submitted');

		window.location.href='../index.php';

		</script>";	
}
}

?>