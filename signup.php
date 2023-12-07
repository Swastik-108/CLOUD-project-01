<?php


$email =$_POST['username'];
$password =$_POST['password'];
$con = new mysqli("database-1.c09sqyoza5hu.us-east-1.rds.amazonaws.com","root", "password", "userdb");


// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ss",$email, $password);

    $stmt->execute();

    echo "Registration Successful...";

    $stmt->close();
    $conn->close();
}

?>
