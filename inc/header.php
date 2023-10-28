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
						<li class="dropdown"><a href="user/orders.php"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?></a></li>
					  </ul>
					<?php
					  }
					  else
					  {
					?>
					<ul class="account-section">
						<li class="dropdown"><a data-toggle="modal" data-target="#s_login_user"><i class="fa fa-user"></i> Login / Register</a></li>
					</ul>
					
				<?php 
					  }
					  	if(isset($_SESSION['name']))
					  { 
					  
					?>
					  <!--<ul class="account-section">-->
					<!--<li class="dropdown"><a href="shopkeeper/myshop.php"><i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?></a></li>-->
					  </ul>-->
					<?php
					  }
				     else
					 {
					?>
					 <!--<ul class="account-section">
					 <li class="dropdown"><a data-toggle="modal" data-target="#s_login"><i class="fa fa-user"></i> Login / Register as Shop</a></li>
					</ul>-->
                   <?php 
                    } 
                    ?>
                </div>
			</div>
		</nav>
	</header>