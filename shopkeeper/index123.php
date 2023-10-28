<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vasplus Programming Blog| Fancy Multiple File Upload using Ajax, Jquery and PHP</title>




<!-- Required Header Files -->
<link type="text/css" href="assets/css/vpb_uploader.css" rel="stylesheet" />
<script type="text/javascript" src="assets/js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="assets/js/vpb_uploader.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	// Call the main function
	new vpb_multiple_file_uploader
	({
		vpb_form_id: "vasplus_form_id", // Form ID
		autoSubmit: true,
		vpb_server_url: "vpb_uploader.php" // PHP file for uploading the browsed files

	});
});
</script>








</head>
<body>
<br clear="all" />
<center><div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;" align="center">Fancy Multiple File Upload using Ajax, Jquery and PHP</div></center>
<br clear="all" /><br clear="all" />

















<!-- Browse and Submit Added Giles Area -->	
<center><div style="width:800px; margin-top:20px;" align="center">
<form name="vasplus_form_id" id="vasplus_form_id" action="javascript:void(0);" enctype="multipart/form-data">

<div style="width:300px;" align="center">
<div style="width:230px; float:left;" align="right">
<div class="vpb_browse_file_box"><input type="file" name="vasplus_multiple_files" id="vasplus_multiple_files" multiple="multiple" style="opacity:0;-moz-opacity:0;filter:alpha(opacity:0);z-index:9999;width:90px;padding:5px;cursor:default;" /></div>
</div>
<div style="width:70px; float:left;" align="left">
<input type="submit" value="Upload" class="vpb_general_button" />
</div><br clear="all">
</div>
</form>
</div></center>


<br clear="all" /><br clear="all" />



<!-- Uploaded Files Displayer Area -->	
<div id="vpb_added_files_box" class="vpb_file_upload_main_wrapper">
<div id="vpb_file_system_displayer_header"> 
<div id="vpb_header_file_names"><div style="width:365px; float:left;">File Names</div><div style="width:90px; float:left;">Status</div></div>
<div id="vpb_header_file_size">Size</div>
<div id="vpb_header_file_last_date_modified">Last Modified</div><br clear="all" />
</div>
<input type="hidden" id="added_class" value="vpb_blue">
<span id="vpb_removed_files"></span>
</div>























<p style="padding-bottom:400px;">&nbsp;</p>
</body>
</html>