<?php
session_start();
include '../includes/conn.php';
include('lib/auth.php');
date_default_timezone_set("Asia/Kolkata");



if (isset($_POST['submit'])) {
	//echo $_REQUEST['currentPassword'];exit;
    $result = mysqli_query($conn,"SELECT * FROM `shopkeeper_register` WHERE `id`='".$_SESSION['id']."' AND `password`='".$_REQUEST['currentPassword']."'");
    if(mysqli_affected_rows($conn)>0){
		if ($_POST["newPassword"] == $_POST["confirmPassword"]) {
        mysqli_query($conn, "UPDATE `shopkeeper_register` SET `password`='".$_POST["newPassword"]."' WHERE `id`='" . $_SESSION["id"] . "'");
        $message = "Password Changed";
		} else {$message = "Should be Match";}
	}
	else{
		$message = "Current Password is not correct";
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
<title>Aapkaeshop -Change Password</title>
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
		<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Change Password</span></h4>
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
				<form name="frmChange" action="" onSubmit="return validatePassword()"method="POST" enctype="multipart/form-data">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
			<div class="panel panel-flat">
			<div class="panel-body">
		   <div class="row">
		   <div class="col-md-6">
			<div class="form-group">
			<label>Change Password</label>
			</div>
					<div class="row">
                   <div class="col-md-6">
					<div class="form-group">
					<label>Current Password</label>
					<input type="password" placeholder="Current Password" class="form-control" name="currentPassword" required>
					</div>
                       <div class="form-group">
											<label>New Password</label>
											<input type="password" placeholder="New Password" class="form-control" name="newPassword" >
										</div>     
                     <div class="form-group">
											<label>Confirm Password</label>
											<input type="password" placeholder="confirmPassword" class="form-control" name="confirmPassword" >
										</div> 
					<button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                      </div>

							    



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