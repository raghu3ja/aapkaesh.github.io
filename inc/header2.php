	<header>
		<nav class="navbar">
			<div class="container">
				<div class="navbar-header">
					
					<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
					
					<!--<ul class="account-section">
						<li class="dropdown"><a data-toggle="modal" data-target="#login"><i class="fa fa-user"></i> Shopkeeper  Register</a></li>
					</ul>
					<ul class="account-section">
						<li class="dropdown"><a data-toggle="modal" data-target="#s_login"><i class="fa fa-user"></i> Shopkeeper  Login</a></li>
					</ul>-->

					
					<span style="float:right;" id="cart_refresh">
<?php 
$cart_session = $_SESSION["cart"];
$num = 0;
foreach($cart_session as $pid=>$cat_rows1){
    $num+=$cat_rows1['qty'];
    $pid=$cat_rows1['id'];
						    $p_data = "SELECT * FROM `product` WHERE `p_id`='$pid'";
                             $product_data = mysqli_query($conn,$p_data);
                            $p_data_obeject= mysqli_fetch_assoc($product_data);
                            //print_r($p_data_obeject);//
                        $total_sum+=$p_data_obeject['discount_mrp']* $cat_rows1['qty'];
                        if($total_sum==null)
                        { $total_count= 0.00;
                        
                        
                        }
                        else
                        {
                        $total_count= $total_sum;
                        }
}
  $total=isset($cart_session['total_amt'])?$cart_session['total_amt']:0; //
$total=$total_count;
?>		 
			 <a href="submitorder.php"><button class="btn cartBtn" style="width:auto;" type="submit" id="">
			 <i class="fa fa-shopping-cart"></i> <?= $num;?>  <i class="fa fa-rupee">:<?= $total;?></i></button></a>

	<div id="cart_update" style="color:#e53333;font-size:15px;font-weight:600;"></div>
 </span>
				</div>
			</div>
		</nav>
	</header><style>.navbar-header button.btn.cartBtn {
    background: #e0383e;
    color: #fff;
    padding: 9px 10px 9px 16px;
    width: 150px;
    position: relative;
    left: inherit;}
    
    @media all and (max-width:769px){.navbar-header button.btn.cartBtn {
    background: #e0383e;
    color: #fff;
    padding: 9px 10px 9px 16px;
    width: 100px !important;
    position: relative;
    left: 0px !important;
	top:0px !important;}
	.shop-single button {
    width:80px;
}
	}
    </style>
    <script type="text/javascript">
   function updateDiv()
{
$( "#cart_update" ).load(window. location. href + " #cart_update" );
$( "#cart_refresh" ).load(window. location. href + " #cart_refresh" );
}
    setInterval(function(){updateDiv()},1000);
</script>