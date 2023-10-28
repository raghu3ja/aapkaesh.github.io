<?php  
session_start();
error_reporting(0);
include '../includes/conn.php';
$conn->query("SELECT * FROM `subscription` WHERE `email`='".$_REQUEST['email']."' AND `shop_id`='".$_REQUEST['shopid']."'");
if(mysqli_affected_rows($conn)>0){
	echo "2";
}else{
	$cart=$conn->query("INSERT INTO `subscription`( `shop_id`, `name`, `email`, `date_added`) VALUES ('".$_REQUEST['shopid']."','".$_REQUEST['name']."','".$_REQUEST['email']."',NOW())");
	if(mysqli_affected_rows($conn)>0){
		$email=$_REQUEST['email'];
		
		$subject = 'Aapkaeshop - Subscribe Successfully'; 

			$random_hash = md5(date('r', time())); 
			
			$headers = "From: info@aapkaeshop.com \r\nReply-To: info@aapkaeshop.com";
			
			$headers .= "MIME-Version: 1.0\r\n";
			
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$message = '<html>
						<body>';
			
			$message .= '<table width="600" border="0" cellpadding="2" cellspacing="2">' ;
					 
			$message .= '<tr>
							<td><b>Hi!</b> ,'.$_REQUEST['name'].'</td>
						</tr>';
			$message .= '<tr>
				<td><br/>Thank you for following us.</td></tr>' ;
			 
			$message .= '<tr>
				<td><br/>Now you will get notification of our new arrival Product.</td></tr>' ;
			
			
			$message .= '<tr>
				<td><br/>Thanks, <br/> <b>Aapkaeshop</b></td></tr>' ;
			
			
			$message .= '</table>';
			
			$message .= "</body></html>";
			
			$mail_sent = @mail( $email, $subject, $message, $headers );
			
		echo "1";
	}else{
		echo "3";
	}
}

?>