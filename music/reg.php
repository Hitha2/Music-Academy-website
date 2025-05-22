<?php
session_start();
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $branch = $_POST['branch'];
    $slot = $_POST['slot'];

    // SQL query to insert data
    $sql = "INSERT INTO registrations (name, dob, address, branch, slot) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $dob, $address, $branch, $slot);

    if ($stmt->execute()) {
        $_SESSION['success'] = "🎉 Registration successful!";
    } else {
        $_SESSION['error'] = "⚠️ Registration failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    // Redirect to homepage1.php
    header("Location: homepage1.php");
    exit();
}
?>
