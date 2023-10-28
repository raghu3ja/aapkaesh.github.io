
<?php  
session_start();
error_reporting();
echo //$pid=$_POST['product_id'];
include '../includes/conn.php';
include('lib/auth.php');
include('lib/functions.php');
include('lib/get_functions.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('y-m-d H:i:s');


?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aapkaeshop - Add Slider</title>
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
		<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Slider</span> - Add Slider</h4>
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
				
							<!--------------------------------------------------------------------->
<!--<fieldset>

					                	<legend class="text-semibold new_legend">Other Product Images <span style="font-size: 11px;

    font-weight: 700;">(Here you can choose more then one image at same time)</span></legend>




								</fieldset>-->

	<div class="container" style="padding-top: 50px;">
 <form method="post" id="form" enctype="multipart/form-data">  
<div class="form-group">
					<label>Product Name</label>
					<?php
						
						$cat=$conn->query("SELECT * from product WHERE shop_id='".$_SESSION['id']."' ");
						if($cat->num_rows>0)
						{
							?>
							<select name="project_name" id="project_name" class="form-control" required>
							<option>Select Product</option>
							<?php
							while($cat_rows= $cat->fetch_assoc())
							{
								?>
								<option value="<?php echo $cat_rows['p_id']?>"><?php echo $cat_rows['product_name']?></option>
								<?php
							}
							?>
							</select>
							<?php
													}

					?>
					</div>

             <!-- <div class="form-group">
				<label for="project_name">Project Name:</label>
					<input type="text" class="form-control"/>
				</div>-->
				<div class="form-group">
					<input type="file" multiple class="btn btn-primary" />
				</div>
				
				<div class="form-group">
					Images: <span class="badge count-images">0</span>
				</div>
				<div class="form-group">
					<button type="button" id="btn" class="btn btn-primary">UPLOAD IMAGE</button>(Max 6 Images, Size 300kb)
				</div>
				
				
				
				
	          	</form>
		<!--<form method="post" id="form" class="form-inline" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" multiple class="btn btn-primary" />
				</div>
				<div class="form-group">
				<label for="project_name">Project Name:</label>
					<input type="text" class="form-control" id="project_name" />
				</div>
				<div class="form-group">
					<button type="button" id="btn" class="btn btn-primary" disabled><span class="glyphicon glyphicon-save"></span></button>
				</div>
				<div class="form-group">
					Images: <span class="badge count-images">0</span>
				</div>
		</form>-->
		<div id="upload-preview"></div>

	</div>
<div class="text-right">
INSERT INTO `product_slider`(`id`, `p_id`, `shop_id`, `image_name`, `cdate`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5]
						

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


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

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

<link href='http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'/>
<script src='http://code.jquery.com/jquery.js'></script>
<script src='http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<!-- jQuery Plugin - upload multiple images ajax -->
<script src='img_upload/js/uploadImages.js'></script>
<script>
$(function(){

/* Check File API compatibility */	
if (!$.fileReader()){
	alert("File API is not supported on your browser");
}
else{
	console.log("File API is supported on your browser");
}

/* createImage Event */
$(document).on("createImage", function(e){
	console.log(e.file.name);
	console.log(e.file.size);
	console.log(e.file.type);
});

/* deleteImage Event */
$(document).on("deleteImage", function(e){
	console.log(e.file.name);
	console.log(e.file.size);
	console.log(e.file.type);
	/* if not there are images, the button is disabled */
	if ($("#upload-preview").countImages() == 0)
	{
		$("#btn").attr("disabled", "disabled");
	}
});
	
/* Prevent form submit */
$("#form").on("submit", function(e){
	e.preventDefault();
});
	
/* Preview and Validate */
$("#form input[type='file']").on("change", function(){
	
	$("#upload-preview").uploadImagesPreview("#form", 
	{

		image_type: "jpg|jpeg|png|gif",
		min_size: 24,
		max_size: (1024*300), /* 3 Mb */
		max_files: 6
	}, function(){
		switch(__errors__upload__) /* Check the possibles erros */
		{
			case 'ERROR_CONTENT_TYPE': alert("Error content type"); break;
			case 'ERROR_MIN_SIZE': alert("Error min size"); break;
			case 'ERROR_MAX_SIZE': alert("Error max size"); break;
			case 'ERROR_MAX_FILES': alert("Error max files"); break;
			default: $("#btn").removeAttr("disabled"); break; /* Activate the button Form */
		}
	});
});

/* Send form */
$("#btn").on("click", function(){
	
	/*images are required */
	if ($("#upload-preview").countImages() > 0)
	{
		$("#upload-preview").uploadImagesAjax("ajax.php", {
			params: {project_name: $("#project_name").val()},
			 /* Set the extra parameters here */
			beforeSend: function(){console.log("Sending ...");},
			success: function(data){$("#upload-preview").html(data); $("#form").fadeOut();},
			error: function(e){console.log(e.status);console.log(e.statusText);},
			complete: function(){console.log("Completed");}
		});
	}
	else{ // The button is not activated
		$(this).attr("disabled", "disabled");
	}
});
});
</script>

<style>
.img-responsive{
	max-width: 150px;
}
</style>


