	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="home.php"><img src="assets/images/logo3.png" alt=""></a>

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
                        <?php  echo @$_SESSION['name']?></span>
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
				<li class="active"><a href="home.php"><i class="icon-display4 position-left"></i> Dashboard</a></li>
                  
                  <li class="dropdown">
					<a href="manage_product.php"  aria-expanded="false">
						<i class="icon-bag position-left"></i>  Manage Product
					</a>

				</li>
                  
                  <?php
				if($_SESSION['type']==1)
				{
					?>
                  <li class="dropdown">
					<a href="manage_category.php" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage Category 
					</a>

				</li>
                
                
                <!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage Slider <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li><a href="manage_slider.php"><i class="icon-task"></i> Manage slider</a></li>
                        <li><a href="add_slider.php"><i class="icon-add"></i> Add Slider</a></li>
                        
					</ul>
				</li>-->
                
                  <li class="dropdown">
					<a href="manage_side_banner.php" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage Side Banner
					</a>

				</li>
                
          
				 <li class="dropdown">
					<a href="manage_user.php" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage User 
					</a>

				</li>
                
                 <li class="dropdown">
					<a href="manage_front_user.php" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage Front User 
					</a>

				</li>
                
                <li class="dropdown">
					<a href="send_mail.php" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Send Mail 
					</a>

				</li>
					
			<?php	}
				?>
                
                 <li class="dropdown">
					<a href="manage_enquiry.php" aria-expanded="false">
						<i class="icon-cart-add position-left"></i>  Manage Enquiry 
					</a>

				</li>
                
            <!--    <li class="dropdown">
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

