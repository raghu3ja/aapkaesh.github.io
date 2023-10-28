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
	
	<div class="main-container">
		<div class="col-md-6 find-shop shop-list">
			<h3>Contact Info</h3>
			<div class="row">
				<div class="col-md-12 p-0">
					<p style="margin-bottom:30px;">Feel free to contact us if you feel any query. You can mail us also at info@aapkaeshop.com</p>

					<p><i class="fa fa-map-marker"></i> 86-309 Pardhasadi Nagar, Doctors colony, Kurnool, Andhra Pradesh, India
                                                        Pincode - 518002</p>
					<p><i class="fa fa-envelope"></i>  info@aapkaeshop.com</p>
					<p><i class="fa fa-phone"></i>   +91 9100803369</p>
				</div>	
			</div>
			
			<hr>
			
			<div class="row">		
				<div class="col-sm-12 col-xs-12 p-0">
					<div class="contact">
						  <form class="form" action="" method="post" id="registrationForm">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 pl-0">
											<label for="first_name"><h4>Full Name</h4></label>
											<input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name">
										</div>
										<div class="col-md-6 pr-0">
											<label for="email"><h4>Email</h4></label>
											<input type="email" class="form-control" name="email" id="email" placeholder="you@email.com">
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-md-12 p-0">
											<label for="mobile"><h4>Mobile</h4></label>
											<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" title="Enter Mobile">
										</div>
									</div>
								</div>
					

								<div class="form-group">
									<label for="phone"><h4>Comment</h4></label>
									<textarea class="form-control" name="comment" rows="5" placeholder="Your comment here"></textarea> 
								</div>

							  <div class="form-group">
								<div class="row">
									   <div class="col-xs-12">
											<button class="btn btn-md btn-success" name="update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
										</div>
								</div>
							  </div>
						</form>
					 </div>
				</div>
			</div>	
			
			
			<footer>
				<ul class="social-icons">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="https://play.google.com/store/apps/details?id=kriworld.com.aapkaeshop"><img src="images/google.png" alt="google" width="90" height="40"/></i></a></li>
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
	
	
	<!--footer-->
	<?php include 'inc/login-popup.php'?>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
	
</body>
</html>
