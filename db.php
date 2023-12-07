<?php
$servername = "database-1.c09sqyoza5hu.us-east-1.rds.amazonaws.com:3306";
$username = "root";
$password = "password";
$database = "userdb";


$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
