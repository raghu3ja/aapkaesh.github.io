<?php  

session_start();

include('lib/connectdb.php');

include('lib/auth.php');

include('lib/get_functions.php');

date_default_timezone_set("Asia/Kolkata");

?>



<!DOCTYPE html>



<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->



<head>



	<meta charset="utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge">



	<meta name="viewport" content="width=device-width, initial-scale=1">



	<title>Aapkaeshop - Manage Category</title>



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



				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Category</span> - Manage Category</h4>

               <ul class="breadcrumb breadcrumb-caret position-right">



					<li><a href="home.php">Home</a></li>



					<li><a href="manage_category.php">Manage Category</a></li>



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

						<button type="button" class="btn bg-teal-400 btn-labeled" onClick="window.location.href='add_category.php'"><b><i class="icon-add"></i></b> Add Category</button>

				</div>

                <table class="table datatable-basic table-striped">



						<thead>



							<tr>


                               <!-- <th><input type="checkbox" id="selectall" name="selectall"></th> -->
								
                                <th>Date</th>

                                <th>Name</th>
                                <th>Image</th>
								
								
								<!--<th>Is_Featured</th>-->
								
                                
                                <th>Edit</th>

                                <th>Delete</th>


							</tr>



						</thead>



						<tbody>



						 <?php 
						 
						 include('lib/connectdb.php');
								$cat=$db->query("select * from category ");
								if($cat->num_rows>0)
								{
									$i=1; 
									while($cat_rows= $cat->fetch_assoc())
										{?>

                                <tr>

                                <!--<td><input type="checkbox" name="assign_id[]" id="assign_id_<?php echo $cat_rows['cat_id']; ?>" value="<?php echo $cat_rows['cat_id']; ?>" class="checkboxall"></td>-->
                                
                                <td><?php echo date('d-m-Y',strtotime($cat_rows['date_added']));?></td>

                                <td><?php echo $cat_rows['cat_name'];?></td>
                                <td><img src="images/category/<?php echo $cat_rows['image'];?>" style="height:50px; width:50px"/>
                                	</td>
								<!--<td><img src="../assets/images/category/<?php echo $cat_rows['cat_image'];?>" style="height:50px; width:50px"/></td>-->                          
								<!--<td>
								<select name="is_featured" id="is_featured" class="form-control" onChange="set_featured(this.value,'category','cat_id',<?php echo $cat_rows['cat_id'];?>)">
                                       <option value="0" <?php if($cat_rows['is_featured']==0){echo "selected";}else{echo "";} ?> >No</option>
                                       <option value="1" <?php if($cat_rows['is_featured']==1){echo "selected";}else{echo "";} ?>>Yes</option>
                                </select>
								</td>   -->                              
                                
                                <td><a href="edit_category.php?id=<?php echo $cat_rows['cat_id'];?>"><i class="icon-pencil7"></i> Edit</a></td>
                                <td width="15%"><a href="javascript:void(0)" onClick="global_delete('category','cat_id',<?php echo $cat_rows['cat_id'] ?>);"><i class="icon-cancel-circle2"></i> Delete</a></td>
                                

                               

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

<script>
//function set_featured(val,tablname,colname,id)
//{
//$.ajax({
//url: 'ajax/set_featured.php',
//	data:{'val':val,'tablname':tablname,'colname':colname,'id':id,} ,
//	success:function(data)
//	{
	//	if(data==1)
	//	{
	//		 location.reload();
	//	}
	//}
	//});
//}


</script>


</body>



</html>



