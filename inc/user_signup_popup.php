	<!-- Login & Signup -->
	<div id="sasaslogin" class="modal fade loginsignup" role="dialog">
		<div class="modal-dialog md-modal">
			<!--signup box-->
			<div class="modal-content" id="signupBox">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><h6>&times;</h6></button>
					<h4 class="modal-title"><img src="images/logo.png" alt="logo" width="100px"></h4>
				</div>
				<div class="modal-body">
					<h3>Welcome Shopkeeper111</h3>
					<p class="sub-title">First time visiting? Enter your details to join in.</p>
	
					<form action="action_register.php" method="POST" id="registerForm">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Full Name" name="name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Mobile" name="mobile">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Shop Name" name="shop_name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Address" name="address">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<button type="submit" class="btn btn-default" name="register">Register <i class="fa fa-send"></i></button>
						
					</form>
				</div>
				<div class="modal-footer">
					<p>Already registered? <span id="slogin" class="signin-btn">LOGIN</span></p>
				</div>
			</div>
		</div>
	</div>
