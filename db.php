<?php
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
?>
