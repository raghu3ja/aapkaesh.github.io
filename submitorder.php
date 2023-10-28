<?php  
session_start();
error_reporting(0);
include 'includes/conn.php';
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
<body class="inner">

	<!--header-->
	
	<?php include 'inc/header.php'?>
            	
       <div class="main-container">
		<div class="col-md-6 find-shop shop-list">

					<div class="contact">
						  
								<div class="form-group">
									<div class="row">
										<div class="main-content">
                        <div class="page-content">
                            <h4>Product Details </h4>
							<hr>
                        </div>
                        <div class="price-div" id="cart_refresh">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="table-info">
                                                <th>Product Name</th>
                                                <th>Unit Price x Quantity</th>
                                                <th>SubTotal</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										    <tr>
                                              <td colspan="4" class="spcl-td"><p class="tbl-spcl-p">All Product</p>    
                                              <div id="cart_update" style="color:red;font-size:14px;"></div>
</td>
                                            </tr>
										<?php
									    	$i=0;
	                                        $total_sum=0;
                                            $total_count=0;
	                                        $cart_session=$_SESSION["cart"];
	                                	 
					if(count($cart_session)>0)
					{
						foreach($cart_session as $pid=>$cat_rows1){
						    $pid=$cat_rows1['id'];
						    $p_data = "SELECT * FROM `product` WHERE `p_id`='$pid'";
                             $product_data = mysqli_query($conn,$p_data);
                            $p_data_obeject= mysqli_fetch_assoc($product_data);
                            
                        $total_sum+=$p_data_obeject['discount_mrp']* $cat_rows1['qty'];
                        if($total_sum==null)
                        { $total_count= 0.00;
                        
                        }
                        else
                        {
                        $total_count= $total_sum;
                        }
						   
  					   	?>
  					   
						<tr class="cust-tr">
                         <td>&nbsp;<?php echo $p_data_obeject['product_name'];?> </td>
                        <td><i class="fa fa-rupee"></i>&nbsp;<?php echo $p_data_obeject['discount_mrp'];?>
                        x <?php echo $cat_rows1['qty'];?><br>
                          <div id="field1">
								<button type="button" onclick="update_item('0','<?= $cat_rows1['id'];?>')" class="sub">-</button>
								<input type="number" class="are" readonly id="qty" value="<?php echo $cat_rows1['qty'];?>" min="0" max="1000" />
								<button type="button" onclick="update_item('1','<?= $cat_rows1['id'];?>')" class="add">+</button>
							</div>
                        </td>
						<td><i class="fa fa-rupee"></i>&nbsp;<?php echo $cat_rows1['qty']*$p_data_obeject['discount_mrp'];?></td>
								           <td>
								               <button class="btn btn-default" onclick="delete_item('<?= $cat_rows1['id'];?>');"><i class="fa fa-trash"></i></button></td>
								            </tr>
<?php
$foll = "SELECT SUM(total) AS total FROM `tbl_cart` WHERE `ses_uniq`='$csd'";
$cx = mysqli_query($conn,$foll);
$srows = mysqli_fetch_assoc($cx);
$total=$cat_rows1['price'];	
$i++;
	}
		}	
?>	
											
											<tr>
                                                <td colspan="3"><span><strong><h4>Grand Total</h4></strong></span></td>
                                                <td><h4><span><i class="fa fa-rupee"></i><strong>&nbsp;<?php echo $total_count;?></strong></span></h4></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            
                             <button class="btn btn-default"   style="background: #e0383e;color:white" onclick="history.go(-1)">Add More</button>
                             <button>pick in store</button>
                             <button>curent add</button>
                             <button>new add</button>
                             <?php
                             if(isset($_SESSION['user_id']))
                             {
                             ?>
                             
                            <div class="detail-div">
                                <div class="page-content">
                                    <h4>Confirm Your Details</h4>
									<hr>
                                </div>
                                <div>
                                    <form action="cart.php" method="POST">
                                         
					<?php
				        $pro_qty='';
				        $p_id='';
				        $p_name='';
				        $p_price=''; 
				        foreach($cart_session as $prd_details)
				        {
    						  $pro_qty.=$prd_details['qty'].',';
    						  $p_id.=$prd_details['id'].',';
    						  $pid=$prd_details['id'];
    						  $prod = "SELECT * FROM `product` WHERE `p_id`='$pid'";
                              $prod_det = mysqli_query($conn,$prod);
                              while($prod_detail = mysqli_fetch_assoc($prod_det))
                              {
        						  $p_name.=$prod_detail['product_name'].',';
        						  $p_price.=$prod_detail['discount_mrp'].',';
        						  $shop_id=$prod_detail['shop_id'];
                              }
                              
				        }
				        $shop = "SELECT * FROM `shopkeeper_register` WHERE `id`='$shop_id'";
                        $shop_det = mysqli_query($conn,$shop);
                              while($shop_detail = mysqli_fetch_assoc($shop_det))
                              {
                                  $shop_name=$shop_detail['shop_name'];
                              }

                                     ?>
						    		    <input type="hidden" name="shopid" value="<?php echo $shop_id;?>">
										<input type="hidden" name="shopname" value="<?php echo $shop_name;?>">   
										<input type="hidden" name="productqty" value="<?= $pro_qty;?>">
										<input type="hidden" name="productid" value="<?= $p_id;?>">
										<input type="hidden" name="productname" value="<?= $p_name;?>">
										<input type="hidden" name="productprice" value="<?= $p_price;?>">
							 
								
                                                <div class="form-group"><input class="form-control" name="name" type="text" required="" placeholder="Enter Your Full Name*"></div>
                                          
                                            <div class="col-md-6 p-0">
                                                <div class="form-group"><input class="form-control" name="tel" type="tel" required="" placeholder="Telephone*" >
												</div>
                                            </div>
											
                                            <div class="col-md-6 pl-2 pr-0">
                                                <div class="form-group"><input class="form-control" name="email" type="email" required="" placeholder="Email ID*" >
												</div>
                                            </div>
										
                                            <div class="col-md-6 p-0">
                                                <div class="form-group"><input class="form-control" name="city" type="text" required="" placeholder="City*"></div>
                                            </div>
											
                                             <div class="col-md-6 pl-2 pr-0">
                                                <div class="form-group"><input class="form-control" name="district" type="text" required="" placeholder="District*" >
												</div>
                                            </div>
                                       
                                                <div class="form-group"><textarea class="form-control" name="landmark" cols="4" required="" placeholder="Enter Your Address Landmark*"></textarea>
												</div>
                                          
                                                <div class="form-group"><textarea class="form-control" name="address" cols="4" required="" placeholder="Enter Your Complete Address*"></textarea>
												</div>
												<?php
												if($total_sum > 0)
												{
												    ?>
												
                                                <div class="form-group">
													<button class="btn btn-primary cust-btn" name="submit" type="submit">Submit</button>
												</div>
												<?php
												}
												?>
                                    </form>
                                </div>
                            </div>
                            
                            <?php
                             }
                            else
                            {
                                ?>
                               <a data-toggle="modal" class="btn btn-info" data-target="#user_login_popup"><i class="fa fa-user"></i> <span style="color:white">Login / Register as User for Order</span></a>
					
        					    <?php
                            }
                            
                            ?>
                        </div>
                    </div>
					
					
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
	
	
	  
	
	
<script>
    function update_item(action,id) {
// 	var qty = parseInt($("#qty").val());
       
 	 $.ajax({
		type:'POST',
		url:'cartdetails.php',
		data:{'id':id,'method':'update','action':action},
		success:function(result){
		$("#cart_update").html(result);
	          
    setTimeout(function() {
		$( "#cart_update" ).load(window. location. href + " #cart_update" );
        $( "#cart_refresh" ).load(window. location. href + " #cart_refresh" );
    }, 1000);
		}
	});
	
}
function delete_item(product){
	$.ajax({
		type:'POST',
		url:'cartdetails.php',
		data:{'id':product,'method':'remove'},
		success:function(result){
			$("#cart_update").html(result);
	setTimeout(function() {
		$( "#cart_update" ).load(window. location. href + " #cart_update" );
        $( "#cart_refresh" ).load(window. location. href + " #cart_refresh" );
    }, 1000);
	
		}
	});
}

 
 </script>
 <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
	<!--<script>-->
 <!--       function add_more(urll){-->
 <!--       event.preventDefault();-->
 <!--       const url = urll-->
 <!--       swal({-->
 <!--       title: 'Are you sure?',-->
 <!--       text: 'You want to leave this page!',-->
 <!--       icon: 'warning',-->
 <!--       buttons: ["Cancel", "Yes!"],-->
 <!--       }).then(function(value) {-->
 <!--       if (value) {-->
 <!--       window.location.href = url;-->
 <!--       }-->
 <!--       });-->
 <!--       }-->
	<!--	    </script>-->
	
	<!--footer-->
	
	<?php include 'inc/login-popup.php'?>
	<?php include 'inc/slogin-popup.php'?>
	<?php include 'inc/user_login_popup.php'?>
	<?php include 'inc/user_signup_popup.php'?>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
</body>
</html>
