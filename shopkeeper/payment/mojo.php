<?php 
session_start();
?>

<!DOCTYPE HTML>  

<html>
<head>
</head>
<body>  

<?php

    
    //$_SESSION['name']=$_POST['shipping_name'];
    //$_SESSION['email']=$_POST['email'];
    //$_SESSION['mem_id']=$_POST['mem_id'];
    //$_SESSION['amount']=$_POST['product_price'];
  
    $name=$_POST['name'];
    $pro_name='Aapkaeshop Subscription';
    $email=$_POST['email'];
    $shipping_phone=$_POST['mobile'];
    $amount=$_POST['amount'];
    $_SESSION['month']=$_POST['month'];


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');  //This is the Test API endpoint
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');  //This is the Live API endpoint
curl_setopt($ch, CURLOPT_HEADER, FALSE);               
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:b4ff43c45d375576b4c386da30d9ff88", "X-Auth-Token:fcf98956412fda17fa8230da3ffbcda4"));
//curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_701dfa71fe0f7a99b83e338b068", "X-Auth-Token:test_f86b7861e0621534fdacfb1020d"));

$payload = Array(
    'purpose' => $pro_name,
    'amount' => $amount,
    'phone' => $shipping_phone,
    'buyer_name' => $name,
    'redirect_url' => 'https://www.aapkaeshop.com/payment/success.php', 
    'webhook' => 'https://www.aapkaeshop.com/payment/webhook.php', 
    'send_email' => false,
    'send_sms' => false,
    'email' => $email,
    'allow_repeated_payments' => false
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

print $response;
echo '<br>';

$myArray = array(json_decode($response, true));

echo '<br>';
print_r($myArray);
echo '<br>';

$longu = $myArray[0]["payment_request"]["longurl"];        //Extracting the Payment link from the JSON response

echo '<br>';
echo $longu;
header('Location:' .$longu);                               //Redirecting the user to the Payment link. You can comment this line to see the JSON response on your screen.
                        
?>
</body>
</html>