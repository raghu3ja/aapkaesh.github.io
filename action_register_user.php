<?php
session_start(); 
include 'includes/conn.php';
if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$password=$_POST['password'];

$fetch1=mysqli_query($conn, "SELECT mobile FROM users where mobile = '$mobile' ");
$row1 = mysqli_fetch_array($fetch1);
$fetch2=mysqli_query($conn, "SELECT email FROM users where email = '$email'");
    $row2 = mysqli_fetch_array($fetch2);
    if(mysqli_num_rows($fetch1) > 0)

    {
      
      echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Mobile No Already Exist');
    window.location.href='index.php';
       </script>"; 

    }
    
    elseif(mysqli_num_rows($fetch2) > 0)
    {
      echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Email Already Exist');
    window.location.href='index.php';
       </script>"; 

    }
    
    else
    {
      $query="INSERT into users(name,gender,email,mobile,password,status) VALUES('$name','$gender','$email','$mobile','$password','0')";
      $res=mysqli_query($conn,$query);
      $otp=rand(101011,999998);
      $message = "Your OTP for AapkaEshop mobile verification is ".$otp." Never share OTP to unknown";
      $query1="INSERT into otp_msg(mobile,message,otp) VALUES('$mobile','$message','$otp')";
      $res1=mysqli_query($conn,$query1);
        
     if ($query) 
       {
           session_start();
           $_SESSION['otp_mob_user']=$mobile;
echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Account Created Succesfully Please Verify Mobile Number');
    window.location.href='verify_otp_user.php';
   </script>";  
       }  



}


}
//<!-------------Login------------------------>
if(isset($_POST['login']))
{

$mobile=$_POST['mobile'];
$password=$_POST['password'];

$fetch1="SELECT * FROM users WHERE mobile='$mobile' AND password='$password'";
$fetch=mysqli_query($conn,$fetch1); 

$rows = mysqli_num_rows($fetch);
$res=mysqli_fetch_array($fetch);

        
    if($rows){
        
        if($res['status']==1)
        {
        
		$id=$res['id'];
		
		setcookie('user_id', $id, time() + (86400 * 1), "/");
		
		$_SESSION['user_id']=$res['id'];
		$_SESSION['user_name']=$res['name'];
				 echo "<script LANGUAGE='JavaScript'>
     window.location.href='user/orders.php';
       </script>"; 
    }
    else
    {
        $otp=rand(101011,999998);
      $message = "Your OTP for AapkaEshop mobile verification is ".$otp." Never share OTP to unknown";
      $query2="INSERT into otp_msg(mobile,message,otp) VALUES('$mobile','$message','$otp')";
      $res2=mysqli_query($conn,$query2);
      session_start();
           $_SESSION['otp_mob_user']=$mobile;
         echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Mobile number is not verified, Fill OTP to verify');
    window.location.href='verify_otp_user.php';
       </script>"; 
    }
	}else
    {
      echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Mobile Or Password Incorrect Please Try Again');
    window.location.href='index.php';
       </script>"; 

    }
}


?>

<!-------------Forgot Password------------------------>
<?php
if(isset($_POST['forgot']))
{

$email=$_POST['email'];

$fetch1="SELECT * FROM users WHERE email='$email'";
$fetch=mysqli_query($conn,$fetch1); 

$rows = mysqli_num_rows($fetch);
$res=mysqli_fetch_array($fetch);

$name=$res['name'];
$mobile=$res['mobile'];
$pass=$res['password'];


  if($res)

   {

    $to = $email;
     $subject = "Forgot Password Mail - http://www.aapkaeshop.com/ ";
         
      $message = "
             <html>
           <head>
            <title>Forgot Password</title>
            </head>
              <body>
            <h2>Hi ".$name.".</h2>
            <h2>Thank you for Using .</h2>
          <p>Your Account id and password:</p>
           <p>Mobile No: ".$mobile."</p>
           <p>Password: ".$pass."</p>
             
           </body>
           </html>
             ";
         
        $header = "From:noreply@aapkaeshop.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         if ($retval) {
           echo "<script LANGUAGE='JavaScript'>
     window.alert('Your password Send to Your Registered Email id Plaese Check');
   window.location.href='index.php';
    </script>"; 

         }
         else
         {
          echo "<script LANGUAGE='JavaScript'>
     window.alert('Somthing Wrong');
   window.location.href='index.php';
    </script>"; 

         }
      
  
 }
   
  else
   {
     echo "<script LANGUAGE='JavaScript'>
   window.alert('Your Email Id Incorrect Please Try Again');
  window.location.href='index.php';
      </script>"; 

   }
}

?>