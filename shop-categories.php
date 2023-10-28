<?php  
session_start();
error_reporting();
include 'includes/conn.php';
 if(isset($_GET['register']))
{
$pincode=$_GET['pincode'];
$shop_name=$_GET['shop_name'];
$_SESSION['shop_det']=$pincode;
$uni=uniqid();
$_SESSION['shop_uniq']=$uni;
$csd=$_SESSION['shop_uniq'];
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
<style>.cat-div{display:inline-block;margin-bottom:15px;border-bottom:1px solid #f1c6c6;}.cat-div-1{}</style>
</head>
<body class="inner">
<?php include 'inc/header1.php'?>
<div class="main-container">
  <div class="col-md-6 find-shop shop-list">
    <h3>Shops  </h3>
    <div class="row">
      			<?php
				$count=$conn->query("SELECT * FROM shopkeeper_register group by cat_id");
				$count1=mysqli_num_rows($count);
				
				while($row = mysqli_fetch_assoc($count)) 
				{
					$count3=$conn->query("SELECT * FROM category WHERE cat_id='".$row['cat_id']."' group by cat_id");
					$count4=mysqli_num_rows($count3);
					while($row4 = mysqli_fetch_assoc($count3)) 
					{
					?>
                          <br>
						  <div class="cat-div">
                          <h4 class="sub-title"><?php echo ucwords(str_replace('-',' ',$row4['cat_name'])); ?></h4>
                          <div class="cat-div-1">
						  <?php 
                          $count3 = $conn->query("
						    SELECT sr.*, COUNT(s.shop_id) as total_subscription
							FROM `shopkeeper_register` sr 
							LEFT JOIN `subscription` s
								ON sr.id = s.shop_id 
							WHERE sr.cat_id='".$row4['cat_id']."' AND sr.pincode like '$pincode' AND sr.shop_name LIKE '%".$shop_name."%'	
							GROUP BY sr.id order by total_subscription desc limit 3
						  ");
						  
						 /* $count3 = $conn->query("SELECT * FROM shopkeeper_register WHERE cat_id='".$row4['cat_id']."' AND pincode LIKE '$pincode' AND shop_name LIKE '%".$shop_name."%' limit 3 ");*/
                          $count4=mysqli_num_rows($count3);
                          while($row5 = mysqli_fetch_assoc($count3)) 
                          {
                          ?>
                          
      	<div class="box shop-row">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div class="img-box"> <a href="single-shop-products.php?id=<?php echo $row5['id']; ?>"><img src="images/shop-images/<?php echo !empty($row5['shop_img']) ? $row5['shop_img'] : 'shop.png'; ?>" alt="shop img" width="100%"></a> </div>
        <p><h6>ID:<?php echo $row5['id'];?></h6></p>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
          <div class="box-content">
            <h4 class="p-name"><a  href="single-shop-products.php?id=<?php echo $row5['id']; ?>"  ><?php echo ucwords(str_replace('-',' ',$row5['shop_name'])); ?></a></h4>
            <p><i class="fa fa-map-marker"></i><?php echo $row5['address']; ?>, Pin - <?php echo $row5['pincode']; ?></p>
            <?php
											$follow = "SELECT COUNT(*) AS total FROM `subscription` WHERE `shop_id`='".$row5['id']."'";
											$c = mysqli_query($conn,$follow);
											$srows = mysqli_fetch_assoc($c); 
											?>
            <a href="#">
            <button class="btn addHome" onclick="shopid(<?php echo $row5['id']; ?>,'follow')" data-toggle="modal" data-target="#follow" type="button" id="">Follow
            <?php if($srows['total']=='0'){}else{echo "(".$srows['total'].")";} ?>
            </button>
            </a> <a href="#">
            <button class="btn addHomebtn" onclick="shopid(<?php echo $row5['id']; ?>,'unfollow')" data-toggle="modal" data-target="#unfollow" type="button" id="">Unfollow</button>
            </a> </div>
        </div>
      </div>
      					  <?php
						  } 
						  ?>
      					  <a href="shop-list.php?id=<?php echo $row4['cat_id']; ?>&pincode=<?php echo $_GET['pincode']; ?>" class="read-more">See More Shops</a>
                          </div>
                          
                          </div>
      				<?php
					}
				}
				?>
    </div>
    <?php

				//}
					//}

				//else
				//{
					//echo "<h2>No Result Found</h2>";
				//}
					?>
    <footer>
      <ul class="social-icons">
        <li><a href="https://www.facebook.com/aapkae.shopcom.1"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        <li><a href= "aapkaeshop.apk"><img src="images/google.png" alt="google" width="90" height="25"/></i></a></li>
      </ul>
      <ul class="footer-links">
        <li><a href="contact.php">Contact</a></li>
        <li><a href="terms.php">Terms of use</a></li>
        <li><a href="privacy.php">Privacy Policy</a></li>
        <li><a href="refund-policy.php">Refund Policy</a></li>
      </ul>
    </footer>
  </div>
  <div class="col-md-6 sec-right"> <img src="images/store-search.png" alt="search store">
    <h4>Search your shop near you</h4>
  </div>
</div>
    <?php include 'inc/login-popup.php'?>
	<?php include 'inc/slogin-popup.php'?>
	<?php include 'inc/user_login_popup.php'?>
	<?php include 'inc/user_signup_popup.php'?>
	
	
<!-----------------------------follow Popup Start ---------------------------------->

<div class="modal" id="follow">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!– Modal Header –>
      <div class="modal-header head">
        <h4 class="modal-title">Follow</h4>
        <button type="button" class="close cls" data-dismiss="modal">×</button>
      </div>
      <!– Modal body –>
      <div class="modal-body">
        <form action="#" id="followform">
          <input type="hidden" name="shopid" id="shop-follow">
          <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="col-md-2 col-xs-2">
              <label>Name</label>
            </div>
            <div class="col-md-6 col-xs-8">
              <input type="text" name="name" id="follow-name" class="form-control"  placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="col-md-2 col-xs-2" style="margin-top:15px;">
              <label>Email</label>
            </div>
            <div class="col-md-6 col-xs-8" style="margin-top:15px;">
              <input type="email" name="email" id="follow-email" class="form-control"  placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-default btn-submit">Submit</button>
              <p id="follow-alert" style="text-align:center;"></p>
            </div>
          </div>
        </form>
      </div>
      <!– Modal footer –>
      <div class="modal-footer foot">
        <button type="button" id="" class="btn btn-default btn-close1" data-dismiss="modal"> Close</button>
      </div>
    </div>
  </div>
</div>
<!-----------------------------follow Popup End ----------------------------------> 

<!-----------------------------unfollow Popup Start ---------------------------------->

<div class="modal" id="unfollow">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!– Modal Header –>
      <div class="modal-header head">
        <h4 class="modal-title">Unfollow</h4>
        <button type="button" class="close cls" data-dismiss="modal">×</button>
      </div>
      <!– Modal body –>
      <div class="modal-body">
        <form action="#" id="unfollowform" method="POST">
          <input type="hidden" name="shopid" id="shop-unfollow">
          <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="col-md-2 col-xs-2">
              <label>Name</label>
            </div>
            <div class="col-md-6 col-xs-8">
              <input type="text" name="name" id="unfollow-name" class="form-control"  placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-xs-1"></div>
            <div class="col-md-2 col-xs-2" style="margin-top:15px;">
              <label>Email</label>
            </div>
            <div class="col-md-6 col-xs-8" style="margin-top:15px;">
              <input type="text" name="email" id="unfollow-email" class="form-control"  placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <button type="submit" id="" class="btn btn-default btn-submit">Submit</button>
              <p id="unfollow-alert" style="text-align:center;"></p>
            </div>
          </div>
        </form>
      </div>
      <!– Modal footer –>
      <div class="modal-footer foot">
        <button type="button" id="" class="btn btn-default btn-close1" data-dismiss="modal"> Close</button>
      </div>
    </div>
  </div>
</div>
<!-----------------------------follow Popup End ---------------------------------->
<?php include 'inc/login-popup.php'?>
<script src="js/jquery.min.js"></script> 
<script src="js/custom.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
</body>
<script>
		function shopid(id,type){
			if(type=='follow'){
			    $("#shop-follow").val(id);
			}else if(type=='unfollow'){
			    $("#shop-unfollow").val(id);
		    }
		}
		$("#followform").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			var shopid = $("#shop-follow").val(); 
			var name = $("#follow-name").val();
			var email = $("#follow-email").val();
			$.ajax({
			  url:'ajax/follow.php',
			  type:'post',
			  data:{'shopid':shopid,'name':name,'email':email},
			  success:function(data){
				 //alert(data);
				if(data==1)
				{ 
				  $("#follow-alert").text('Follow Successfully');
					setInterval(function() {
					  location.reload();
									}, 4000);

					}
				else if(data==2)
				{

				  $("#follow-alert").text('Already followed by this email');
					}
				else
				{

				  $("#follow-alert").text('Something went wrong');
					}
				},
			  });
			
		});
		$("#unfollowform").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			var shopid = $("#shop-unfollow").val(); 
			var name = $("#unfollow-name").val();
			var email = $("#unfollow-email").val();
			$.ajax({
			  url:'ajax/unfollow.php',
			  type:'post',
			  data:{'shopid':shopid,'name':name,'email':email},
			  success:function(data){
				 //alert(data);
				if(data==1)
				{ 
				  $("#unfollow-alert").text('UnFollow Successfully');
					setInterval(function() {
					  location.reload();
									}, 4000);

					}
				else if(data==2)
				{

				  $("#unfollow-alert").text('not follow yet');
					}
				else
				{

				  $("#unfollow-alert").text('Something went wrong');
					}
				},
			  });
			
		});
	</script>
	
</html>
<?php

}

?>
