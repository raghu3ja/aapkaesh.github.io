<?php
session_start();
include ("includes/conn.php");
if(isset($_POST['verify_otp']))
{
     $otp=$_POST['otp'];
     $mobile=$_SESSION['otp_mob_user'];
     $fetch1=mysqli_query($conn, "SELECT otp FROM otp_msg where mobile = '$mobile'");
    while($row1 = mysqli_fetch_array($fetch1))
    {
        $otp_val=$row1['otp'];
    }
    if($otp_val==$otp)
    {
        $query="Update users set status=1 where mobile='$mobile'";
      $res=mysqli_query($conn,$query);
         echo "<script LANGUAGE='JavaScript'>
    window.alert('Mobile number Verified, Login to account');
    window.location.href='index.php';
       </script>"; 
    }
    else
    {
          echo "<script LANGUAGE='JavaScript'>
    window.alert('OTP not matched');
    window.location.href='verify_otp_user.php';
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

</head>
<body>

		<header>
		<nav class="navbar">
			<div class="container">
				<div class="navbar-header">
					
					<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
					<?php
					if(isset($_SESSION['user_name']))
					{
					    ?>
					    	<ul class="account-section">
						<li class="dropdown"><a href="user/myprofile.php"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?></a></li>
					</ul>
					<?php
					}
					else
					{
					?>
					<ul class="account-section">
						<li class="dropdown"><a data-toggle="modal" data-target="#s_login_user"><i class="fa fa-user"></i> Login / Register as User</a></li>
					</ul>
					<?php }
						if(isset($_SESSION['name']))
					{
					    ?>
					    	<ul class="account-section">
						<li class="dropdown"><a href="shopkeeper/myshop.php"><i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?></a></li>
					</ul>
					<?php
					}
					else
					{
					?>
					<ul class="account-section">
						<li class="dropdown"><a data-toggle="modal" data-target="#s_login"><i class="fa fa-user"></i> Login / Register as Shop</a></li>
					</ul>
                <?php } ?>
				</div>
			</div>
		</nav>
	</header>
	
	<!----------------------------------------Banner--------------------->
	<div class="main-container">
		<div class="col-md-12 mob-sec">
			<div class="owl-carousel owl-theme" id="owl-h">
				<?php
					$image=$conn->query("select * from banner");
					if($image->num_rows>0)
					{
					   
						while($image_rows= $image->fetch_assoc())
						{
						    ?>
				<div class="item">
					<img style="height: 90%" src="admin/img/banner/<?php echo $image_rows['bn_img']; ?>" alt="search store">
				</div>
				<?php    
						    }
						    
						       						
						}
					
				?>
			</div>
		</div>
		<div class="col-md-6 find-shop">
			<h3 class="home-heading">Verify OTP</h3>
			<form action="" method="POST" >
				<div class="form-group">
					<label>Enter OTP<span class="bleck">*</span></label>
					<input type="number"class="form-control" placeholder="Enter OTP" name="otp" >
				</div>
			
				<button type="submit" class="btn btn-success" name="verify_otp">Verify Account </button>

			</form>
			<br><br><br>
            <marquee  bgcolor=red width="100%" direction="left" height="40px">
<h1>This is a sample scrolling text that has scrolls texts to left.</h1>
</marquee>			
			<footer>
				<ul class="social-icons">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="aapkaeshop.apk"><img src="images/google.png" alt="google" width="90" height="30"/></i></a></li>
				</ul>
				<ul class="footer-links">
					<li><a href="contact.php">Contact</a></li>
					<li><a href="terms.php">Terms of use</a></li>
					<li><a href="privacy.php">Privacy Policy</a></li>
					<li><a href="refund-policy.php">Refund Policy</a></li>
				</ul>
			</footer>
			

		</div>
		<div class="col-md-6 sec-right">
			<img src="images/store-search.png" alt="search store">
			<h4>Search your shop near you</h4>
		</div>
	</div>
	

	<?php include 'inc/login-popup.php'?>
	<?php include 'inc/slogin-popup.php'?>
	<?php include 'inc/user_login_popup.php'?>
	<?php include 'inc/user_signup_popup.php'?>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
	<script>
		$('#owl-h').owlCarousel({
		loop:true,
		autoplay: true,
		items:1,
		dots: false,
	})
	</script>

</body>
</html>
