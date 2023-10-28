 
<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$shop_name=$_POST['shop_name'];
$address=$_POST['address'];
$category_id=$_POST['category_id'];
$pincode=$_POST['pincode'];
$password=$_POST['password'];

$fetch1=mysqli_query($conn, "SELECT mobile FROM shopkeeper_register where mobile = '$mobile' ");
$row1 = mysqli_fetch_array($fetch1);
$fetch2=mysqli_query($conn, "SELECT email FROM shopkeeper_register where email = '$email'");
$row2 = mysqli_fetch_array($fetch2);
$fetch3=mysqli_query($conn, "SELECT shop_name FROM shopkeeper_register where shop_name = '$shop_name'");
$row3=mysqli_fetch_array($fetch3);
$fetch4=mysqli_query($conn, "SELECT pincode FROM shopkeeper_register where pincode = '$pincode'");
$row4=mysqli_fetch_array($fetch4);

if(isset($row3['shop_name'])==($shop_name)&& isset($row4['pincode'])==($pincode))
	{
		echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Pincode with Same Shop Name  Already Exist');
    window.location.href='add_shopkeeper.php';
       </script>"; 
	}
	
    elseif(mysqli_num_rows($fetch1) > 0)

    {
      
      echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Mobile No Already Exist');
      window.location.href='add_shopkeeper.php';
       </script>"; 

    }
    
    elseif(mysqli_num_rows($fetch2) > 0)
    {
      echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Email Already Exist');
    window.location.href='add_shopkeeper.php';
       </script>"; 

    }

    else
    {
      $query="INSERT into shopkeeper_register(cat_id,name,email,mobile,shop_name, address,pincode, password) VALUES('$category_id','$name','$email','$mobile','$shop_name','$address','$pincode','$password')";
$res=mysqli_query($conn,$query);
        
     if ($query) 
       {
		 	$last_id = mysqli_insert_id($conn);
		 	$curdate = date("Y/m/d") ;
			$nextDate = date('Y/m/d',strtotime('+30 days',strtotime($curdate)));
			 $query1="INSERT INTO `shopkeeper_subscription`(`shopkeeper_id`, `next_due_date`, `cdate`) VALUES ('".$last_id."','".$nextDate."','".$curdate."')";
			$res1=mysqli_query($conn,$query1);
echo "<script LANGUAGE='JavaScript'>
    window.alert('Account Created Succesfully');
    window.location.href='manage_users.php';
   </script>";  
       }  
}
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aapkaeshop - Add Products</title>
<?php include('include/__js_css.php');?>
<!-- Theme JS files -->
<link  type="text/css" src="assets/css/bootstrap-select.min.css"/>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.2/classic/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
<link type="text/css" href="assets/css/vpb_uploader.css" rel="stylesheet" />
<!--<script type="text/javascript" src="assets/js/jquery_1.5.2.js"></script>-->


<!-- /theme JS files -->
</head>

<body>
<?php include('include/__header.php');?>
<!-- Page header -->
<div class="page-header">
<div class="page-header-content">
	<div class="page-title">
		<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Products</span> - Add Products</h4>
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
				<form action="" method="POST" enctype="multipart/form-data">

					<div class="panel panel-flat">
						<div class="panel-body">
					<div class="row">
                   <div class="col-md-6">
                   
					<div class="form-group">
					<label>Full Name:</label>
					<input type="text" placeholder="Full Name" class="form-control" name="name" required>
					</div>
					<div class="form-group">
					<label>Email:</label>
					<input type="text" placeholder="Email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
					<label>Mobile:</label>
					<input type="text" placeholder="Mobile" class="form-control" name="mobile" required>
					</div>
					<div class="form-group">
					<label>Shop Name:</label>
					<input type="text" placeholder="Shop Name" class="form-control" name="shop_name" required>
					</div>
					<div class="form-group">
					<label>Shop Category</label>
					<?php
					include 'includes/conn.php';
						
						$cat=$conn->query("select * from category ");
						if($cat->num_rows>0)
						{
							?>
							<select id="country" name="category_id" class="form-control" required>
							<option disabled>Select Category</option>
							<?php
							while($cat_rows= $cat->fetch_assoc())
							{
								?>
								<option value="<?php echo $cat_rows['cat_id']?>"><?php echo $cat_rows['cat_name']?></option>
								<?php
							}
							?>
							</select>
							<?php
						}
					?>
					</div>
				          
				
                     
                     <div class="form-group">
											<label>Address</label>
											<input type="text" placeholder="Address" class="form-control" name="address" >
										</div> 
										 <div class="form-group">
											<label>Pincode</label>
											<input type="text" placeholder="Pincode" class="form-control" name="pincode" >
										</div>
										 <div class="form-group">
											<label>Password</label>
											<input type="password" placeholder="Password" class="form-control" name="password" >
										</div>
										
                      </div>
                 

								</div>
                           
                    


<button type="submit" name="register" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>


<!-------------------------------------------------------------------------->

					

				</div>

					</div>

			</form>
							
						
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


<script>



function validate(evt)

{

if(evt.keyCode!=8)

{

var theEvent = evt || window.event;

var key = theEvent.keyCode || theEvent.which;

key = String.fromCharCode(key);

var regex = /[0-9]|\./;

if (!regex.test(key))

{

    theEvent.returnValue = false;



    if (theEvent.preventDefault)

        theEvent.preventDefault();

    }

}

}

</script>

<script>



function set_option_value(id,increment_id){



$.ajax({



url:'ajax/get_option_value.php',



type:'post',



data:{'id':id},



success:function(data){



  //alert(data);



 if(data!=""){

	$("#option_value_"+increment_id).html(data);



  }



 },



 });





}

</script>





<script>

ClassicEditor

.create( document.querySelector( '#description' ) )

.catch( error => {console.error( error );

});

</script>

<script>

ClassicEditor

.create( document.querySelector( '#short_description' ) )

.catch( error => {console.error( error );

});

</script>



<style>

.new_legend{

background-color: #535965;

color: white;

padding: 8px !important;

font-size: 15px;	

}

</style>
<!------------------------------------------------------------>
