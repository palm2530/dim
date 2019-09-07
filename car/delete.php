<?php
$server = '127.0.0.1';
$user = 'root';
$pass = 'root';
$dbName = 'dim';
$conn = mysqli_connect($server, $user, $pass, $dbName);
mysqli_set_charset($conn,'utf8');

$query = 'delete from customer where CustomerID= "'.$_GET['id'].'" ';
$data = mysqli_query($conn, $query);

echo "<script> alert('Success'); </script>";
echo "<script> window.location='read.php'; </script>";

?>
