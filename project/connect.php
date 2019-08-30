<?php

$server = '127.0.0.1';
$user = 'root';
$pass = 'root';
$dbName = 'dim_project';
$conn = mysqli_connect($server, $user, $pass, $dbName);
mysqli_set_charset($conn, 'utf8');
