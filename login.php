<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "newuser";
$password = "P@ssw0rd123";
$dbname = "login_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user inputs
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';

// Simple input validation
if (empty($user) || empty($pass)) {
    echo "Username and password cannot be empty.";
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Debugging output
echo "Prepared statement successfully created.<br>";

$stmt->bind_param("ss", $user, $pass);

// Execute and check result
if ($stmt->execute()) {
    echo "Registration successful";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
