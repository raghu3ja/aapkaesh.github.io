<?php
session_start();
error_reporting(0);
include '../includes/conn.php';
if(isset($_REQUEST['submit'])){
	$productqty=explode(",",$_REQUEST['productqty']);
	$productid=explode(",",$_REQUEST['productid']);
	$productname=explode(",",$_REQUEST['productname']);
	$productprice=explode(",",$_REQUEST['productprice']);
	
	$name=$_REQUEST['name'];
	$tel=$_REQUEST['tel'];
	$email=$_REQUEST['email'];
	$city=$_REQUEST['city'];
	$district=$_REQUEST['district'];
	$landmark=$_REQUEST['landmark'];
	$address=$_REQUEST['address'];
	$shopname=$_REQUEST['shopname'];
	
$subject = 'Enquiry Detail | Aapkaeshop';

$message = '<p style="font-weight:600; font-size:16px;">Thanks for your enquiry and visiting Aapkaeshop. Our team will contact you offline.</p>';

$message .= '<table style="border: 0.5px;" cellspacing="0" cellpadding="0" border="1" width="500">
													<thead>
														<tr style="background-color: #e72653;color: #fff;letter-spacing: 1;">
															<th style="padding: 10px;">Product Name</th>
															<th style="padding: 10px;">Unit Price</th>
															<th style="padding: 10px;">Quantity</th>
															<th style="padding: 10px;">Sub Total</th>
														</tr>
													</thead>
													<tbody>';
											$g_total=0;
											$i=0;
											foreach($productname as $l => $m)
											{
												$message .=	'<tr>
															<td style="padding: 10px;">&nbsp;'.$productname[$i].'</td>
															<td style="padding: 10px;">Rs.&nbsp;'.$productprice[$i].'.00</td>
															<td style="padding: 10px;">'.$productqty[$i].'</td>
															<td style="padding: 10px;">Rs.&nbsp;'.$productprice[$i] * $productqty[$i].'.00</td>
														</tr>';
												$g_total=$g_total+$productprice[$i] * $productqty[$i];
												$i++;
											}
											$message .=	'<tr>
															<td colspan="3" style="padding: 10px;"><span><strong>Grand Total</strong></span></td>
															<td style="padding: 10px;"><span>Rs.<strong>&nbsp;'.$g_total.'.00</strong></span></td>
														</tr>
													</tbody>		
													
														
                                                    

                                                </table>';

$message .= '<br/><br/><p><b>Name :</b> '.$name.' <br/>
<b>Email :</b> '.$email.' <br/>
<b>Telephone :</b> '.$tel.' <br/>
<b>City :</b> '.$city.' <br/>
<b>District :</b> '.$district.' <br/>
<b>Landmark :</b> '.$landmark.' <br/>
<b>Address :</b> '.$address.' <br/>
<b>Shop Name :</b> '.$shopname.' <br/>

</p><br/><br/>
<p>Thanks!<br>

    Team Aapkaeshop</p>';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: Aapkaeshop <info@aapkaeshop.com>';
$headers[] = 'Cc: info@aapkaeshop.com';
//echo $message;
	$cat=$conn->query("INSERT INTO `cart`( `shop_id`, `product_id`, `product_name`, `price`, `qty`, `total_price`, `name`, `tel`, `email`, `city`, `district`, `landmark`, `address`, `date_added`) VALUES ('".$_REQUEST['shopid']."','".$_REQUEST['productid']."','".$_REQUEST['productname']."','".$_REQUEST['productprice']."','".$_REQUEST['productqty']."','".$g_total."','".$name."','".$tel."','".$email."','".$city."','".$district."','".$landmark."','".$address."',NOW())");
	if(mysqli_affected_rows($conn))
	{
		mail($email, $subject, $message, implode("\r\n", $headers));
		mail('info@aapkaeshop.com', $subject, $message, implode("\r\n", $headers));
		echo "<script>alert('Query Submitted Successfully');

		window.location.href='../index.php';

		</script>";			
	}
	
}
else{
	echo "<script>alert('Query not Submitted');

		window.location.href='../index.php';

		</script>";	
}
?>