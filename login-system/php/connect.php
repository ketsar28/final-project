<?php
$server = "mysql:host=localhost;port=3307;dbname=kepegawaian";
$server_nm = 'localhost';
$dbname = 'kepegawaian';
$port = 3307;
$username = 'root';
$password = 1234;
$conn = mysqli_connect($server_nm, $username, $password, $dbname, $port);
// $conn = new PDO($server, $username, $password);


?>