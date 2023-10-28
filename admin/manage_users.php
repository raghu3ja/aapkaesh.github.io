<?php
session_start();

include "../includes/conn.php";

include('lib/auth.php');

include('lib/get_functions.php');

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



	<title>Aapkaeshop -Manage Shopkeepers</title>



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



				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Shopkeeper</span> - Manage Shopkeepers</h4>

               <ul class="breadcrumb breadcrumb-caret position-right">



					<li><a href="home.php">Home</a></li>



					<li><a href="manage_users.php">Manage Shopkeepers</a></li>



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

                

             

                <table class="table datatable-basic table-striped">



						<thead>



							<tr>


                               <!-- <th><input type="checkbox" id="selectall" name="selectall"></th> -->
								
                              
  <th>Date</th>
                                <th>Name</th>
                              <th>Email ID</th>
								 <th>Password</th>
                                 <th>Mobile No</th>
                                  <th>Shop Name</th>
                                   <th>Address</th>
                                    <th>Pincode</th>
                                    
                                

                                <th>Delete</th>


							</tr>



						</thead>



						<tbody>



						 <?php 
						 
						
								$cat=$conn->query("select * from shopkeeper_register");
								if($cat->num_rows>0)
								{
									$i=1; 
									while($cat_rows= $cat->fetch_assoc())
										{?>

                                <tr>

                              
                                
                                <td><?php echo date('Y-m-d H:i:s',strtotime($cat_rows['cdate']));?></td>

                                <td><?php echo $cat_rows['name'];?></td>
                                <td><?php echo $cat_rows['email'];?></td>
                                <td><?php echo $cat_rows['password'];?></td>
                                <td><?php echo $cat_rows['mobile'];?></td>
                                <td><?php echo $cat_rows['shop_name'];?></td>
                                <td><?php echo $cat_rows['address'];?></td>
                                <td><?php echo $cat_rows['pincode'];?></td>
                                
                               
                                                           
                                
                           
                                <td width="15%"><a href="delete_users.php?id=<?php echo $cat_rows['id'];?>" onClick="global_delete('category','cat_id',<?php echo $cat_rows['cat_id'] ?>);"><i class="icon-cancel-circle2"></i> Delete</a></td>
                                

                               

                                <?php /*?><td class="text-center">

									<ul class="icons-list">

										<li class="dropdown">

											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

												<i class="icon-menu9"></i>

											</a>



											<ul class="dropdown-menu dropdown-menu-right">

												<li><a href="edit_party.php?id=<?php echo $res['id'];?>"><i class="icon-pencil7"></i> Edit</a></li>

												<li><a href="javascript:void(0)" onClick="delete_party(<?php echo $res['id'] ?>);"><i class="icon-cancel-circle2"></i> Delete</a></li>

											</ul>

										</li>

									</ul>

								</td><?php */?>

                                </tr>

                        <?php 			} 
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

function delete_category(id){

   var retVal = confirm("Are you sure want to delete ?");

	if( retVal == true ){

      $.ajax({

	  url:'ajax/delete_category.php',

	  type:'post',

	  data:{'id':id},

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
$("#selectall").click(function(){
        if(this.checked){
            $('.checkboxall').each(function(){
                this.checked = true;
            })
        }else{
            $('.checkboxall').each(function(){
                this.checked = false;
            })
        }
    });
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
	  url:'ajax/delete_all_category.php',
	  type:'post',
	  data:{'val':values},
	  success:function(data){
		 //if(data==1){
		 location.reload();
		  //}
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



