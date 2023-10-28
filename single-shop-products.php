<?php  
session_start();
error_reporting();
include 'includes/conn.php';
$catid=$_REQUEST['id'];
//$ses=$_SESSION['shop_det'];
 $csd=$_SESSION['shop_uniq'];
 $cart=$_SESSION["cart"];
 //print_r($cart);
foreach($cart as $crt):
    $pid=$crt['id'];
    endforeach;
   $shop=$conn->query("SELECT * from product WHERE p_id='$pid'");
   while($shops=$shop->fetch_assoc())
{
   $shop_id=$shops['shop_id'];
}
echo "hello".$shop_id;
echo "test".$catid;
if($shop_id!=$catid and $shop_id!="")
{
    ?>
    <script>
        result = confirm("Visitng this page will delete the cart items.");
        if(result==true) {
        <?php
        // unset($_SESSION["cart"]);
        // unset($cart);
        ?>
        }
        else
        {
           window.history.go(-1);
        }
    </script>
    <?php
}


$cat=$conn->query("SELECT * from shopkeeper_register WHERE id='$catid'");
if($cat->num_rows>0)
{

	while($cat_rows= $cat->fetch_assoc())
	{
		$shopname = $cat_rows['shop_name'];

	}
}
if (isset($_GET['page_no']) && $_GET['page_no']!="") 
{
	$page_no = $_GET['page_no'];
} 
else 
{
	$page_no = 1;
}
$total_records_per_page = 20;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";


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
	<style>

    .pagination {   
        display: inline-block;   margin: 10px 0;
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
</style>
</head>
<body class="inner">
<?php include 'inc/header2.php'?>
<div class="main-container">
<div>
<div class="col-md-6 find-shop shop-list shop-single">
	
<h3><?php
 					$cat=$conn->query("SELECT * from shopkeeper_register WHERE id='$catid'");
					if($cat->num_rows>0)
					{
						
						while($cat_rows= $cat->fetch_assoc())
						{
							echo $shopname = ucwords(str_replace('-',' ',$cat_rows['shop_name']));
							$shopphone = $cat_rows['mobile'];
							$shopid=$cat_rows['id'];
							}
					}?>
					</h3>	
					<?php
					
					$cat1=$conn->query("SELECT * from product WHERE shop_id='$shopid' ORDER BY top DESC");
					if($cat1->num_rows>0)
					{
						
						while($cat_rows1= $cat1->fetch_assoc())
						{
							//$product_name=$cat_rows1['product_name'];
							?>

<div class="row">
<!--products list-->
<div class="box shop-row">
	<div class="col-md-3 col-sm-3 col-xs-3">
	    
		<div class="img-box">
		  <a href="product-detail.php?id=<?php echo $cat_rows1['p_id']; ?>"><img src="images/product/<?php echo !empty($cat_rows1['feature_img']) ? $cat_rows1['feature_img'] : 'images/product/product.png'; ?>" onerror="this.onerror=null;this.src='images/product/product.png';" alt="product img" width="100%;"></a>
		</div>
		<p><h6>ID:<?php echo $cat_rows1['p_id'];?></h6></p>
	</div>
	<div class="col-md-9 col-sm-9 col-xs-9">
		<div class="box-content">
			<h4 class="p-name"><a href="product-detail.php?id=<?php echo $cat_rows1['p_id']; ?>">
			    <?php echo ucwords(str_replace('-',' ',$cat_rows1['product_name'])); ?></a>
			    </h4>
			
			<p><?php echo $cat_rows1['short_description']; ?></p>
			
			<div class="row">
			    	<div class="col-md-4 col-xs-4">
					<button class="btn btn-info btn-sm" onclick="product(<?php echo $cat_rows1['p_id']; ?>)"
					data-toggle="modal" data-target="#rupee">&nbsp<i class="fa fa-rupee"></i>
					<?php echo $cat_rows1['discount_mrp']; ?></button>
				</div>
				<div class="col-md-4 col-xs-4">
					<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#callNumber"><i class="fa fa-phone"></i> Call</button>
				</div>
				<div class="col-md-4 col-xs-4">
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#sharebtns<?php echo $cat_rows1['p_id']; ?>"><i class="fa fa-share"></i> Share</button>
				</div>
			
			</div>
			 
		
	</div>
	<!-----------------------------Share Popup Start ---------------------------------->
<!--share popup-->
<div class="modal" id="sharebtns<?php echo $cat_rows1['p_id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<!– Modal Header –>
<button type="button" class="close" data-dismiss="modal">×</button>
   <div class="modal-header">
		<h4 class="modal-title"><?php echo $cat_rows1['product_name']; ?></h4>
	   
   </div>
	<!– Modal body –>
	<div class="modal-body">
		<!-- AddToAny BEGIN -->
		<div class="a2a_kit a2a_kit_size_32 a2a_default_style margin-bottom-20px" data-a2a-title="Aapkieshop.com-<?php echo "$shopname - " .$cat_rows1['product_name']; ?>"  data-a2a-url="https://www.aapkaeshop.com/product-detail.php?id=<?php echo $cat_rows1['p_id']; ?>">
		<a class="a2a_dd"  href="https://www.addtoany.com/share"></a>
		<a  class="a2a_button_facebook"></a>
		<a class="a2a_button_twitter"></a>
		<a class="a2a_button_google_plus"></a>
		<a class="a2a_button_pinterest"></a>
		<a class="a2a_button_linkedin"></a>
		<a class="a2a_button_tumblr"></a>
		<a class="a2a_button_google_gmail"></a>
		<a  class="a2a_button_whatsapp"></a>
		</div>
		<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
		<!-- AddToAny END -->
	</div>
	<!– Modal footer –>
	<!--<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	</div>-->
</div>
</div>
</div>	
<!-----------------------------Share Popup End ---------------------------------->
</div>	
				

</div>	
</div>

<?php
}}?>
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
<!--<div class="col-md-6 sec-right">
<img src="images/store-search.png" alt="search store">
<h4>Search your shop near you</h4>
<a href="#"><button class="btn proceedBtn" type="button" id="">Proceed</button></a>
</div>
</div>-->


<!--call popup-->
<div class="modal" id="callNumber">
<div class="modal-dialog">
<div class="modal-content">
    <button type="button" class="close" data-dismiss="modal"><h4>×</h4></button>
<!– Modal Header –>

   <div class="modal-header">
       
	<h3 class="modal-title"><?php echo $shopname; ?></h3>	
	   
   </div>
	<!– Modal body –>
	<div class="modal-body">
		<p>To Know More About Product Call On</p> 
		<h4><i class="fa fa-phone"></i><a href="tel:<?php echo $shopphone; ?>"> +91 <?php echo $shopphone; ?></a></h4>
	</div>
	<!– Modal footer –>
	<!--<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	</div>-->
</div>
</div>
</div>



	<!-----------------------------rupee Popup Start ---------------------------------->
<!--rupee popup-->
<div class="modal" id="rupee">
	<div class="modal-dialog">
		<div class="modal-content">
		<!– Modal Header –>
		   <div class="modal-header head">
		       <button type="button" class="close cls" data-dismiss="modal">×</button>
				<h3 class="modal-title"><?php echo $shopname; ?></h3>
			   
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
						<input type="text" class="form-control"  id="" placeholder="">
					</div>
					<div class="col-md-4 col-xs-4 fi">
						<div id="field1">
							<button type="button" class="sub">-</button>
							<input type="number" class="are"  id="qty" readonly value="1" min="1" max="100" />
							<button type="button" class="add">+</button>
						</div>
					</div>

					<div class="col-md-4 col-xs-4">
						<input type="text" class="form-control" id=""   placeholder="">
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
					<button type="button" id="addcart" class="btn btn-default btn-close">Add</button>
						
					</div>
						<!--<p style="text-align:center;"></p>
				</div>
			
			</div>
			<!– Modal footer –>
			   <div class="modal-footer foot">
				<button type="button" id="" class="btn btn-default btn-close1" data-dismiss="modal"> Close</button>
			</div>-->
		</div>
	</div>
</div>
<!-----------------------------rupee Popup End ---------------------------------->

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
  
</div>
</body>
</html>
