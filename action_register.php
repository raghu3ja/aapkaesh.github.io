<?php
session_start();
error_reporting();
include 'includes/conn.php';
if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$shop_name=$_POST['shop_name'];
$address=$_POST['address'];
$category_id=$_POST['category_id'];
$pincode=$_POST['pincode'];
$password=$_POST['password'];

$fetch1=mysqli_query($conn, "SELECT mobile FROM shopkeeper_register where mobile = '$mobile' ");
$row1 = mysqli_fetch_array($fetch1);
$fetch2=mysqli_query($conn, "SELECT email FROM shopkeeper_register where email = '$email'");
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
      $query="INSERT into shopkeeper_register(cat_id,name,email,mobile,shop_name, address,pincode, password) VALUES('$category_id','$name','$email','$mobile','$shop_name','$address','$pincode','$password')";
$res=mysqli_query($conn,$query);
        
     if ($query) 
       {
echo "<script LANGUAGE='JavaScript'>
    window.alert('Your Account Created Succesfully Please Login To Continue');
    window.location.href='index.php';
   </script>";  
       }  



}


}
//<!-------------Login------------------------>
if(isset($_POST['login']))
{

$mobile=$_POST['mobile'];
$password=$_POST['password'];

$fetch1="SELECT * FROM shopkeeper_register WHERE mobile='$mobile' AND password='$password'";
$fetch=mysqli_query($conn,$fetch1); 

$rows = mysqli_num_rows($fetch);
$res=mysqli_fetch_array($fetch);

        
    if($rows){
		$id=$res['id'];
		
		setcookie('shop_id', $id, time() + (86400 * 1), "/");
		
		$r=$conn->query("SELECT * FROM `shopkeeper_subscription` WHERE `shopkeeper_id`='".$res['id']."'");
		if($r->num_rows>0){
			$rows= $r->fetch_assoc();
			$curdate = date("Y/m/d") ;
			$curdate = strtotime($curdate);
			$dueDate = $rows['next_due_date'] ;
			$dueDate = strtotime($dueDate);
			if($dueDate>=$curdate){
				$_SESSION['id']=$res['id'];
				$_SESSION['name']=$res['name'];
				 echo "<script LANGUAGE='JavaScript'>
     window.location.href='shopkeeper/orders.php';
       </script>"; 
			}else{
				 echo "<script LANGUAGE='JavaScript'>
				 window.alert('Your Subscriptions pack is over please renew it!');
     window.location.href='subscription.php';
       </script>"; 
			}
		}else{
			echo "<script LANGUAGE='JavaScript'>
				 window.alert('You have to buy subscription Package!');
     window.location.href='subscription.php';
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

$fetch1="SELECT * FROM shopkeeper_register WHERE email='$email'";
$fetch=mysqli_query($conn,$fetch1); 

$rows = mysqli_num_rows($fetch);
$res=mysqli_fetch_array($fetch);

$name=$res['name'];
$mobile=$res['mobile'];
$pass=$res['password'];


         
    //if( $retval == true ) {
      //  echo "Your Password Sent to successfully on email";
      // }else {
       //  echo "Message could not be sent...";
     // }
        
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