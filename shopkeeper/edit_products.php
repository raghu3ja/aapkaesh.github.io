<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
include('lib/auth.php');
include('lib/functions.php');
include('lib/get_functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d H:i:s');
if(isset($_REQUEST['submit'])){
	$weight=implode(",",$_REQUEST['weight']);
	$flavour=implode(",",$_REQUEST['flavour']);
	$file_name1=$_FILES["feature_img"]["name"];
    $file_size1=$_FILES["feature_img"]["size"];
    $file_tmp1=$_FILES["feature_img"]["tmp_name"];


		$conn->query("UPDATE `product` SET 
		product_name='".$_REQUEST['product_name']."',
		established_year='".$_REQUEST['established_year']."',
		collage_location='".$_REQUEST['collage_location']."',
		short_spec='".mysqli_real_escape_string($conn, $_REQUEST['short_description'])."',
		specification='".mysqli_real_escape_string($conn, $_REQUEST['description'])."',
		cdate='".$date."'
		where p_id='".$_REQUEST['id']."'");
		if($conn->affected_rows>0)
		{
			//echo"without image";
		}
 
		
		
		else{
			
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

		  move_uploaded_file($file_tmp1,"../images/product/".$file_name1);
     
			//echo"$file_name1";exit;

			$conn->query("UPDATE `product` SET 
			product_name='".$_REQUEST['product_name']."',
		
		mrp='".$_REQUEST['mrp']."',
		feature_img='".$file_name1."',
		discount_mrp='".$_REQUEST['discount_mrp']."',
		short_description='".mysqli_real_escape_string($conn, $_REQUEST['short_description'])."',
		description='".mysqli_real_escape_string($conn, $_REQUEST['description'])."',
		cdate='".$date."'
		where p_id='".$_REQUEST['id']."'");
			echo "<script>alert('Product Update Successfully');

window.location.href='manage_products.php';

</script>";
			
		if($conn->affected_rows>0)
		{
			//echo"image";exit;
		}	


		  } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        
    }
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

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
	$image=$conn->query("INSERT INTO `product_images` SET 
                  product_id='".$_REQUEST['id']."',
				  image_name='".$multi_img."'");

	} 

echo "<script>window.location.href='manage_products.php'; </script>";
}
?>

<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Aapkaeshop - Edit Product</title>

<?php include('include/__js_css.php');?>
	<!-- Theme JS files -->
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.2/classic/ckeditor.js"></script>
    <link  type="text/css" src="assets/css/bootstrap-select.min.css"/>
    <script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->
</head>
<body>
<?php include('include/__header.php');?>
	<!-- Page header -->

<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Products</span> - Edit Products</h4>
               <ul class="breadcrumb breadcrumb-caret position-right">

					<li><a href="home.php">Home</a></li>

					<li><a href="manage_products.php">Manage Products</a></li>
                    
                    <li>Edit Products</li>

				</ul>

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
                        <?php
						
						$pro=$conn->query("select * from product where p_id='".$_REQUEST['pro_id']."' ");
						if($pro->num_rows>0)
						{
							$rs= $pro->fetch_assoc();
						}
						?>
						<!-- Basic layout-->
						<form action="" method="post" id="add_party" enctype="multipart/form-data">
							<div class="panel panel-flat">
								<div class="panel-body">
							<div class="row">
              					<div class="col-md-12">
									<fieldset>
					                <legend class="text-semibold new_legend"> Edit Product</legend>

										<div class="row">
                                 
                                
                                   
                           <div class="col-md-6">
                              <div class="form-group">
													<label>Product Name:</label>
													<input type="text" placeholder="Name" class="form-control" name="product_name" value="<?php echo $rs['product_name']?>" required>
												</div>
                                                
							<!--<div class="form-group">
								<label>Category</label>
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
											<option value="<?php echo $cat_rows['cat_id']?>" <?php if($rs['cat_id']==$cat_rows['cat_id']){echo"Selected";} ?>><?php echo $cat_rows['cat_name']?></option>
											<?php
										}
										?>
										</select>
										<?php
									}
								?>
							</div> -->
							
							
                    
                               <div class="form-group">
													<label>MRP</label>
													<input type="text" placeholder="Established Year" class="form-control" name="mrp" value="<?php echo $rs['mrp']?>">
												</div>     
                                                
                             <div class="form-group">
													<label>Discount MRP</label>
													<input type="text" placeholder="Collage Location" class="form-control" name="discount_mrp" value="<?php echo $rs['discount_mrp']?>">
												</div>
														
							
								
												
                                                
                                                    
                                                
                              </div>
                              
                              <div class="col-md-6">
                              
                              
                              
                              <div class="form-group">
                                                    <label class="form-label" for="exampleInputEmail1">Short Description</label>
                                                                            
                                                    <textarea rows="5" cols="5" class="form-control" id="short_description" name="short_description" ><?php echo $rs['short_description'];?></textarea>
				                               	</div>
                                                
                              <div class="form-group">
											<label>Description:</label>
											<textarea rows="5" cols="5" class="form-control" id="description" name="description" ><?php echo $rs['description'];?></textarea>
										</div>                  
                                                
                              </div>
                            
                                        
                                                   
                                            
                                            
										</div>
                                        
                                        
                                        <div class="row">
                                        
                                        <div class="col-md-1">
                                            <div class="form-group">
                                             <img src="../images/product/<?php echo $rs['feature_img'] ?>" style="height:50px; width:50px">
													
												</div>
                                            
                                            </div>
                                            
											<div class="col-md-3">
                                            <div class="form-group">
     									<label>Featured Image:</label>
												<input type="file" name="feature_img" id="feature_img"/>
												</div>
                                            
                                            </div>
                                        </div>
                                        
                                       <div class="row">
						
							</div> 
                                        
									</fieldset>
								</div>
                                
                                   <div class="row">
                                     <div class="col-md-12">
                                      
                                       <table class="table datatable-basic table-striped">

				

				

					</table>
                    
                    
                                      
                                      </div>                
                                   </div>
                                   
                                
                                   
                            <input type="hidden" value="<?php echo $_REQUEST['pro_id'];?>" name="id">
							<div class="text-right">
								<button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
							</div>
                            </div>
						</form>
						<!-- /basic layout -->

					</div>
				</div>
				<!-- /vertical form options -->
			</div>
	</div>
</div>
	
<?php include('include/__footer.php');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select Sub-Category first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select category first</option>');
            $('#city').html('<option value="">Select Sub-Category first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>

<script>
function global_delete(tablname,colname,id){
	var retVal = confirm("Are you sure want to delete ?");
	if( retVal == true ){
	$.ajax({
	url:'ajax/global_delete.php',
	type:'post',
	data:{'tablname':tablname,'colname':colname,'id':id},
	success:function(data){
	  //alert(data);
		//if(data==1){
		location.reload();
		// }
		},
	}); 
}else{
       return false;
   }
}
</script>

<script>

function delete_img(id){
	
   var retVal = confirm("Are you sure want to delete ?");
	if( retVal == true ){
      $.ajax({
	  url:'ajax/delete_product_img.php',
	  type:'post',
	  data:{'id':id},
	  success:function(data){
		  //alert(data);
		 if(data==1){
			 location.reload();
		  }
		 },
 	 }); 

   }else{

        return false;

   }
   
	}
</script>

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
<script>s

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


</body>

</html>

<style>
.new_legend{
background-color: #535965;
    color: white;
    padding: 8px !important;
    font-size: 15px;	
	}
</style>