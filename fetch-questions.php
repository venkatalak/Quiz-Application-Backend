<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$host = 'localhost';
$db = 'quiz-application';
$user = 'root'; // Default for XAMPP
$pass = ''; // Empty password by default for XAMPP

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the topic from the request
$topic = isset($_GET['topic']) ? $_GET['topic'] : '';

// Prepare the SQL query
$sql = "SELECT question, options, correct_answer, level FROM questions WHERE topic_id = (
            SELECT id FROM topics WHERE name = ?
        )";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $topic);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data
$questions = [];
while ($row = $result->fetch_assoc()) {
    // Decode the options from JSON string
    $row['options'] = json_decode($row['options']);
    $questions[] = $row;
}

// Output JSON
echo json_encode($questions);

// Close connections
$stmt->close();
$conn->close();
?>
