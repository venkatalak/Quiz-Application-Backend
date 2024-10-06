<?php
header("Access-Control-Allow-Origin: *"); // Allow all origins
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow specific HTTP methods
header("Access-Control-Allow-Headers: Content-Type"); 
include 'db.php'; // Include the database connection


$sql = "SELECT * FROM topics"; // Adjust this to match your table name
$result = $conn->query($sql);
$topics = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $topics[] = $row; // Assuming your table has a column 'name'
    }
}

echo json_encode($topics); // This will output the data in JSON format
$conn->close();
?>