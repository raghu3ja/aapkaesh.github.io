<?php  
session_start();
include '../includes/conn.php';
include('lib/auth.php');
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d H:i:s");
?>
<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Aapkaeshop - Manage Products</title>

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

				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Products</span> - Manage Products </h4>
               <ul class="breadcrumb breadcrumb-caret position-right">

					<li><a href="home.php">Home</a></li>

					<li><a href="manage_collage.php">Manage Products</a></li>

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
						<button type="button" class="btn bg-teal-400 btn-labeled" onClick="window.location.href='add_products.php'"><b><i class="icon-add"></i></b>Add Products</button>
                        
                    
                        
				</div>
                <table class="table datatable-basic table-striped">

						<thead>

							<tr>

								<th><input type="checkbox" id="selectall" name="selectall"></th> 
                                
                                <th>S.N</th>
                                
                                <th>Date</th>
                                
                                <th>Product Name</th>
								<th>Product MRP</th>
								<th>Discount MRP</th>
								
								
							
                                
                                <th>Image</th>

                                <th>Top Listed</th>	
                             

                                <th>Edit</th>
                                
                                <th>Delete</th>
        
							</tr>

						</thead>

						<tbody>
                                <?php
								//include('lib/connectdb.php');
								$r=$conn->query("SELECT * from product WHERE shop_id='".$_SESSION['id']."'");
								
								if($r->num_rows>0)
								{
									$i=1; 
									while($rows= $r->fetch_assoc())
									{
										?>
									<tr>
									 <td><input type="checkbox" name="assign_id[]" id="assign_id_<?php echo $rows['p_id']; ?>" value="<?php echo $rows['p_id']; ?>" class="checkboxall"></td>
									<td><?php echo $i; ?></td> 
									<td><?php echo date('j M, Y',strtotime($rows['cdate']));?></td>
									<td><?php echo $rows['product_name'];?></td>
										<td><?php echo $rows['mrp'];?></td>
											<td><?php echo $rows['discount_mrp'];?></td>
									
									
									
									<td><img src="../images/product/<?php echo $rows['feature_img'];?>" style="height:50px; width:50px"/></td>                           
									
									<td>
									<select name="top" id="top" class="form-control" onChange="global_set(this.value,'product','top',<?php echo $rows['p_id'];?>)">
										   <option value="0" <?php if($rows['top']==0){echo "selected";}else{echo "";} ?> >No</option>
										   <option value="1" <?php if($rows['top']==1){echo "selected";}else{echo "";} ?>>Yes</option>
									</select>
									</td>

								
									<td><a href="edit_products.php?pro_id=<?php echo $rows['p_id'];?>"><i class="icon-pencil7"></i> Edit</a></td>
									<td width="15%"><a href="delete_products.php?pro_id=<?php echo $rows['p_id'];?>" onClick="global_delete('product','p_id',<?php echo $rows['p_id'] ?>);"><i class="icon-cancel-circle2"></i> Delete</a></td>
									
									</tr>
									<?php $i++; 
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
		if(data==1){
		location.reload();
		 }
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
	  url:'ajax/delete_all_product.php',
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




<script>
function delete_product(id){
   var retVal = confirm("Are you sure want to delete ?");
	if( retVal == true ){
      $.ajax({
	  url:'ajax/delete_product.php',
	  type:'post',
	  data:{'id':id},
	  success:function(data){
		  //alert(data);
		 if(data==1){
			 location.reload();
		  }
		 },
 	 }); 

   }else{

        return false;

   }
   
	}
</script>
<script>
function global_set(val,tablname,colname,id){
	$.ajax({
		url:'ajax/global_set.php',
		type:'post',
		data:{'val':val,'tablname':tablname,'colname':colname,'id':id},
		success:function(data){
			if(data==1){
				location.reload();
			}
		},
	}); 
}
</script>
<script>
function change_status(val,id)
{
$.ajax({
	url: 'ajax/change_recommend.php',
	data:{'val':val,
	      'pro_id':id} ,
	success:function(data)
	{
		if(data==1)
		{
			 location.reload();
		}
	}
	});
}


</script>

<script>
function change_stock(val,id)
{
$.ajax({
	url: 'ajax/change_stock.php',
	data:{'val':val,
	      'pro_id':id} ,
	success:function(data)
	{
		if(data==1)
		{
			 location.reload();
		}
	}
	});
}


</script>

<script>
function set_featured(val,tablname,id)
{
$.ajax({
	url: 'ajax/set_featured_pro.php',
	data:{'val':val,'tablname':tablname,'id':id,} ,
	success:function(data)
	{
		if(data==1)
		{
			 location.reload();
		}
	}
	});
}


</script>



<style>
.recommed
{
background-color:#73F361 !important;	
}
</style>

</body>

</html>
