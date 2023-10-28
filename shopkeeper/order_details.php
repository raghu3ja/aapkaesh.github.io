<?php  
session_start();
include '../includes/conn.php';
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

	<title>Aapkaeshop - Order Details</title>

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

				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Order</span> - Order Details</h4>
               <ul class="breadcrumb breadcrumb-caret position-right">

					<li><a href="#">Home</a></li>

					<li><a href="orders.php">Orders</a></li>
                    	<li><a href="#">Order Details</a></li>

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

				
<?php  

$order=$conn->query("SELECT * FROM `cart` WHERE `id`='".$_REQUEST['order_id']."'");
if($order->num_rows>0)
 {
	$ord_rows= $order->fetch_assoc();
	?>
	<div class="panel panel-flat">
	<table class="table">
  <thead class="thead-dark">
    <tr style="background:#3d4c5a;color:#FFF;">
      <td colspan="2">Order Details</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Order No</td>
      <td><?php echo  $ord_rows['id'] ?></td>
    </tr>
	
	
	
    
    <tr>
      <td>Order Date</td>
       <td><?php echo date('Y-m-d H:i:s',strtotime($ord_rows['cdate']));?></td>
    </tr>
    
    
  </tbody>
</table>

<table class="table">
  <thead class="thead-dark">
    <tr style="background:#3d4c5a;color:#FFF;">
      <td colspan="4">Order Item</td>
    </tr>
  </thead>
  <tbody>
    <tr style="background:#CCC">
      <th><b>Item(s)</b></th>
		<th><b>Quantity</b></th>
      <th><b>Unit Price</b></th>
      <th><b>Total</b></th>
    </tr>
	  <?php
		$productqty=explode(",",$ord_rows['qty']);
		$productid=explode(",",$ord_rows['product_id']);
		$productname=explode(",",$ord_rows['product_name']);
		$productprice=explode(",",$ord_rows['price']);
		array_pop($productname);
		$i=0;
		foreach($productname as $l => $m)
		{
			echo	'<tr>
							<td  style="width:20%;">&nbsp;'.$m .'</td>
							<td>'.$productqty[$i].'</td>
							<td>Rs.&nbsp;'.$productprice[$i].'.00</td>
							<td>Rs.&nbsp;'.$productprice[$i] * $productqty[$i].'.00</td>
						</tr>';
			$i++;
		}
	
	  ?>
	  		
	  	
		
	  
   
    <tr>
      <td style=" width: 76%;">Sub-Total</td>
      <td></td>
		<td></td>
      <td>Rs.&nbsp<?php echo $ord_rows['total_price']; ?>.00</td>
    </tr>
    
     
     <tr>
      <td style=" width: 76%;">Grand Total</td>
      <td></td>
		 <td></td>
      <td>Rs.&nbsp<?php echo $ord_rows['total_price']; ?>.00</td>
    </tr>
	 
        
    
  </tbody>
</table>



<table class="table">
  <thead class="thead-dark">
    <tr style="background:#3d4c5a;color:#FFF;">
      <td colspan="3">Shipping Information</td>
    </tr>
  </thead>
 
  <tbody>
    <tr>
      <td style=" width: 17%;"><b>Name</b></td>
      <td><?php echo $ord_rows['name'];?></td>
    </tr>
    <tr>
      <td style=" width: 17%;"><b>Email</b></td>
      <td><?php echo $ord_rows['email'];?></td>
    </tr>
    <tr>
      <td style=" width: 17%;"><b>Mobile</b></td>
      <td><?php echo $ord_rows['tel'];?></td>
    </tr>
    <tr>
      <td style=" width: 17%;"><b>Address</b></td>
      <td><?php echo $ord_rows['address'];?></td>
    </tr>
   
    
    <tr>
      <td style=" width: 17%;"><b>City</b></td>
      <td><?php echo $ord_rows['city'];?></td>
    </tr>
    <tr>
      <td style=" width: 17%;"><b>District</b></td>
      <td><?php echo $ord_rows['district'];?></td>
    </tr>
	<tr>
      <td style=" width: 17%;"><b>Landmark</b></td>
      <td><?php echo $ord_rows['landmark'];?></td>
    </tr>
   
    
    </tbody>

</table>

	</div>
	<?php
}
			
 ?>
                

				<!-- /striped rows -->

			</div>

			<!-- /main content -->



		</div>

		<!-- /page content -->



	</div>

	<!-- /page container -->





<?php include('include/__footer.php');?>

<script>
function delete_enquiry(id){
   var retVal = confirm("Are you sure want to delete ?");
	if( retVal == true ){
      $.ajax({
	  url:'ajax/delete_enquiry.php',
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
function set_status(val,id)
{
	$.ajax({ 
	url:'ajax/enquiry_status.php',
	type:'post',
	data:{'val': val,
	      'id':id},
     success:function(data){
		 if(data==1)
		 {
			location.reload(); 
		 }
		 
		 }
	
	 });
	
}
</script>



<script>
function mark_read(id)
{
	
	$.ajax({ 
	url:'ajax/mark_read.php',
	type:'post',
	data:{'id':id},
     success:function(data){
		 if(data==1)
		 {
			location.reload(); 
		 }
		 
		 }
	
	 });
	
}
</script>
<script>
$(".m_status").click(function(){
var status=$("#status").val();
var order_id=$("#order_id").val();
	$.ajax({
		url:'ajax/set_modify_status.php',
		type:'post',
		data:{'status':status,'order_id':order_id},
		success:function(data){
			location.reload();
		
  		 },
	  })
	})
</script>
<style>
.reject
{
background-color:#F57696 !important;	
}

.order
{
background-color:#6FDC63 !important;	
}
</style>


</body>

</html>



