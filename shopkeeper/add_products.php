<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
include('lib/auth.php');
include('lib/functions.php');
include('lib/get_functions.php');

date_default_timezone_set("Asia/Kolkata");

$date=date('Y-m-d H:i:s');

if(isset($_POST['submit'])){
	
    $file_name1=$_FILES["feature_img"]["name"];
//if($_FILES['feature_img']['error']==0)
  //         {
               
    //           move_uploaded_file($_FILES['feature_img']['tmp_name'],"../images/product/".$file_name1);
      //     }
        //   else
          // {
            //   echo"upload failed<br>";
           //}






 //          product_name
//mrp
//discount_mrp
//short_description
//description
//feature_img

$product_name=$_POST['product_name'];
$mrp=$_POST['mrp'];
$discount_mrp=$_POST['discount_mrp'];
//$type=$_POST['type'];
$short_description=$_POST['short_description'];
$description=$_POST['description'];
$shop_id=$_POST['shop_id'];



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Posted Values


    $errors     = array();
    //$maxsize    = 2097152;
    $maxsize    = 300000;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/png'
    );

    if(($_FILES['feature_img']['size'] >= $maxsize) || ($_FILES["feature_img"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 300 Kb.';
    }

    if((!in_array($_FILES['feature_img']['type'], $acceptable)) && (!empty($_FILES["feature_img"]["type"]))) {
        $errors[] = 'Invalid file type. Only JPG And PNG types are accepted.';
    }

    if(count($errors) === 0) {
 move_uploaded_file($_FILES['feature_img']['tmp_name'],"../images/product/".$file_name1);
 $sql="INSERT INTO product(product_name, shop_id, mrp, discount_mrp, short_description, description, feature_img, cdate)
 VALUES('$product_name','".$_SESSION['id']."', '$mrp', '$discount_mrp','$short_description', '$description', '$file_name1','$date')";
$product=mysqli_query($conn,$sql);
if ($product) {
// Skip file if any error found
      
	
$lastkey=mysqli_insert_id($conn);
	$subs=$conn->query("SELECT * FROM `subscription` WHERE `shop_id`='".$_SESSION['id']."'");
	if($subs->num_rows>0)
	{
		while($subs_rows= $subs->fetch_assoc())
		{
			$email=$subs_rows['email'];
			$subject = 'Aapkaeshop - New Product Alert'; 

			$random_hash = md5(date('r', time())); 
			
			$headers = "From: info@aapkaeshop.com \r\nReply-To: info@aapkaeshop.com";
			
			$headers .= "MIME-Version: 1.0\r\n";
			
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$message = '<html>
						<body>';
			
			$message .= '<table width="600" border="0" cellpadding="2" cellspacing="2">' ;
					 
			$message .= '<tr>
							<td><b>Hi!</b> ,'.$subs_rows['name'].'</td>
						</tr>';
			
			 
			$message .= '<tr>
				<td><br/>'.$_SESSION['name'].' added new Product check it out .</td></tr>' ;
			$message .= '<tr>
				<td><br/><a href="http://www.aapkaeshop.com/product-detail.php?id='.$lastkey.'">Click here to visit</a> .</td></tr>' ;
			
			$message .= '<tr>
				<td><br/>Thanks, <br/> <b>Aapkaeshop</b></td></tr>' ;
			
			
			$message .= '</table>';
			
			$message .= "</body></html>";
			
			$mail_sent = @mail( $email, $subject, $message, $headers );
		}
	}


$path='../images/product-gallery/';

foreach ($_FILES['img']['name'] as $f => $img) {
$multi_img=$img;	
   if ($_FILES['img']['error'][$f] == 4) {
       continue; // Skip file if any error found
   }	      
   elseif ($_FILES['img']['error'][$f] == 0) 
	{
	   move_uploaded_file($_FILES['img']['tmp_name'][$f],"../images/product-gallery/".$multi_img);
	}
	else
	{
	   echo"upload failed<br>";
	}
	$image=$conn->query("INSERT INTO `product_slider` SET 
		          user_id='".$_SESSION['id']."',
                  p_id='".$lastkey."',
				  image_name='".$multi_img."'");

	}   

echo "<script>alert('Product add Successfully');

window.location.href='add_slider.php';

</script>";
}
        //move_uploaded_file($_FILES['feature_img']['tmpname'], '/store/to/location.file');
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//$product=$conn->query("INSERT INTO product(name) VALUES ('$collage_name')");



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
                   	<?php
						
						$cat=$conn->query("select * from shop_details where user_id='".$_SESSION['id']."'");
						if($cat->num_rows>0)
						{
					
							while($shop_rows= $cat->fetch_assoc())
							{
								$shop_id= $shop_rows['shop_id'];
								?>
							

<input type="hidden" name="shop_id" value="<?php echo $shop_id;?>">
						<?php		
							}
						
						}
					?>
					<div class="form-group">
					<label>Product Name:</label>
					<input type="text" placeholder="Product Name" class="form-control" name="product_name" required>
					</div>
					<!--<div class="form-group">
					<label>Product Category</label>
					<?php
						
						$cat=$conn->query("select * from category ");
						if($cat->num_rows>0)
						{
							?>
							<select id="country" name="type" class="form-control" required>
							<option>Select Category</option>
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
					<label>Sub-Category</label>
					<select id="state" name="type1" class="form-control">
                      <option value="">Select Category First</option>
                    </select>
					</div>-->
                       <div class="form-group">
											<label>MRP</label>
											<input type="text" placeholder="MRP" class="form-control" name="mrp" >
										</div>     
                     <div class="form-group">
											<label>Discount MRP</label>
											<input type="text" placeholder="Discount MRP" class="form-control" name="discount_mrp" >
										</div> 
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">Short Description</label>
                                            <textarea rows="5" cols="5" class="form-control" id="short_description" name="short_description" ></textarea>
		                               	</div>
                      <div class="form-group">

									<label>Description:</label>

									<textarea rows="5" cols="5" class="form-control" id="description" name="description" ></textarea>

								</div>                  
	                      </div>

								</div>
                     <div class="row">
								<div class="col-md-3">
                                    <div class="form-group">
									<label>Product Image:</label>
										<input type="file" name="feature_img" id="feature_img" required/>
										</div>
                                    </div>
                                </div>           
                    <!--<div class="row">
						<div class="col-md-12">
							<fieldset>
			                	<legend class="text-semibold new_legend">Images Slider Gallery <span style="font-size: 11px;
font-weight: 700;">(Here you can choose more then one image at same time)</span></legend>
								<div class="row">
								<div class="col-md-12">
                                    <div class="form-group">
                                               <label>Other Images:</label>
                                                <input type="file" name="img[]" id="img" multiple/>
                                     </div>
                                     </div>
								</div>

						</fieldset>

								</div>

					</div>-->

					 <!-- <div class="row">

								<div class="col-md-12">

									<fieldset>

					                	<legend class="text-semibold new_legend">Other Product Images <span style="font-size: 11px;

    font-weight: 700;">(Here you can choose more then one image at same time)</span></legend>



										<div class="row">

											<div class="col-md-12">

                                            <div class="form-group">

                                                       <label>Other Images:</label>

                                                        <input type="file" name="img[]" id="img" multiple/>

                                             </div>

                                             </div>

                                            

										</div>

								</fieldset>

       								</div>

							</div>-->
<!--------------------------------------------------------------------->


<button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>


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
