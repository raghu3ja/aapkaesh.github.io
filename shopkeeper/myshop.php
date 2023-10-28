<?php  
session_start();
error_reporting(0);
include "../includes/conn.php";
include('lib/auth.php');
include('lib/functions.php');
include('lib/get_functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('y-m-d');
if (isset($_POST['submit']))
{
$shop_name=$_POST['shop_name'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$shop_address=$_POST['shop_address'];
$pincode=$_POST['pincode'];
$shop_id=$_POST['shop_id'];
$cat_id1=$_POST['cat_id1'];
$file_name1=$_FILES["feature_img"]["name"];
$file_size1=$_FILES["feature_img"]["size"];
$file_tmp1=$_FILES["feature_img"]["tmp_name"];


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
 move_uploaded_file($file_tmp1,"../images/shop-images/".$file_name1);
        
$sql="UPDATE shopkeeper_register set cat_id='$cat_id1',shop_name='$shop_name', mobile='$mobileno', email='$email', address='$shop_address', pincode='$pincode',  shop_img='$file_name1' WHERE id='".$_SESSION['id']."'";
  
 $inse=mysqli_query($conn,$sql);
 if($inse)
 {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Shop Details Updated Successfully');
       </script>"; 
 }
 else
 {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Something Wrong');
       </script>"; 
 }
        //move_uploaded_file($_FILES['feature_img']['tmpname'], '/store/to/location.file');
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }
        
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aapkaeshop - Shop Details</title>
<?php include('include/__js_css.php');?>
<!-- Theme JS files -->
<link  type="text/css" src="assets/css/bootstrap-select.min.css"/>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.2/classic/ckeditor.js"></script>
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
		<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Shop</span> - My Shop</h4>
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
            <?php
             $cat=$conn->query("SELECT * from shopkeeper_register where id='".$_SESSION['id']."'");
            if($cat->num_rows>0)
            {
          
              while($shop_rows= $cat->fetch_assoc())
              {   
              ?> 
                 <div class="col-md-8">
					<div class="form-group">
					<label>Shop Name:</label>
					<input type="hidden" name="shop_id" value="<?php echo $_SESSION['id']; ?>">
					<input type="text" placeholder="Name" class="form-control" value="<?php echo $shop_rows['shop_name']; ?>" name="shop_name" readonly>
					</div>
                   </div>
                <div class="col-md-8">
					<div class="form-group">
					<label>Mobile No:</label>
					<input type="text" placeholder="Mobile No" class="form-control" value="<?php echo $shop_rows['mobile'];; ?>" name="mobileno" required>
					</div>
                   </div>
                <div class="col-md-8">
					<div class="form-group">
					<label>email:</label>
					<input type="text" placeholder="email" class="form-control" value="<?php echo $shop_rows['email'];; ?>" name="email" required>
					</div>
                   </div>
                <div class="col-md-8">
                   <div class="form-group">
                    <label>Category</label>
                 <?php
                  
                  $cat=$conn->query("SELECT * from category");
                  if($cat->num_rows>0)
                  {
                    ?>
                    <select id="country" name="cat_id1" class="form-control" required>
                    
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
              </div> 
            </div>
              
                 <div class="col-md-8">
					<div class="form-group">
					<label>Shop Address:</label>
					<input type="text" placeholder="Shop Address:"  value="<?php echo $shop_rows['address']; ?>" class="form-control" name="shop_address" required>
					</div>
                   </div>
                
                 <div class="col-md-8">
					<div class="form-group">
					<label>Pincode:</label>
					<input type="text" placeholder="Pincode"  value="<?php echo $shop_rows['pincode']; ?>" class="form-control" name="pincode" readonly>
					</div>
        
                                        
                                        <div class="col-md-1">
                                            <div class="form-group">
                                             <img src="../images/shop-images/<?php echo $shop_rows['shop_img'] ?>" style="height:50px; width:50px">
                          
                        </div>
                                            
                                            </div>
                                            
                      <div class="col-md-3">
                                            <div class="form-group">
                      <label>Featured Image:</label>
                        <input type="file" name="feature_img" id="feature_img"/>
                        </div>
                                            
                                            </div>
                                  
                   </div>

                 </div>
                 <?php
              }
            
            }
          ?>              
  
					<div class="text-left">

						<button type="submit" name="submit" class="btn btn-primary">    Submit   <i class="icon-arrow-right14 position-right"></i></button>

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