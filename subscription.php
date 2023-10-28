<?php 
session_start();
error_reporting();
date_default_timezone_set("Asia/Kolkata");
$curdate=date("Y-m-d H:i:s");
include 'includes/conn.php';
if ($_POST) {
	$razorpay_payment_id = $_POST['razorpay_payment_id'];
	if(isset($razorpay_payment_id)){
		$days=$_POST['month'];
		
		$curdate = date("Y-m-d") ;
		
		if($days=='2'){
			$nextDate = date('Y-m-d',strtotime('+2 days',strtotime($curdate)));
		}elseif($days=='31'){
			$nextDate = date('Y-m-d',strtotime('+31 days',strtotime($curdate)));
		}elseif($days=='366'){
			$nextDate = date('Y-m-d',strtotime('+366 days',strtotime($curdate)));
		}elseif($days=='1100'){
			$nextDate = date('Y-m-d',strtotime('+1100 days',strtotime($curdate)));
		}
		
		$r1=$conn->query("SELECT * FROM `shopkeeper_subscription` WHERE `shopkeeper_id`='".$_COOKIE['shop_id']."'");
		if($r1->num_rows>0){
			$update=$conn->query("UPDATE `shopkeeper_subscription` SET `next_due_date`='".$nextDate."',`cdate`='".$curdate."' WHERE `shopkeeper_id`='".$_COOKIE['shop_id']."'");
			if(mysqli_affected_rows($conn)>0){
				$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_COOKIE['shop_id']."'");
				if(mysqli_affected_rows($conn)>0){
					$rows= $r->fetch_assoc();
					$_SESSION['id']=$rows['id'];
					$_SESSION['name']=$rows['name'];
					 echo "<script LANGUAGE='JavaScript'>
						window.location.href='shopkeeper/manage_products.php';
						 </script>"; 
				}
			}else{
				echo "<script LANGUAGE='JavaScript'>
				window.alert('Something went wrong please contact to our Customer Executive');
				window.location.href='subscription.php';
		   </script>"; 
			}
		}else{
			$insert=$conn->query("INSERT INTO `shopkeeper_subscription`(`id`,`shopkeeper_id`, `next_due_date`, `cdate`) VALUES ([id],'".$_COOKIE['shop_id']."','".$nextDate."','".$curdate."')");
			if(mysqli_affected_rows($conn)>0){
				$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_COOKIE['shop_id']."'");
				if(mysqli_affected_rows($conn)>0){
					$rows= $r->fetch_assoc();
					$_SESSION['id']=$rows['id'];
					$_SESSION['name']=$rows['name'];
					 echo "<script LANGUAGE='JavaScript'>
						window.location.href='shopkeeper/manage_products.php';
						 </script>"; 
				}
			}else{
				echo "<script LANGUAGE='JavaScript'>
				window.alert('Something went wrong please contact to our Customer Executive');
				window.location.href='subscription.php';
		   </script>"; 
			}
		}
	}else{
		echo "<script LANGUAGE='JavaScript'>
   		window.alert('Payment Failed');
    	window.location.href='subscription.php';
       	</script>"; 
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
	<style>
		.razorpay-payment-button {
			border-radius: 3px;
			border: 0px solid #e0383e;
			-webkit-transition: none;
			-o-transition: none;
			transition: none;
			background: #e0383e;
			color: #fff;
			padding: 0 26px;
			font-size: 16px;
			height: 46px;
			line-height: 46px;
		}
	</style>
</head>
<body class="inner">

	<!--header-->
	
	<?php include 'inc/header.php'?>
	
	<div class="pricing clearfix">

                <h3 class="center">Optimise saving by selecting a long term plan.</h3>
		<?php 
		$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_COOKIE['shop_id']."'");
		if($r->num_rows>0){
			$rows= $r->fetch_assoc();
		}
		  //$razor_api_key="rzp_test_9ZaGGHVlO0CyGq"; 
		  $razor_api_key="rzp_live_NiRZLBiYiPTwIC"; 
	
		?>
<div class="container">
<span class="detail">Name -<span class="de"><?php echo $rows['name'];?></span></span><br>
<span class="detail">Phone No -<span class="de"><?php echo $rows['mobile'];?></span></span><br>
<span class="detail">E-mail -<span class="de"><?php echo $rows['email'];?></span></span><br>
<span class="detail">pincode -<span class="de"><?php echo $rows['pincode'];?></span></span><br>
<span class="detail">Shop Name -<span class="de"><?php echo $rows['shop_name'];?></span></span><br>
</div>

<div class="container">

                            <div class="col-md-3" style="padding-right: 25px;">
                            <div class="pricing-box ">
								  <div class="pricing-title">
								    <h3>1 DAYS</h3>
								  </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">10</span>
                                        </div>
                                       

		                                <div class="pricing-action">
		                                   <form action="payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="<?php echo $rows['pincode'];?>" name="pincode">
												<input type="hidden" value="10" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="2" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
		                                </div>
		                            </div>
		                        </div>
								
                     <div class="col-md-3" style="padding-right: 25px;">
                            <div class="pricing-box best-price">
                              <div class="pricing-title">
                                <h3>1 MONTH</h3>
                              </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">300</span>
                                        </div>
                                       

		                                <div class="pricing-action">
		                                   
												<!-- Note that the amount is in paise = 50 INR -->
												 <form action="payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="300" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="31" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
											


		                                </div>
		                            </div>
		                        </div>
								
                   <div class="col-md-3" style="padding-right: 25px;">

                            <div class="pricing-box ">
                             <div class="pricing-title">
                               <h3>1 YEAR</h3>
                             </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">3,650</span>
                                        </div>
                                        

		                                <div class="pricing-action">
		                                  	 <form action="payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="3650" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="366" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
											
		                                </div>
		                    </div>
		            </div>
					
				 <div class="col-md-3" style="padding-right: 25px;">

                            <div class="pricing-box ">
                             <div class="pricing-title">
                               <h3>LIFE TIME</h3>
                             </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">10,000</span>
                                        </div>
                                        

		                                <div class="pricing-action">
		                                  <form action="payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="10000" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="1100" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
		                                </div>
		                    </div>
		        </div>
    </div>
    </div>
		
			
	<?php include 'inc/login-popup.php'?>	
<?php include 'inc/slogin-popup.php'?>	
			
		
		
	
	
	
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
	
</body>
</html>
