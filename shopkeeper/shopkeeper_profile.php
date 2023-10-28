<?php  
session_start();
error_reporting(0);
include('lib/connectdb.php');
include('lib/auth.php');
include('lib/functions.php');
include('lib/get_functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d H:i:s');
if(isset($_REQUEST['submit'])){
    $file_name1=$_FILES["feature_img"]["name"];
if($_FILES['feature_img']['error']==0)
           {
               
               move_uploaded_file($_FILES['feature_img']['tmp_name'],"images/product/".$file_name1);
           }
           else
           {
               echo"upload failed<br>";
           }
$collage_name=$_REQUEST['collage_name'];
$established_year=$_REQUEST['established_year'];
$collage_location=$_REQUEST['collage_location'];
$type=$_REQUEST['type'];
$type1=$_REQUEST['type1'];
$short_description=$_REQUEST['short_description'];
$description=$_REQUEST['description'];


//$product=$db->query("INSERT INTO product(name) VALUES ('$collage_name')");

$sql="INSERT INTO product(name, category_id, sub_id, established_year, collage_location, short_spec, specification, image) VALUES('$collage_name', '$type', '$type1', '$established_year','$collage_location', '$short_description', '$description', '$file_name1')";

$product=mysqli_query($db,$sql);
	

if ($product) {
// Skip file if any error found
      


echo "<script>alert('Collage add Successfully');

window.location.href='manage_collage.php';

</script>";
}
else
{
	echo "string";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aapkaeshop - Shopkeeper Profile</title>
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
		<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Profile</span> - My Profile</h4>
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
				<form action="" method="POST" id="add_party">
					<div class="panel panel-flat">
						<div class="panel-body">
					<div class="row">
                   <div class="col-md-8">
					<div class="form-group">
					<label>Name:</label>
					<input type="text" placeholder="Name" class="form-control" name="shopkrrper_name" required>
					</div>
                   </div>
                    <div class="col-md-8">
					<div class="form-group">
					<label>Email:</label>
					<input type="text" placeholder="Name" class="form-control" name="shopkrrper_name" required>
					</div>
                   </div>
                
                 <div class="col-md-8">
					<div class="form-group">
					<label>Mobile:</label>
					<input type="text" placeholder="Name" class="form-control" name="shopkrrper_name" required>
					</div>
                   </div>
                                 </div>
                            
               
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