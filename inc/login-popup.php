	<!-- Login & Signup -->
	<div id="login" class="modal fade loginsignup" role="dialog">
		<div class="modal-dialog md-modal">
			<!--signup box-->
			<div class="modal-content" id="signupBox">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><h4>&times;</h4></button>
					<h4 class="modal-title"><img src="images/logo.png" alt="logo" width="300px"></h4>
				</div>
				<div class="modal-body">
					<h2>Welcome Shopkeeper</h2>
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
					<label>Product Category</label>
					<?php
					include 'includes/conn.php';
						
						$cat=$conn->query("select * from category ");
						if($cat->num_rows>0)
						{
							?>
							<select id="country" name="category_id" class="form-control" required>
							<option disabled>Select Category</option>
							<?php
							while($cat_rows= $cat->fetch_assoc())
							{
								?>
								<option value="<?php echo $cat_rows['cat_id']?>"><?php echo $cat_rows['cat_name']?></option>
								<?php
							}
							?>
							</select>
							<?php
						}
					?>
					</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Address" name="address">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Pincode" name="pincode">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<button type="submit" class="btn btn-default" name="register">Register <i class="fa fa-send"></i></button>
						
					</form>
				</div>
				
			</div>
		</div>
	</div>
<!--------------------------------------Login------------------------>
	<div id="s_login" class="modal fade loginsignup" role="dialog">
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
	
					<form action="action_register.php" method="POST" id="registerForm">
					
						
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Mobile" name="mobile">
						</div>
						
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<button type="submit" class="btn btn-default" name="login">Login <i class="fa fa-send"></i></button>
						
					</form>
					Forgot Password <a data-toggle="modal" data-target="#forget-password"><i class="fa fa-user"></i> Click Here</a><br>
					
					Add Your Shop Registration <a data-toggle="modal" data-dismiss="modal" data-target="#s_login"><i class="fa fa-user"></i> <spam style="color: blue;">Click Here</spam></a>
				</div>
				
			</div>
		</div>
	</div>
	<!--------------------------------------Forgot Password------------------------>
	<div id="forget-password" class="modal fade loginsignup" role="dialog">
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

