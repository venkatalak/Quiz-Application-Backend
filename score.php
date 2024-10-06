<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

$host = 'localhost';
$db = 'quiz-application';
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$score = isset($data['score']) ? $data['score'] : null; // Make sure to check if score exists
$topic = isset($data['topic']) ? $data['topic'] : null; // Check if topic exists

if ($score !== null && $topic !== null) { // Only insert if both are not null
    $query = "INSERT INTO results (score, topic) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $score, $topic);
    $stmt->execute();
    $stmt->close();
} else {
    echo json_encode(['error' => 'Score or topic is missing']);
}

$conn->close();
?>

