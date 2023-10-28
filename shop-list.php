<?php  
session_start();
error_reporting(0);
include 'includes/conn.php';
$catid=$_REQUEST['id'];
$pincode=$_REQUEST['pincode'];
$count=$conn->query("SELECT * FROM category WHERE cat_id='$catid'");
$count1=mysqli_num_rows($count);
$row = mysqli_fetch_assoc($count);
$name=$row['cat_name'];


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
<title>Aapkaeshop -<?php echo $name; ?></title>
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
<?php include 'inc/header1.php'?>
<div class="main-container">
  <div class="col-md-6 find-shop shop-list">
    <div class="row">
      <div class="col-md-12">
        <h3>
          <?php
			$cat=$conn->query("SELECT * from category WHERE cat_id='$catid' ");
			if($cat->num_rows>0)
			{
				
				while($cat_rows= $cat->fetch_assoc())
				{
					echo ucwords(str_replace('-',' ',$cat_rows['cat_name']));
				}
			}
			?>
        </h3>
      </div>
    </div>
    <div class="row"> 
        <!--shop list-->
        <?php
        $cat2=$conn->query("
		SELECT sr.*, COUNT(s.shop_id) as total_subscription
		FROM `shopkeeper_register` sr 
		LEFT JOIN `subscription` s
			ON sr.id = s.shop_id 
		WHERE sr.cat_id='$catid' AND sr.pincode='$pincode'	
		GROUP BY sr.id
		");
		
		$total_records = $cat2->num_rows;
		$total_no_of_pages = ceil($total_records / $total_records_per_page);
		$second_last = $total_no_of_pages - 1; // total pages minus 1
		
		$q = "SELECT sr.*, COUNT(s.shop_id) as total_subscription
		FROM `shopkeeper_register` sr 
		LEFT JOIN `subscription` s
			ON sr.id = s.shop_id 
		WHERE sr.cat_id='$catid' AND sr.pincode='$pincode'	
		GROUP BY sr.id order by total_subscription desc LIMIT $offset, $total_records_per_page";		
        $cat1=$conn->query($q);
		
		if($cat1->num_rows>0)
        {
            while($cat_rows1= $cat1->fetch_assoc())
            { 
            ?>
                <div class="box shop-row">
            <div class="col-md-3 col-sm-3 col-xs-3">
              <div class="img-box"> <a href="single-shop-products.php?id=<?php echo $cat_rows1['id']; ?>"><img src="images/shop-images/<?php echo !empty($cat_rows1['shop_img']) ? $cat_rows1['shop_img'] : 'shop.png'; ?>" alt="shop img" width="100%"></a> </div>
            <p><h6>ID:<?php echo $cat_rows1['id'];?></h6></p>
            </div>
            
            <div class="col-md-8 col-sm-8 col-xs-8">
              <div class="box-content">
                <h4 class="p-name"><a href="single-shop-products.php?id=<?php echo $cat_rows1['id']; ?>"><?php echo ucwords(str_replace('-',' ',$cat_rows1['shop_name'])); ?></a>   <i class="fa fa-bookmark-o" aria-hidden="true"></i>  <i class="fa fa-files-o" aria-hidden="true"></i></h4> 
                <p><i class="fa fa-map-marker"></i><?php echo $cat_rows1['address']; ?>, Pin - <?php echo $cat_rows1['pincode']; ?></p>
                <?php
                    $follow = "SELECT COUNT(*) AS total FROM `subscription` WHERE `shop_id`='".$cat_rows1['id']."'";
                    $c = mysqli_query($conn,$follow);
                    $srows = mysqli_fetch_assoc($c); 
                ?>
                <a href="#">
                <button class="btn addHome" onclick="shopid(<?php echo $row5['id']; ?>,'follow')" data-toggle="modal" data-target="#follow" type="button" id="">Follow
                <?php if($srows['total']=='0'){}else{echo "(".$srows['total'].")";} ?>
                </button>
                </a> 
                <i class="fa fa-share-alt-square fa-2x"></i> <i class="fa fa-phone-square fa-2x"></i>  
                <!--<a href="#">
                <button class="btn addHomebtn" onclick="shopid(<?php echo $row5['id']; ?>,'unfollow')" data-toggle="modal" data-target="#unfollow" type="button" id="">Unfollow</button>
                </a> -->
                </div>
            </div>
          </div>
            <?php
            }
        }
        ?>
        
        <?php if($total_no_of_pages > 1) {?>
        <div>
            <div style='border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div>
            
            <ul class="pagination">
            <?php if($page_no > 1){
            echo "<li><a href='shop-list.php?id=$catid&pincode=$pincode'>First Page</a></li>";
            } ?>
                
            <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
            <a <?php if($page_no > 1){
            echo "href='shop-list.php?id=$catid&pincode=$pincode&page_no=$previous_page'";
            } ?>>Previous</a>
            </li>
            
            
             
                
            <li <?php if($page_no >= $total_no_of_pages){
            echo "class='disabled'";
            } ?>>
            <a <?php if($page_no < $total_no_of_pages) {
            echo "href='shop-list.php?id=$catid&pincode=$pincode&page_no=$next_page'";
            } ?>>Next</a>
            </li>
            
            <?php if($page_no < $total_no_of_pages){
            echo "<li><a href='shop-list.php?id=$catid&pincode=$pincode&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
            }
             ?>
            </ul>
        </div>
		<?php 
		}
		?>
    </div>
    <footer>
      <ul class="social-icons">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        <li><a href="aapkaeshop.apk"><img src="images/google.png" alt="google" width="90" height="40"/></i></a></li>
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

<!-----------------------------follow Popup Start ---------------------------------->

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
</html>
