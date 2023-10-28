<?php  
session_start();

include '../includes/conn.php';

include('lib/get_functions.php');

include('lib/auth.php');

date_default_timezone_set("Asia/Kolkata");

$date=date('Y-m-d H:i:s');

?>

<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aapkaeshop - Manage Order</title>
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
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Order</span> - Manage Order</h4>
      <ul class="breadcrumb breadcrumb-caret position-right">
        <li><a href="#">Home</a></li>
        <li><a href="orders.php">Manage Order</a></li>
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
          
          <!--<button type="button" id="delete_all" class="btn btn-warning">Delete</button>-->
        </div>
        <table class="table datatable-basic table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" id="selectall" name="selectall"></th>
              
              <th>Order Date</th>
              <th>Order ID</th>
				<th>Customer Email</th>
				<th>Customer name</th>
				<th>Customer Phone</th>
              <th>Total Price</th>
              
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$order=$conn->query("SELECT * FROM `cart` WHERE `shop_id`='".$_SESSION['id']."' ORDER BY id DESC");
			if($order->num_rows>0)
			{
				$i=1;
				while($ord= $order->fetch_assoc())
				{?>
					  
					<td><input type="checkbox" name="assign_id[]" id="assign_id_<?php echo $ord['id'];?>" value="<?php echo $ord['id'];?>" class="checkboxall"></td>
					
					<td><?php echo date('Y-m-d H:i:s',strtotime($ord['cdate']));?></td>
					<td><a href="order_details.php?order_id=<?php echo $ord['id']; ?>"><?php echo $ord['id'];?></a></td>
					<td><?php echo $ord['email'];?></td>
			  <td><?php echo $ord['name'];?></td>
			  <td><?php echo $ord['tel'];?></td>
					<td><?php echo $ord['total_price'];?></td>
					
						<td><a href="order_details.php?order_id=<?php echo $ord['id']; ?>"><input type="button" name="submit" class="btn btn-info" value="Order Detail"></a></td>
						
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
  </div>
</div>
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
   $("input[name='assign_id[]']:checked").each( function (){
		values.push($(this).val());
	});
if(values!=""){
	var retVal = confirm("Are you sure want to Delete?");
	if( retVal == true ){
$.ajax({
	  url:'ajax/delete_all_customer.php',
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

function delete_customer(id){

   var retVal = confirm("Are you sure want to delete ?");

	if( retVal == true ){

      $.ajax({

	  url:'ajax/delete_customer.php',

	  type:'post',

	  data:{'id':id},

	  success:function(data){

		  //alert(data);

		 //if(data==1){

			 location.reload();

		  //}

		 },

 	 }); 



   }else{



        return false;



   }

   

	}

</script>
</body>
</html>
