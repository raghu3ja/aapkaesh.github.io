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
                        <?php  echo $_SESSION['admin_name'];?></span>
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
                <li class="dropdown">
					<a href="manage_category.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Manage Category 
					</a>
				</li>
				<li class="dropdown">
					<a href="manage_users.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Manage Shopkeepers 
					</a>
				</li>
					<li class="dropdown">
					<a href="manage_order.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Manage Orders 
					</a>
				</li>
				<li class="dropdown">
					<a href="add_shopkeeper.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Add Shopkeepers 
					</a>
				</li>
				<li class="dropdown">
					<a href="manage_banner.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Manage Banner 
					</a>
				</li>
				<li class="dropdown">
					<a href="change_password.php" aria-expanded="false">
						<i class="icon-bag position-left"></i> Change Password 
					</a>
				</li>
              
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
