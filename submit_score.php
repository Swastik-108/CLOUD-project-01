<?php
include 'db.php'; // Include the database connection file

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $score = $_POST['score'];

    $sql = "INSERT INTO high_scores (user_id, score) VALUES ('$user_id', '$score')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Score submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
