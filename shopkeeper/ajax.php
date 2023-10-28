<?php 
session_start();
error_reporting(0);
include '../includes/conn.php';
require "img_upload/php/class.uploadImages.php";

$uploadImages = new uploadImages();

/* Images are required */
if ($uploadImages->countImages() > 0)
{
	
	 Default validation:
		$uploadImages->image_type = "jpg|jpeg|png|gif";
		$uploadImages->min_size = "";
		$uploadImages->min_size = 24;
		$uploadImages->max_size = (324*424*1);
		$uploadImages->max_files = 10;
	
	
	 Validate */
	if ($uploadImages->validateImages())
	{
		print("<h3 class='text-info'>IMAGES</h3>");
		/* images array */
		$images = $uploadImages->getImages();
		foreach ($images as $image)
		{
			/* save the image */
			if ($uploadImages->saveImage($image["tmp_name"], "../images/product-gallery/", $image["name"]))
			{
$myarray=$uploadImages->getParams();
$image1=$conn->query("INSERT INTO `product_slider` SET 
		         shop_id='".$_SESSION['id']."',
                p_id='".$myarray['project_name']."',
			  image_name='".$image["name"]."'");
	

				/print ("<p class='text-success'>· <strong>" . $image["name"] . "</strong> saved in images folder</p>");/
}

}
if($image1)
{
	echo "<script>alert('Product Slider Updated Sucessfully');

window.location.href='manage_slider.php';

</script>";
}
else
{
	echo "string";
}


			}
			else
			{

				print("<p class='text-danger'>· " . $image["name"] . "Your image size more than 2 MB. You can upload maximum image size = (320*424*1)</p>");
			}
		}

		/* GET EXTRA PARAMETERS */
		//echo "string".$uploadImages['project_name'];
		print("<h3 class='text-info'>EXTRA PARAMETERS</h3>");
		$myarray=$uploadImages->getParams();
		//print_r($myarray);

		//echo $myarray['project_name'];
	

