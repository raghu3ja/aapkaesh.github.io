	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand logo-text" href="manage_products.php"></a>
<img src="../images/logo.png" width="50%" >
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/demo/users/face11.jpg" alt="">
						<span>
                        <?php  echo @$_SESSION['name'];?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<!--<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>-->
						<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav" style="margin-left: 5px;">
				<!--<li class="active"><a href="home.php"><i class="icon-display4 position-left"></i> Dashboard</a></li>-->
				 <!--<li class="dropdown">
					<a href="shopkeeper_profile.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> My Profile 
					</a>
				</li>-->
				<li class="dropdown">
					<a href="myshop.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> My Shop 
					</a>
				</li>
				
                <li class="dropdown">
					<a href="manage_products.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Manage Products 
					</a>
				</li>
				<li class="dropdown">
					<a href="orders.php" aria-expanded="false">
						<i class="icon-bag position-right"></i> Orders
					</a>
				</li>
				 <li class="dropdown">
					<a href="manage_slider.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Manage Slider 
					</a>
				 <li class="dropdown">
					<a href="change_password.php" aria-expanded="false">
						<i class="icon-bag position-right"></i> Change Password
					</a>
				</li>
				<li class="dropdown">
					<a href="subscription.php" aria-expanded="false">
						<i class="icon-bag position-right"></i> Subscription
					</a>
				</li>
				 
				 
				 
				
				<!--<li>
					<a href="sub_category.php" aria-expanded="false">
					<i class="icon-box position-left"></i> Sub-Category
					</a>
				</li>
				<li class="dropdown">
					<a href="manage_category.php" aria-expanded="false">
						<i class="icon-box position-left"></i> Category 
					</a>
				</li>
				<li class="dropdown">
					<a href="manege_cutoff.php" aria-expanded="false">
						<i class="icon-box position-left"></i> Cutoff 
					</a>
				</li>
				 
                      	<li class="dropdown">
						   <a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-popout"></i> Attributes<i class="caret"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>
									<a href="manage_flavour.php" aria-expanded="false">
										<i class="icon-box position-left"></i> Flavour 
									</a>
								</li>
								
								<li>
									<a href="manage_weight.php" aria-expanded="false">
										<i class="icon-box position-left"></i> Weight 
									</a>
								</li>
							 </ul>
						</li> 
						
				 <li class="dropdown">
					<a href="manage_picture.php" aria-expanded="false">
						<i class="icon-box position-left"></i> Pictures 
					</a>
				</li>
				
				<li class="dropdown">
						   <a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-popout"></i> Recipe<i class="caret"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>
									<a href="manage_recipe_category.php" aria-expanded="false">
									<i class="icon-popout"></i> Recipe Category</a>
								</li>
								
								 <li>
									<a href="manage_blog.php" aria-expanded="false">
									<i class="icon-popout"></i> Text Recepie</a>
								</li>
								
								<li>
									<a href="manage_video.php" aria-expanded="false">
									<i class="icon-popout"></i> Video Recepie</a>
								</li>
							</ul>
				</li> 
			                            
                        
                      	<li class="dropdown">
						   <a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-popout"></i> Customer<i class="caret"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="manage_customer.php" aria-expanded="false">
								<i class="icon-popout"></i> Profile</a></li>
							 </ul>
						</li> 
				
				<li>
					<a href="orders.php" aria-expanded="false">
					<i class="icon-box position-left"></i> Manage Order
					</a>
				</li>
				
					<li class="dropdown">
						   <a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-popout"></i> Banners<i class="caret"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="banner.php" aria-expanded="false">
								<i class="icon-popout"></i> Main Banner</a></li>
							 </ul>
						</li> 
                        
                
               <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage Slider <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li><a href="manage_slider.php"><i class="icon-task"></i> Manage slider</a></li>
                        <li><a href="add_slider.php"><i class="icon-add"></i> Add Slider</a></li>
                        
					</ul>
				</li>
                
                <li class="dropdown">
					<a href="manage_side_banner.php" aria-expanded="false">
						<i class="icon-image2 position-left"></i> Videos
					</a>

				</li>
                
          
				 <li class="dropdown">
					<a href="manage_user.php" aria-expanded="false">
						<i class="icon-users2 position-left"></i> User 
					</a>

				</li>
                
                 <li class="dropdown">
					<a href="manage_front_user.php" aria-expanded="false">
						<i class="icon-users2 position-left"></i> Front User 
					</a>

				</li>
                
                
                <li class="dropdown">
					<a href="guest_user.php" aria-expanded="false">
						<i class="icon-users2 position-left"></i>  Guest User 
					</a>

				</li>
                
                 <li class="dropdown">
					<a href="most_viewed.php" aria-expanded="false">
						<i class="icon-file-eye2 position-left"></i>  Most Viewed 
					</a>

				</li>
                
                
                <li class="dropdown">
					<a href="send_mail.php" aria-expanded="false">
						<i class="icon-mail5 position-left"></i>  Send Mail 
					</a>

				</li>
                
                
                <li class="dropdown">
					<a href="user_log.php" aria-expanded="false">
						<i class="icon-bubble-lines4" position-left></i>  User Log
					</a>

				</li>
					
		
                
                
             <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-cash3 position-left"></i>  Purchase <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li><a href="manage_purchase.php"><i class="icon-task"></i> Manage Purchase</a></li>
                        <li><a href="purchase.php"><i class="icon-add"></i> Add Purchase</a></li>
					</ul>
				</li>
                
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-cash3 position-left"></i>  Sale <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li><a href="manage_sale.php"><i class="icon-task"></i> Manage Sale</a></li>
                        <li><a href="add_sale.php"><i class="icon-add"></i> Add Sale</a></li>
                        <li><a href="sale_ledger.php"><i class="icon-book"></i> Sale Ledger</a></li>
					</ul>
				</li>
                
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-coin-dollar"></i> Payment <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li><a href="paid_payment.php"><i class="icon-minus-circle2"></i> Paid</a></li>
                        <li><a href="received.php"><i class="icon-add"></i> Recieved</a></li>
					</ul>
				</li>
                
                
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-database"></i> Manage Stock <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li><a href="manage_stock.php"><i class="icon-database position-left"></i> Stock</a></li>
                        <li><a href="defected_stock.php"><i class="icon-database position-left"></i> Defectced</a></li>
					</ul>
				</li>
                
               <li><a href="manage_return.php"><i class="icon-enter5 position-left"></i> Return</a></li>
               
               
               <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-wallet"></i> Expenses <span class="caret"></span>
					</a>

				<ul class="dropdown-menu width-250">
				   <li><a href="manage_expenses.php"><i class="icon-minus-circle2 position-left"></i> Manage Expenses</a></li>
				   <li><a href="add_expenses.php"><i class="icon-add position-left"></i> Add Expenses</a></li>
                   </ul>
				</li>
                
                 <li><a href="profit_loss.php"><i class="icon-file-spreadsheet2 position-left"></i> Profit & Loss</a></li>-->
              
 			</ul>
		</div>
	</div>
	<!-- /second navbar -->

<style>
	
.logo-text {
    font-size: 30px;
    font-family: cursive;
    font-weight: 600;
}
	
</style>
