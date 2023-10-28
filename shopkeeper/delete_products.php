<?php  
session_start();
include '../includes/conn.php';
include('lib/auth.php');
$sql = "DELETE FROM product WHERE p_id='".$_GET['pro_id']."'";

if ($conn->query($sql) === TRUE) {
	echo "<script>alert('Record deleted successfully');

window.location.href='manage_products.php';

</script>";
   
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>