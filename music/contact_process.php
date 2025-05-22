<?php
session_start(); // Start session for messages

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "music_academy";

// Database connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    $_SESSION['error'] = "❌ Connection failed: " . $mysqli->connect_error;
    header("Location: contact.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        // Prepare and execute SQL query
        $stmt = $mysqli->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $_SESSION['success'] = "✅ Message sent successfully!";
        } else {
            $_SESSION['error'] = "❌ Database Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "❌ All fields are required!";
    }
} else {
    $_SESSION['error'] = "❌ Invalid request!";
}

$mysqli->close();
header("Location: contact.php"); // Redirect to the contact page
exit();
