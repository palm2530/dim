<?php

//session_start();
include '../core/connect.php';

$query = 'delete from users where id= "' . $_GET['id'] . '" ';
$data = mysqli_query($conn, $query);

echo "<script> alert('Success'); </script>";
echo "<script> window.location='read.php'; </script>";
?>
