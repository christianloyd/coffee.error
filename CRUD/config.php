<?php 
// the server may change if you want to stick to the given server
// You can use any database platform
// I use SQLyog and phpAdmin

$servername = "localhost:3307";
$username = "username"; 
$password = "";
$dbname = "form_crud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>