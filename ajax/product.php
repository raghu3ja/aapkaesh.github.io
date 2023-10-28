<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
$r=$conn->query("SELECT * FROM `product` WHERE `p_id`='".$_REQUEST['product']."'");
if(mysqli_affected_rows($conn)>0){
	$rows= $r->fetch_assoc();
	$msg.='<div class="row">
					<div class="col-md-4 col-xs-4">
						<label>Product Name</label>
					</div>
					<div class="col-md-4 col-xs-4">
						<label>Quantity</label>
					</div>
					<div class="col-md-4 col-xs-4">
						<label>Price</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xs-4">
							<input type="text" class="form-control" readonly id="product-name" value="'.$rows['product_name'].'" placeholder="">
							<input type="hidden" id="product-price" value="'.$rows['discount_mrp'].'">
							<input type="hidden" id="product-id" value="'.$_REQUEST['product'].'">
						</div>
						<div class="col-md-4 col-xs-4 fi">
							<div id="field1">
								<button type="button" onclick="calculate(0)" class="sub">-</button>
								<input type="number" class="are" onchange="calculate(2, this.value)" id="qty" value="1" min="0" max="1000" />
								<button type="button" onclick="calculate(1)" class="add">+</button>
							</div>
						</div>

						<div class="col-md-4 col-xs-4">
							<input type="number" class="form-control" readonly id="total-price" value="'.$rows['discount_mrp'].'" placeholder="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<button type="button" onclick="addcart('.$_REQUEST['product'].')" class="btn btn-default btn-close">Add</button>

						</div>
							<p style="text-align:center;"></p>
					</div>';
}else{
	$msg.='No Product Found';
}
echo $msg;
?>