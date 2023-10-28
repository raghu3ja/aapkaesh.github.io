<?php  
session_start();
error_reporting();
include '../includes/conn.php';

date_default_timezone_set("Asia/Kolkata");
$curdate=date("Y-m-d H:i:s");

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aapkaeshop - Subscription</title>
<?php include('include/__js_css.php');?>
<!-- Theme JS files -->
<link  type="text/css" src="assets/css/bootstrap-select.min.css"/>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.2/classic/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" href="assets/css/vpb_uploader.css" rel="stylesheet" />
<!--<script type="text/javascript" src="assets/js/jquery_1.5.2.js"></script>-->

	<style>
		.razorpay-payment-button {
			border-radius: 3px;
			border: 0px solid #e0383e;
			-webkit-transition: none;
			-o-transition: none;
			transition: none;
			background: #e0383e;
			color: #fff;
			padding: 0 26px;
			font-size: 16px;
			height: 46px;
			line-height: 46px;
		}
	</style>
<!-- /theme JS files -->
</head>

<body>
<?php include('include/__header.php');?>
<!-- Page header -->
<div class="page-header">
<div class="page-header-content">
	<div class="page-title">
		<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Subscription</span> - Update Subscription</h4>
	</div>
</div>
</div>
<!-- /page header -->
<!-- Page container -->
<div class="page-container">
<!-- Page content -->
<div class="page-content">
	<!-- Main content -->
<div class="content-wrapper">
		<!-- Vertical form options -->
		<div class="row">
			<div class="col-md-12">
		<!-- Basic layout-->
				<?php 
				$r2=$conn->query("SELECT * FROM `shopkeeper_subscription` WHERE `shopkeeper_id`='".$_SESSION['id']."'");
				if($r2->num_rows>0){
					$rows2= $r2->fetch_assoc();
				}
				//$razor_api_key="rzp_test_9ZaGGHVlO0CyGq"; 
		
				$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_SESSION['id']."'");
				if($r->num_rows>0){
					$rows= $r->fetch_assoc();
				}
				?>
					<div class="panel panel-flat">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<label>Next Due Date</label>
									<input type="text" class="form-control" readonly value="<?php echo date('d-M-Y',strtotime($rows2['next_due_date']));?>">
								</div>
								</div>
							</div>
					<div class="row">
                      <div class="col-md-3" style="padding-right: 25px;">
                            <div class="pricing-box ">
								  <div class="pricing-title">
								    <h3>2 DAY</h3>
								  </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">10</span>
                                        </div>
                                       

		                                <div class="pricing-action">
		                                   <form action="../shopkeeper/payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="10" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="2" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
		                                </div>
		                            </div>
		                        </div>
								
                     <div class="col-md-3" style="padding-right: 25px;">
                            <div class="pricing-box best-price">
                              <div class="pricing-title">
                                <h3>1 MONTHS</h3>
                              </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">300</span>
                                        </div>
                                       

		                                <div class="pricing-action">
		                                   		 <form action="../payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="300" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="31" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
											
		                                </div>
		                            </div>
		                        </div>
								
                   <div class="col-md-3" style="padding-right: 25px;">

                            <div class="pricing-box ">
                             <div class="pricing-title">
                               <h3>1 YEAR</h3>
                             </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">3,650</span>
                                        </div>
                                        

		                                <div class="pricing-action">
		                                   <form action="../payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="3650" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="366" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
		                                </div>
		                    </div>
		            </div>
					
				 <div class="col-md-3" style="padding-right: 25px;">

                            <div class="pricing-box ">
                             <div class="pricing-title">
                               <h3>LIFE TIME</h3>
                             </div>
                                        <div class="pricing-price">
                                            <span><i class="fa fa-inr" aria-hidden="true"></i></span><span class="rupe">10,000</span>
                                        </div>
                                        

		                                <div class="pricing-action">
		                                  <form action="../payment/mojo.php" method="POST">
												<!-- Note that the amount is in paise = 50 INR -->
												<input type="hidden" value="<?php echo $rows['name'];?>" name="name">
												<input type="hidden" value="<?php echo $rows['email'];?>" name="email">
												<input type="hidden" value="10000" name="amount">
												<input type="hidden" name="mobile" value="<?php echo $rows['mobile'];?>">
												<input type="hidden" value="1100" name="month">
												<input type="submit" name="submit" value="SELECT">
											</form>
		                                </div>
		                    </div>
		          </div>

	        	</div>
                             
                
            </div>

					</div>
							
						
					</div>
<!-------------------------------------------------------------------------->
				<!-- /basic layout -->



			</div>

		</div>

		<!-- /vertical form options -->

	</div>

</div>

</div>
<?php include('include/__footer.php');?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



</body>

</html>