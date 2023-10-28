	<!-- Login & Signup -->
	<div id="user_login" class="modal fade loginsignup" role="dialog">
		<div class="modal-dialog md-modal">
			<!--signup box-->
			<div class="modal-content" id="signupBox">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><h4>&times;</h4></button>
					<h4 class="modal-title"><img src="images/logo.png" alt="logo" width="300px"></h4>
				</div>
				<div class="modal-body">
					<h2>Welcome User</h2>
					<p class="sub-title">First time visiting? Enter your details to join in.</p>
	
					<form action="action_register_user.php" method="POST" id="registerForm">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Full Name" name="name">
						</div>
							<div class="form-group">
						<b>Gender</b> &emsp;	<input type="radio"  value="male" name="gender">Male
							<input type="radio" value="female" name="gender">Female
						</div>
						
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<input type="number" class="form-control" placeholder="Mobile" name="mobile">
						</div>
					
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Create Password" name="password">
						</div>
						<button type="submit" class="btn btn-default" name="register">Register <i class="fa fa-send"></i></button>
						
					</form>
				</div>
				
			</div>
		</div>
	</div>
<!--------------------------------------Login------------------------>
	<div id="s_login_user" class="modal fade loginsignup" role="dialog">
		<div class="modal-dialog md-modal">
			<!--signup box-->
			<div class="modal-content" id="signupBox">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><h6>&times;</h6></button>
					<h4 class="modal-title"><img src="images/logo.png" alt="logo" width="300px"></h4>
				</div>
				<div class="modal-body">
					<h3>Welcome Login</h3>
					<p class="sub-title"> Enter your details to login in.</p>
	
					<form action="action_register_user.php" method="POST" id="registerForm">
					
						
						<div class="form-group">
							<input type="number" class="form-control" placeholder="Mobile" name="mobile">
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<button type="submit" class="btn btn-default" name="login">Login <i class="fa fa-send"></i></button>
						
					</form>
					Forgot Password <a data-toggle="modal" data-target="#forget-password_user"><i class="fa fa-user"></i> Click Here</a><br>
					
					User Registration <a data-toggle="modal" data-dismiss="modal" data-target="#user_login"><i class="fa fa-user"></i> <spam style="color: blue;">Click Here</spam></a>
				</div>
				
			</div>
		</div>
	</div>
	<!--------------------------------------Forgot Password------------------------>
	<div id="forget-password_user" class="modal fade loginsignup" role="dialog">
		<div class="modal-dialog md-modal">
			<!--signup box-->
			<div class="modal-content" id="signupBox">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><h6>&times;</h6></button>
					<h4 class="modal-title"><img src="images/logo.png" alt="logo" width="300px"></h4>
				</div>
				<div class="modal-body">
					<h3>Forgot Password</h3>
					<p class="sub-title"> Enter your Registered Email Id.</p>
	
					<form action="action_register.php" method="POST" id="registerForm">
					
						
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email Id" name="email">
						</div>
						
						
						<button type="submit" class="btn btn-default" name="forgot">Forgot Password <i class="fa fa-send"></i></button>
						
					</form>
				</div>
				
			</div>
		</div>
	</div>

