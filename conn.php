<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db ='test';
$conn = mysqli_connect($servername,$username,$password,$db);
if(!$conn){
  ?>
  <script>
    alert("Connection failed!")
  </script>
  <?php
}
?>

