<?php  
session_start();
include('lib/db_connection.php');
include('lib/auth.php');
date_default_timezone_set("Asia/Kolkata");
$date=date('Y-m-d');


if(isset($_REQUEST['submit'])){	

$cal_date=date('Y-m-d',strtotime($_REQUEST['date']));

for($i=1;$i<$_REQUEST['num'];$i++){

if($_REQUEST['qty_'.$i]!=""){  	
	
if($_REQUEST['payment_type']==1){$paid=$_REQUEST['total_'.$i];}else{$paid=0;}	
	
if($_REQUEST['product_'.$i]==""){  
   $ins1="INSERT INTO `tabl_product` SET name='".$_REQUEST['name_'.$i]."'";
   mysql_query($ins1);
   $last_id =mysql_insert_id();	

$ins2="INSERT INTO `tabl_purchase` SET
			product_id='".$last_id."',
			invoice_no='".$_REQUEST['invoice']."',
			payment_type='".$_REQUEST['payment_type']."',
			party_id='".$_REQUEST['party_id']."',
			qty='".$_REQUEST['qty_'.$i]."',
			price='".$_REQUEST['price_'.$i]."',
			total='".$_REQUEST['total_'.$i]."',
			paid='".$paid."',
			date_added='".$cal_date."'";
	mysql_query($ins2);	
	
	
}else{
	
$ins2="INSERT INTO `tabl_purchase` SET
			invoice_no='".$_REQUEST['invoice']."',
			payment_type='".$_REQUEST['payment_type']."',
			product_id='".$_REQUEST['product_'.$i]."',
			party_id='".$_REQUEST['party_id']."',
			qty='".$_REQUEST['qty_'.$i]."',
			price='".$_REQUEST['price_'.$i]."',
			total='".$_REQUEST['total_'.$i]."',
			paid='".$paid."',
			date_added='".$cal_date."'";
	mysql_query($ins2);
}
	
if($_REQUEST['product_'.$i]==""){$product_id=$last_id;}else{$product_id=$_REQUEST['product_'.$i];}
$sel_stock="SELECT * FROM `tabl_stock_master` WHERE product_id='".$product_id."'";
$qry_stock=mysql_query($sel_stock);
$num_stock=mysql_num_rows($qry_stock);
if($num_stock>0){

$upd_stock="UPDATE `tabl_stock_master` SET in_stock=in_stock+'".$_REQUEST['qty_'.$i]."'  WHERE product_id='".$product_id."'";
mysql_query($upd_stock) or die(mysql_error());
  }else{
	  
	$ins_stock="INSERT INTO `tabl_stock_master` SET 
						product_id='".$product_id."',
						in_stock='".$_REQUEST['qty_'.$i]."'";
	mysql_query($ins_stock)or die(mysql_error());		  
	  }
	  
$ins_stock_temp="INSERT INTO `tabl_stock_temp` SET 
						party_id='".$_REQUEST['party_id']."',
						product_id='".$product_id."',
						stock='".$_REQUEST['qty_'.$i]."',
						type='1',
						date_added='".$cal_date."'";
	mysql_query($ins_stock_temp) or die(mysql_error());


$ins_pay_summ="INSERT INTO `tabl_pay_summary` SET 
						invoice='".$_REQUEST['invoice']."',
						amount='".$_REQUEST['total_'.$i]."',
						type='1',
						date_added='".$cal_date."',
						description='Purchase Items'";
	mysql_query($ins_pay_summ) or die(mysql_error());
		
	
	
}
	
}

if($_REQUEST['payment_type']==1){$paid=$_REQUEST['grand_total'];}else{$paid=0;}
$ins_purchase_m="INSERT INTO `tabl_purchase_master` SET
			invoice_no='".$_REQUEST['invoice']."',
			payment_type='".$_REQUEST['payment_type']."',
			party_id='".$_REQUEST['party_id']."',
			total='".$_REQUEST['grand_total']."',
			paid='".$paid."',
			date_added='".$cal_date."'";
mysql_query($ins_purchase_m);	

$new_invoice=$_REQUEST['invoice']+1;
$invoice="INSERT INTO `tabl_invoice` SET invoice='".$new_invoice."'";
mysql_query($invoice) or die(mysql_error());

echo "<script>alert('Purchase add Successfully');
window.location.href='purchase.php';
</script>";	
		
}
?>

<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Rafdeal Account - Purchase</title>

	<?php include('include/__js_css.php');?>

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/picker_date.js"></script>
    
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>
    
    
	<!-- /theme JS files -->

</head>

<body>

<?php include('include/__header.php');?>
<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Purchase</span> - Add Purchase</h4>
               <ul class="breadcrumb breadcrumb-caret position-right">

					<li><a href="home.php">Home</a></li>
                    
                    <li><a href="manage_purchase.php">Manage Purchase</a></li>
                    
                    <li><a href="purchase.php" class="active">Add Purchase</a></li>

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

				<!-- Vertical form options -->
				<div class="row">
					<div class="col-md-12">

						<!-- Basic layout-->
						<form action="" method="post" id="add_party">
							<div class="panel panel-flat">
								<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<fieldset>
                                     
                           <?php $sel_invoice=mysql_query("SELECT MAX(invoice) as invoice_no FROM `tabl_invoice`");
						         $res_invoice=mysql_fetch_assoc($sel_invoice);?>         
                                    
					                	<legend class="text-semibold"> Purchase &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Invoice- <?php echo $res_invoice['invoice_no'];?></legend>

										<div class="row">
                                        
                                        <div class="col-md-6">
                                        <div class="form-group">
									<label>Date: </label>
									<div class="input-group">
										<span class="input-group-addon"><i class="icon-calendar22"></i></span>
										<input type="text" name="date" class="form-control daterange-single" value="<?PHP date('m/d/Y'); ?>">
                                        <input type="hidden" name="invoice" id="invoice" value="<?php echo $res_invoice['invoice_no'];?>">
									</div>
								</div>
                                        
                                        </div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Party Name:</label>
								<select class="form-control" name="party_id" required>
                                    <option value="">Select</option>
                                   <?php $party="SELECT * FROM `tabl_party`";
												$qry_party=mysql_query($party);
												while($res_party=mysql_fetch_assoc($qry_party)){
												
													?>
                                            <option value="<?php echo $res_party['id'] ?>"><?php echo $res_party['name'] ?></option>    
                                            <?php } ?>
                                 </select>
												</div>
											</div>
										</div>
       								</fieldset>
								</div>
							</div>
                     <div class="row">
                         <div class="col-md-12">
                         
                         <table class="table" id="myTable">
							<thead>
								<tr>
									<th>#</th>
                                    <th>Product</th>
									<th>Qty.</th>
									<th>Price</th>
                                    <th>Total</th>
                                    <th>ADD</th>
								</tr>
                                <tr>
                                
                                <td>1</td>
                                <td><input type="text" name="name_1" id="name_1" class="form-control product" autocomplete="off">
                                <input type="hidden" name="product_1" id="product_1" class="form-control" >
                                  <div id="suggesstion-box2_1" class="suggest"></div>                                
                                </td>
								<td><input type="text" name="qty_1" id="qty_1" class="form-control onlydigit qty" onKeyUp="set_amount()" ></td>
								<td><input type="text" name="price_1" id="price_1" class="form-control onlydigit" onKeyUp="set_amount()"></td>
                                <td><input type="text" name="total_1" id="total_1" class="form-control total onlydigit" readonly></td>
                                <td><i class="icon-add" onClick="displayResult()" style="cursor:pointer;color:#093;"></i></td>
                             </tr>
					 </table>
                     <table class="table">
                      <tr>
                             <td width="33%" colspan="4" class="word" style="font-weight: 500;font-size: 14px;"></td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                             <th style="text-align:right;">Grand Total</th>
                             <td><input type="text" name="grand_total" id="grand_total" class="form-control" readonly></td>
                             <td>&nbsp;</td>
                             
                             </tr>
                     
                     </table>
                         <input type="hidden" name="num" id="num" value="2">                         
                         </div>
                         
                         </div>  
                         
                         
                         <div class="form-group">
										<label class="display-block"><strong>Payment Type:</strong></label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="payment_type" checked="checked" value="1">
											Cash
										</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="payment_type" value="2">
											Credit
										</label>
									</div> 

							<div class="text-right">
								<button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
							</div>
						</form>
						<!-- /basic layout -->

					</div>
				</div>
				<!-- /vertical form options -->
			</div>
	</div>
</div>
	<!-- Footer -->
	<?php include('include/__footer.php');?>
	<!-- /footer -->

</body>
</html>
<style>
#country-list {
    float: left;
    list-style: none;
    margin: 0;
    padding: 0;
    width: 250px;
	position:absolute;
    font-family: inherit;
    border-right: 1px solid rgba(158, 149, 149, 0.21);
	z-index: 100;
}
#country-list li {
    padding: 10px;
    background: #fde5e5;
    border-bottom: #F0F0F0 1px solid;
}
#country-list li:hover{
	cursor:pointer;
	background-color:#999;
	color:#FFF;
	}
</style>
<script>
$(document).ready(function(){	
	$("#price").keyup(function(){
    var unit_id=$("#unit_id").val();	
	 var qty=$("#qty").val();
	 var price=$("#price").val();
			  var total=parseInt(qty) *  parseInt(price);
		 if(qty==''){
			  $("#total").val(0);
			  }else{
				  $("#total").val(total);
		   }	
	});
});
</script>
<script>
$(document).ready(function(){
	$("#qty").keyup(function(){
    var unit_id=$("#unit_id").val();	
	 var qty=$("#qty").val();
	 var price=$("#price").val();
		  var total=parseInt(qty) *  parseInt(price);
		  $("#total").val(total);
	
	});
});
</script>

<script>
function displayResult()

       {

  var i=document.getElementById("num").value;  
  document.getElementById("myTable").insertRow(-1).innerHTML = '<td>'+i+'</td><td><input type="text" name="name_'+i+'" id="name_'+i+'" class="form-control product"><input type="hidden" name="product_'+i+'" id="product_'+i+'" class="form-control"><div id="suggesstion-box2_'+i+'" class="suggest"></div></td><td><input type="text" name="qty_'+i+'" id="qty_'+i+'" class="form-control onlydigit qty" onKeyUp="set_amount()"></td><td><input type="text" name="price_'+i+'" id="price_'+i+'" class="form-control onlydigit" onKeyUp="set_amount()"></td><td><input type="text" name="total_'+i+'" id="total_'+i+'" class="form-control total onlydigit" readonly></td><td><i class="icon-add" onClick="displayResult()" style="cursor:pointer;color:#093;" ></i></td>';
i++;

    var num=document.getElementById("num").value = i;
}
</script>
<script>

function set_amount(){
var num=$("#num").val();
	
for(i=0; i<=num;i++)
{
  $('#total_'+i).val(parseFloat($('#qty_'+i).val()*$('#price_'+i).val())); 
   if($('#price_'+i).val=='')
   {
	 $('#total_'+i).val(0);  
   }
   set_total();
   }

}
function set_total(){
var sum = 0;
    $('.total').each(function() {
        if($(this).val()!="")

         {
            sum += parseFloat($(this).val());
			$('#grand_total').val(sum);
			var word=convertNumberToWords(sum);
			$(".word").html('Rs. '+word+' Only.');
			
         }
    });
}
</script>

<script>

$(document).on('keyup', '.product', function(event) {
  var i=$(this).attr('id');
		var arr = i.split('_');
		$.ajax({
		type: "POST",
		url: "ajax/search_product_keywords.php",
		data:{'keyword':$(this).val(),'id':arr[1]},
		//data:'keyword='+$(this).val(),
		success: function(data){
			
			if(data !=2){
			//alert(data);
			$("#suggesstion-box2_"+arr[1]).show();
			$("#suggesstion-box2_"+arr[1]).html(data);
			 }
			 else{
				 $("#product_id_"+arr[1]).val('');
			}
		}
	});  
})

$(document).on('focus', '.qty', function(event) {
	 $(".suggest").hide();
})
//To select Vendor name
function click2(val1){
var new_val=val1.split(',');
$("#name_"+new_val[2]).val(new_val[1]);
$("#product_"+new_val[2]).val(new_val[0]);
$("#suggesstion-box2_"+new_val[2]).hide();
}
</script> 

<script>
$(document).ready(function() {
    $(".onlydigit").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>
<script>
function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string;
}

</script>