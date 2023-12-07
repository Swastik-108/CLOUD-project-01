<?php


$email =$_POST['username'];
$password =$_POST['password'];
$con = new mysqli("database-1.c09sqyoza5hu.us-east-1.rds.amazonaws.com","root", "password", "userdb");

if($con->connect_error) {

die("Failed to connect : ".$con->connect_error);

} else {

$stmt = $con->prepare("select * from users where email = ?");

$stmt->bind_param("s", $email);

$stmt->execute();

$stmt_result = $stmt->get_result();

if($stmt_result->num_rows > 0) {

$data = $stmt_result->fetch_assoc();

I

if($data['password'] === $password) {

echo "<h2>Login Successfully</h2>";

} else {

echo "<h2>Invalid Email or password</h2>";

}

} else {

echo "<h2>Invalid Email or password</h2>";

}

}
?>
