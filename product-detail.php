<?php  
session_start();
error_reporting(0);
include 'includes/conn.php';
$catid=$_REQUEST['id'];
$cat=$conn->query("SELECT * from product WHERE p_id='$catid'");
					if($cat->num_rows>0)
					{
						
						while($cat_rows= $cat->fetch_assoc())
						{
							$shopname = $cat_rows['product_name'];
						
							}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Aapkaeshop - <?php echo $shopname; ?></title>
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
<?php include 'inc/header2.php'?>
	<!-- The Modal -->
<div id="myModal" class="modal">

  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>

</div>

<?php

					$cat=$conn->query("SELECT * FROM shopkeeper_register LEFT JOIN product ON shopkeeper_register.id=product.shop_id WHERE product.p_id='$catid'");
					if($cat->num_rows>0)
					{
						while($cat_rows= $cat->fetch_assoc())
						{
							?>
<div class="main-container">

<div class="col-md-6 find-shop shop-list shop-single">

	<a href="single-shop-products.php?id=<?php echo $cat_rows['id'];  ?>"><input style="height: 30px; width: 100px; background-color: #e0383e; color: #ffff;" type="button" name="back" value="Back"></a>
	<br>

<h3><?php echo $cat_rows['product_name']; ?></h3>

<div class="row">

<!--products list-->
<div class="box shop-row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<section class="slider-sec">
			<div class="slider owl-carousel owl-theme" id="owl-demo">
			<?php
			$cat_slider=$conn->query("SELECT * FROM product_slider WHERE p_id=$catid");
					if($cat_slider->num_rows>0)
					{
						while($cat_rows_slider= $cat_slider->fetch_assoc())
						{
							?>
			<div>
				
<img id="myImg<?php echo $cat_rows_slider['id']; ?>" src="images/product-gallery/<?php echo $cat_rows_slider['image_name']; ?>"  style="width:100%;max-width:100%; height: 250px">

	<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg<?php echo $cat_rows_slider['id']; ?>");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>	
				</div>

		

<?php
}}
?>

			</div>

		</section>

	</div>

	

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box-content product-detail">
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<label>MRP</label>
					<p class="btn btn-default btn-sm"><i class="fa fa-rupee"></i> <?php echo $cat_rows['mrp']; ?> </p>
				</div>
				<div class="col-md-6 col-xs-6">
					<label>buy </label>
					<p class="btn btn-default btn-success btn-sm main-amount" onclick="product(<?php echo $_REQUEST['id']; ?>)"  data-toggle="modal" data-target="#rupee"><i class="fa fa-rupee"></i> 
					<?php echo $cat_rows['discount_mrp']; ?></p>
				</div>
				<div class="col-md-6 col-xs-6">
					<label>Save Amount</label>
					<p class="btn btn-default btn-sm"><i class="fa fa-rupee"></i><?php echo $discount= $cat_rows['mrp']-$cat_rows['discount_mrp'];?> </p>
				</div>
				<div class="col-md-6 col-xs-6">
					<label>Phone Number</label>
					 <p class="btn btn-default btn-sm"><i class="fa fa-phone"></i><a href="tel:<?php echo $cat_rows['mobile']; ?>"> +91 <?php echo $cat_rows['mobile']; ?></a></p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<label>Description</label>
					<p><?php echo $cat_rows['description']; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>					
</div>
<?php
}}?>
<footer>
	<?php

	$cat1=$conn->query("SELECT * FROM shopkeeper_register LEFT JOIN product ON shopkeeper_register.id=product.shop_id WHERE product.p_id='$catid'");
	if($cat1->num_rows>0)
	{
		$cat1_rows= $cat1->fetch_assoc();
	}
	?>
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
	<!-----------------------------rupee Popup Start ---------------------------------->
<!--rupee popup-->
<div class="modal" id="rupee">
	<div class="modal-dialog">
		<div class="modal-content">
		<!– Modal Header –>
		   <div class="modal-header head">
				<h4 class="modal-title"><?php echo $shopname; ?></h4>
			   <button type="button" class="close cls" data-dismiss="modal">×</button>
		   </div>
			<!– Modal body –>
			<div class="modal-body"  id="changecontent">
			
				<div class="row">
					<div class="col-md-4 col-xs-4">
						<label>Product Name</label>
					</div>
					<div class="col-md-4 col-xs-4">
						<label>Quantity</label>
					</div>
					<div class="col-md-4 col-xs-4">
						<label>Price</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xs-4">
						<input type="text" class="form-control" id="" placeholder="">
					</div>
					<div class="col-md-4 col-xs-4 fi">
						<div id="field1">
							<button type="button" class="sub">-</button>
							<input type="number" class="are" id="qty" value="1" min="1" max="100" />
							<button type="button" class="add">+</button>
						</div>
					</div>

					<div class="col-md-4 col-xs-4">
						<input type="text" class="form-control" id="" placeholder="">
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
					<button type="button" id="addcart" class="btn btn-default btn-close">Add</button>
						
					</div>
						<p style="text-align:center;"></p>
				</div>
			
			</div>
			<!– Modal footer –>
			<!--<div class="modal-footer foot">
				<button type="button" id="" class="btn btn-default btn-close1" data-dismiss="modal"> Close</button>-->
			</div>
		</div>
	</div>
</div>
<!-----------------------------rupee Popup End ---------------------------------->
<?php include 'inc/login-popup.php'?>
<?php include 'inc/login-popup.php'?>
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
<script>$('.add').click(function () {
		if ($(this).prev().val() < 100) {
    	$(this).prev().val(+$(this).prev().val() + 1);
		}
});
$('.sub').click(function () {
		if ($(this).next().val() > 1) {
    	if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
});
</script>
<script>
function product(product){
	$.ajax({
		type:'POST',
		url:'ajax/product.php',
		data:{'product':product},
		success:function(result){
			$("#changecontent").html(result);
		}
	});
}
function calculate(action, qty) {
	var qty = qty??parseInt($("#qty").val());
	var price = parseInt($("#product-price").val());
	if(action=='1'){
		qty=qty+1;
	}else if(action=='0'){
		if(qty>1){
			qty=qty-1;
		}else{
			qty=1;
		}
	}
	$("#qty").val(qty);
	var sub = qty * price;
	$("#total-price").val(sub);
}
function addcart(id) {
	var qty = $("#qty").val();
//  	var name = $("#product-name").val();
	var id = $("#product-id").val();
//	var price = $("#product-price").val();
	//var total = $("#total-price").val();
   
  
	$("#productqty").after("<input type='hidden' name='productqty[]' value='"+qty+"' />");
	$("#productid").after("<input type='hidden' name='productid[]' value='"+id+"' />");
//	$("#productname").after("<input type='hidden' name='productname[]' value='"+name+"' />");
	//$("#productprice").after("<input type='hidden' name='productprice[]' value='"+price+"' />");
    $.ajax({
		type:'POST',
	//	url:'ajax/product_cart.php',
	    url:'cartdetails.php',
		data:{'id':id,'qty':qty,'method':'add'},
		success:function(result){
		$("#cart_update").html(result);
		}
	});
	$('#rupee').modal('hide');
	
}	
</script>
</body>

</html>
