<?php  
session_start();
include '../includes/conn.php';
include('lib/auth.php');
$sql = "DELETE FROM category WHERE cat_id='".$_GET['id']."'";

if ($conn->query($sql) === TRUE) {
	echo "<script>alert('Record deleted successfully');

window.location.href='manage_category.php';

</script>";
   
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>