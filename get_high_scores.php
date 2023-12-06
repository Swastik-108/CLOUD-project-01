<?php
include 'db.php'; // Include the database connection file

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT score FROM high_scores WHERE user_id='$user_id' ORDER BY score DESC LIMIT 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $scores = array();
        while ($row = $result->fetch_assoc()) {
            $scores[] = $row['score'];
        }

        echo json_encode($scores);
    } else {
        echo "No high scores found.";
    }
}

$conn->close();
?>
