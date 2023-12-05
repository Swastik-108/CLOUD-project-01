<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users( username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password_hash);

    // Hash the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
