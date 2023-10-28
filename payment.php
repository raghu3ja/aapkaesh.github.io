<?php 
session_start(); 
include 'includes/conn.php';
if ($_POST) {
	$razorpay_payment_id = $_POST['razorpay_payment_id'];
	if(isset($razorpay_payment_id))
	{
		echo"hello";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aapkaeshop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!--fonts-->
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="OwlCarousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="OwlCarousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>
<body class="inner">

	<!--header-->
	
	<?php include 'inc/header.php'?>
	<?php $razor_api_key="rzp_test_9ZaGGHVlO0CyGq"; 
	
	$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_COOKIE['shop_id']."'");
	if($r->num_rows>0){
		$rows= $r->fetch_assoc();
	}
	?>
	<div class="col-md-12 pay-btn">
		<form action="" method="POST">
			<!-- Note that the amount is in paise = 50 INR -->
			<script
					src="https://checkout.razorpay.com/v1/checkout.js"
					data-key="<?php echo $razor_api_key; ?>"
					data-amount="<?php echo 500*100;?>"
					data-buttontext="Pay with Razorpay"
					data-name="aapkaeshop.com"
					data-description="Txn with RazorPay"
					data-image="http://www.aapkaeshop.com/images/logo.png"
					data-prefill.name="<?php echo $rows['name'];?>"
					data-prefill.email="<?php echo $rows['email'];?>"
					data-theme.color="#F37254"
					></script>
			<input type="hidden" value="Hidden Element" name="hidden">
		</form>
	</div>
		
			
	<?php include 'inc/login-popup.php'?>	
<?php include 'inc/slogin-popup.php'?>	
			
		
		
	
	
	
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
	
</body>
</html>
