<?php
include('authenticate.php');
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "INSERT INTO courses (name, description, image) VALUES ('$name', '$description', '$image')";
    mysqli_query($conn, $query);
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <style>
    /* Root Variables for Easy Customization */
:root {
    --primary-color: #007bff;  /* Blue Theme */
    --text-color: #ffffff;     /* White Text */
    --title-color: #ffcc00;    /* Yellow Title */
    --bg-overlay: rgba(0, 0, 0, 0.6); /* Background Overlay */
    --form-bg: rgba(255, 255, 255, 0.95); /* Form Background */
    --btn-green: #28a745; /* Green Add Course Button */
    --btn-green-hover: #218838; /* Dark Green Hover */
}

/* Background Styling */
body {
    font-family: 'Poppins', sans-serif;
    background: url('3.jpg') no-repeat center center/cover;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

/* Overlay for better readability */
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--bg-overlay);
    z-index: -1;
}

/* Form Container */
form {
    width: 80%;
    max-width: 450px;
    background: var(--form-bg);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
}

/* Page Title */
h2 {
    color: var(--title-color);
    font-size: 26px;
    text-transform: uppercase;
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    margin-bottom: 20px;
}

/* Input Fields */
input, textarea {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: 0.3s;
}

/* Input Focus Effect */
input:focus, textarea:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
}

/* File Input */
input[type="file"] {
    padding: 5px;
    border: none;
}

/* Add Course Button */
button {
    width: 100%;
    padding: 12px;
    background: var(--btn-green); /* Green Color */
    color: var(--text-color);
    font-size: 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
    font-weight: bold;
}

button:hover {
    background: var(--btn-green-hover); /* Dark Green Hover */
}


</style>
</head>
<body>
    <h2>Add New Course</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Course Name" required>
        <textarea name="description" placeholder="Course Description" required></textarea>
        <input type="file" name="image" required>
        <button type="submit">Add Course</button>
    </form>
</body>
</html>
