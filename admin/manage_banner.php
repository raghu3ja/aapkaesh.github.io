<?php  

session_start();

include "../includes/conn.php";

include('lib/get_functions.php');

include('lib/auth.php');

date_default_timezone_set("Asia/Kolkata");

$date=date('Y-m-d H:i:s');
?>


<!DOCTYPE html>



<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->



<head>



	<meta charset="utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge">



	<meta name="viewport" content="width=device-width, initial-scale=1">



	<title>ApkaEshop - Manage Banner</title>



<?php include('include/__js_css.php');?>

	<!-- Theme JS files -->



	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>



	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>



	<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>



	<!-- /theme JS files -->

</head>

<body>

<?php include('include/__header.php');?>

	<!-- Page header -->



	<div class="page-header">



		<div class="page-header-content">



			<div class="page-title">



				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Banner</span> - Manage Banner</h4>

               <ul class="breadcrumb breadcrumb-caret position-right">



					<li><a href="home.php">Home</a></li>



					<li><a href="banner.php">Manage Banner</a></li>



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



				<!-- Striped rows -->



				<div class="panel panel-flat">

                

                <div class="panel-heading">

						<button type="button" class="btn bg-teal-400 btn-labeled" onClick="window.location.href='add_banner.php'"><b><i class="icon-add"></i></b> Add banner</button>
                        
                        
                        <button type="button" id="delete_all" class="btn btn-warning">Delete</button>

				</div>

                <table class="table datatable-basic table-striped">



						<thead>



							<tr>


                                <th><input type="checkbox" id="selectall" name="selectall"></th> 
								
                                <th>Date</th>
                                
                                

                                <th>Image</th>

                                <th>Edit</th>

                                <th>Delete</th>


							</tr>



						</thead>



						<tbody>



						 <?php 
						         $cat=$conn->query("SELECT * FROM `banner` ORDER BY bn_id DESC");
								if($cat->num_rows>0)
								{
									$i=1; 
									while($res= $cat->fetch_assoc())
										{
										     ?>

                                        <tr>
        
                                        <td><input type="checkbox" name="assign_id[]" id="assign_id_<?php echo $res['banner_id']; ?>" value="<?php echo $res['bn_id']; ?>" class="checkboxall"></td>
                                        
                                        <td><?php echo date('d-M-Y H:i:s',strtotime($res['cdate']));?></td>
                                        
										<td><img style="height: 50px;" src="img/banner/<?php echo $res['bn_img'];?>"></td>
                                        
        							    
                                        <td><a href="edit_banner.php?id=<?php echo $res['bn_id'];?>"><i class="icon-pencil7"></i> Edit</a></td>
                                       <td width="15%"><a href="delete_banner.php?id=<?php echo $res['bn_id'];?>" onClick="global_delete('banner','bn_id',<?php echo $res['bn_id'] ?>);"><i class="icon-cancel-circle2"></i> Delete</a></td>
                                        
        
                                       
        
                                        
                                        </tr>
        
                                <?php
										}
								}
						  ?>

					  	</tbody>

					</table>

				</div>
				<!-- /striped rows -->
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->

<?php include('include/__footer.php');?>

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
$('#delete_all').click(function(e){
    var values = [];
   $("input[name='assign_id[]']:checked").each( function () {
		values.push($(this).val());
	});
if(values!=""){
	var retVal = confirm("Are you sure want to Delete?");
	if( retVal == true ){
$.ajax({
	  url:'ajax/delete_all_banner.php',
	  type:'post',
	  data:{'val':values},
	  success:function(data){
		 if(data==1){
		 location.reload();
		  }
  		 },
 	 }); 	
	}
	else{
		return false;
		}
}
else{
	alert("Please Select First !!!");
	}
});
</script>


</body>



</html>



