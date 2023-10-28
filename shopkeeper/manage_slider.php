<?php  
session_start();
include '../includes/conn.php';
date_default_timezone_set("Asia/Kolkata");
?>
<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Aapkaeshop - Manage Slider</title>

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

				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Products</span> - Manage Slider</h4>
               <ul class="breadcrumb breadcrumb-caret position-right">

					<li><a href="home.php">Home</a></li>

					<li><a href="manage_collage.php">Manage Slider</a></li>

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
						<button type="button" class="btn bg-teal-400 btn-labeled" onClick="window.location.href='add_slider.php'"><b><i class="icon-add"></i></b>Add Slider</button>
                        
                    
                        
				</div>
                <table class="table datatable-basic table-striped">

						<thead>

							<tr>

								<th><input type="checkbox" id="selectall" name="selectall"></th> 
                                
                                <th>S.N</th>
                                

                                
                                <th>Product Name</th>
                                <th>Slider</th>
								                            

                                <th>Edit</th>
                                
                                
        
							</tr>

						</thead>

						<tbody>
                                <?php
								//include('lib/connectdb.php');

								$r=$conn->query("SELECT * FROM product WHERE shop_id='".$_SESSION['id']."'");
								
								if($r)
								{
									$i=1; 
									while($rows=$r->fetch_assoc())
									{
										?>
									<tr>
									 <td><input type="checkbox" name="assign_id[]" id="assign_id_<?php echo $rows['p_id']; ?>" value="<?php echo $rows['p_id']; ?>" class="checkboxall"></td>
									<td><?php echo $i; ?></td> 
								
									<td><?php echo $rows['product_name'];?></td>
										
									<td>
									 <?php
								//include('lib/connectdb.php');

								$r1=$conn->query("SELECT * FROM product_slider WHERE p_id='".$rows['p_id']."'");
								
								if($r1->num_rows>0)
								{
									
									while($rows1= $r1->fetch_assoc())
									{
										?>
									
									<img src="../images/product-gallery/<?php echo $rows1['image_name'];?>" style="height:50px; width:50px"/>                           
									<?php

}}									?>
									</td>

								
									<td><a href="edit_slider.php?pro_id=<?php echo $rows['p_id'];?>"><i class="icon-pencil7"></i> Edit</a></td>
									
									
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

