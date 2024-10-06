<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");


$host = 'localhost';
$db = 'quiz-application';
$user = 'root'; 
$pass = ''; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$topic = $_GET['topic'];
error_log("Fetching score for Topic: $topic"); 

$query = "SELECT score FROM results WHERE topic = ? ORDER BY created_at DESC LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $topic);
$stmt->execute();
$result = $stmt->get_result();
$score = $result->fetch_assoc();

echo json_encode($score); 
$stmt->close();
$conn->close();
?>