<?php
include('db_config.php'); // Include your database connection file

$username = 'admin'; // Change this to your desired username
$password = 'admin123'; // Change this to your desired password

// Check if the username already exists
$check_sql = "SELECT * FROM admins WHERE username = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $username);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "Error: Username already exists!";
} else {
    // Hash the password before inserting it into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert admin user
    $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Admin user created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$check_stmt->close();
$conn->close();
?>
