<?php  
session_start();
include '../includes/conn.php';
include('lib/auth.php');

$fetch1="SELECT * FROM product WHERE user_id='".$_GET['id']."'";
$fetch=mysqli_query($conn,$fetch1); 

$rows = mysqli_num_rows($fetch);
if($rows)
{
echo "<script>alert('User Not Deleted ');

window.location.href='manage_users.php';

</script>";
}
else
{


$sql = "DELETE FROM shopkeeper_register WHERE id='".$_GET['id']."'";

if ($conn->query($sql) === TRUE) {
	echo "<script>alert('Record deleted successfully');

window.location.href='manage_users.php';

</script>";
   
} else {
    echo "Error deleting record: " . $conn->error;
}
}

$conn->close();
?>