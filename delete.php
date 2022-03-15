<?php

include "conn.php";

$id = $_GET['id']; 
$sql = "DELETE FROM product WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
   
  echo "Record deleted successfully";
  mysqli_close($conn); 
  header("location:productlist.php"); 
  exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>