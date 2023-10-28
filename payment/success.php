<?php
session_start();
error_reporting();
date_default_timezone_set("Asia/Kolkata");
$crudate=date('Y-m-d H:i:s');
include '../includes/conn.php';
        $var1 = $_GET['payment_id'];
		$var2 = $_GET['payment_request_id'];

		//echo $var2;
		echo '<br>';
		//echo $var1;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$var2);
		//curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/'.$var2);

		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

		//curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_701dfa71fe0f7a99b83e338b068", "X-Auth-Token:test_f86b7861e0621534fdacfb1020d"));
		curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:b4ff43c45d375576b4c386da30d9ff88","X-Auth-Token:fcf98956412fda17fa8230da3ffbcda4"));

		$response = curl_exec($ch);
		curl_close($ch); 

		$myArray = array(json_decode($response, true));

		//echo $response;
		//echo '<br>';

		//echo '<br>';
		//print_r($myArray);
		//echo '<br>';

		$payment_id = $myArray[0]["payment_request"]["payments"][0]["payment_id"];
		$amount = $myArray[0]["payment_request"]["payments"][0]["amount"];
		$buyer_name = $myArray[0]["payment_request"]["payments"][0]["buyer_name"];
		$buyer_phone = $myArray[0]["payment_request"]["payments"][0]["buyer_phone"];
		$buyer_email = $myArray[0]["payment_request"]["payments"][0]["buyer_email"];
		$status = $myArray[0]["payment_request"]["payments"][0]["status"];
                 //The status that confirms your Payment. Credit = Successful transaction, Failed = Failed transaction. 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include '../includes/conn.php';

	if(isset($payment_id)){
		$days=$_SESSION['month'];
		
		$curdate = date("Y-m-d") ;
		
		if($days=='2'){
			$nextDate = date('Y-m-d',strtotime('+2 days',strtotime($curdate)));
		}
		else
		if($days=='31'){
			$nextDate = date('Y-m-d',strtotime('+31 days',strtotime($curdate)));
		}
		else
		if($days=='366'){
			$nextDate = date('Y-m-d',strtotime('+366 days',strtotime($curdate)));
		}
		else
		if($days=='1100'){
			$nextDate = date('Y-m-d',strtotime('+1100 days',strtotime($curdate)));
		}
		
		$r1=$conn->query("SELECT * FROM `shopkeeper_subscription` WHERE `shopkeeper_id`='".$_COOKIE['shop_id']."'");
		if($r1->num_rows>0){
		$update=$conn->query("UPDATE `shopkeeper_subscription` SET `next_due_date`='".$nextDate."',`cdate`='".$curdate."' WHERE `shopkeeper_id`='".$_COOKIE['shop_id']."'");
			if(mysqli_affected_rows($conn)>0){
				$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_COOKIE['shop_id']."'");
				if(mysqli_affected_rows($conn)>0){
					$rows= $r->fetch_assoc();
					$_SESSION['id']=$rows['id'];
					$_SESSION['name']=$rows['name'];
					 echo "<script LANGUAGE='JavaScript'>
						window.location.href='../shopkeeper/manage_products.php';
						 </script>"; 
				}
			}else{
				echo "<script LANGUAGE='JavaScript'>
				window.alert('Something went wrong please contact to our Customer Executive');
				window.location.href='subscription.php';
		   </script>"; 
			}
		}else{
			$insert=$conn->query("INSERT INTO `shopkeeper_subscription`(`id``shopkeeper_id`, `next_due_date`, `cdate`) VALUES ([id],'".$_COOKIE['shop_id']."','".$nextDate."','".$curdate."')");
			if(mysqli_affected_rows($conn)>0)
			{
				$r=$conn->query("SELECT * FROM `shopkeeper_register` WHERE `id`='".$_COOKIE['shop_id']."'");
				if(mysqli_affected_rows($conn)>0)
				{
					$rows= $r->fetch_assoc();
					$_SESSION['id']=$rows['id'];
					$_SESSION['name']=$rows['name'];
					 echo "<script LANGUAGE='JavaScript'>
						window.location.href='../shopkeeper/manage_products.php';
						 </script>"; 
				}
			}
			else
			{
				echo "<script LANGUAGE='JavaScript'>
				window.alert('Something went wrong please contact to our Customer Executive');
				window.location.href='../shopkeeper/subscription.php';
		   </script>"; 
			}
		}
	}
	




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		
?>