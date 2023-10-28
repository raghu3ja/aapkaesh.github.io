<?php  
session_start();

include "../includes/conn.php";

include('lib/get_functions.php');

include('lib/auth.php');

date_default_timezone_set("Asia/Kolkata");

$date=date('Y-m-d H:i:s');



//$sel=dbQuery("SELECT * FROM `category` WHERE id='".$_REQUEST['id']."'");
//$res=mysql_fetch_assoc($cat);


if(isset($_REQUEST['submit'])){

	

	//$file_name1=$_FILES["feature_img"]["name"];
//if($_FILES['feature_img']['error']==0)
       //    {
         //      
           //    move_uploaded_file($_FILES['feature_img']['tmp_name'],"images/category/".$file_name1);
          // }
          // else
          // {
           //    echo"upload failed<br>";
          // }
		$cat=$conn->query("UPDATE `category` SET 
		cat_name='".$_REQUEST['name']."', cdate='".$date."'
		where cat_id='".$_REQUEST['id']."'");
	
	
	/*$file_name1=$_FILES["feature_img"]["name"];
    $file_size1=$_FILES["feature_img"]["size"];
    $file_tmp1=$_FILES["feature_img"]["tmp_name"];
    $file_type1=$_FILES["feature_img"]["type"];
	
	if($file_name1=="")
		{
		include('lib/connectdb.php');
		$cat=$conn->query("UPDATE `category` SET 
		category_name='".$_REQUEST['name']."',
		
		date_added='".$date."'
		where category_id='".$_REQUEST['id']."'");
		
		}
		else
		{
			if($_FILES["feature_img"]["error"]==0)
            {
                move_uploaded_file($_FILES["feature_img"]["tmp_name"],"../assets/images/category/".$file_name1);
            }
            else
            {
                $img="upload failed<br>";
            }
  
    
		include('lib/connectdb.php');
		$sub=$conn->query("UPDATE `category` SET 
			category_name='".$_REQUEST['name']."',
			image='".$file_name1."',
			date_added='".$date."'
			where category_id='".$_REQUEST['id']."'");
		}*/
		
	echo "<script>alert('Category Update Successfully');

window.location.href='manage_category.php';

</script>";			
	
//$ins=dbQuery("UPDATE `category` SET category_name='".$_REQUEST['name']."' WHERE category_id='".$_REQUEST['id']."'");



}

?>



<!DOCTYPE html>



<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->



<head>



	<meta charset="utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge">



	<meta name="viewport" content="width=device-width, initial-scale=1">



	<title>Aapkaeshop - Edit Category</title>



<?php include('include/__js_css.php');?>

	<!-- Theme JS files -->

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



				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Categories</span> - Edit Category</h4>

               <ul class="breadcrumb breadcrumb-caret position-right">



					<li><a href="home.php">Home</a></li>



					<li><a href="manage_category.php">Manage Category</a></li>

                    

                    <li><a href="edit_category.php">Edit Category</a></li>



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



						<!-- Basic layout-->
<?php
include('lib/connectdb.php');
$cat=$conn->query("select * from category where cat_id='".$_REQUEST['id']."'");
if($cat->num_rows>0)
{
	$cat_rows= $cat->fetch_assoc();
	?>
	<form action="" method="post" id="add_party" enctype="multipart/form-data">

							<div class="panel panel-flat">

								<div class="panel-body">

							<div class="row">

								<div class="col-md-12">

									<fieldset>

					                	<legend class="text-semibold"> Edit Category</legend>



										<div class="row">

											<div class="col-md-6">
													
												<div class="form-group">

													<label>Name:</label>
								
													<input type="text" placeholder="Name" class="form-control" value="<?php echo $cat_rows['cat_name']; ?>" name="name" required>

												</div>
												<!--<div class="form-group">
									<label>Category Image:</label>
										<input type="file" name="feature_img" id="feature_img" value="<?php echo $cat_rows['image']; ?>" required/>
										</div>-->
                                                
                                                
                                                
                                                
                                                
                                                
											</div>

										</div>
										<!--<div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                             <img src="../assets/images/category/<?php echo $cat_rows['image'] ?>" style="height:50px; width:50px">
													
												</div>
                                            
                                            </div>
                                            
											<div class="col-md-3">
                                            <div class="form-group">
     									<label>Featured Image:</label>
												<input type="file" name="feature_img" accept="image/*" id="feature_img"/>
												</div>
                                            
                                            </div>
                                        </div>-->

									</fieldset>

                                    
				<input type="hidden" value="<?php echo $cat_rows['cat_id'];?>" name="id">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>

								</div>

							</div>

						</div>

							</div>

						</form>
	
	<?php
}
?>
						

						<!-- /basic layout -->



					</div>

				</div>

				<!-- /vertical form options -->

			</div>

	</div>

</div>

<?php include('include/__footer.php');?>





</body>



</html>



