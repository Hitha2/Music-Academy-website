<?php
include('authenticate.php'); 
include('db_config.php');

echo "<h2>Welcome, " . $_SESSION['admin_username'] . "!</h2>";
echo '<a href="logout.php">Logout</a>';

$result = mysqli_query($conn, "SELECT * FROM courses");

echo '<a href="add_course.php">Add New Course</a><br><br>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="course">';
    echo '<img src="uploads/' . $row['image'] . '" alt="Course Image" width="100">';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<a href="edit_course.php?id=' . $row['id'] . '">Edit</a> | ';
    echo '<a href="delete_course.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure?\')">Delete</a>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <style>
     /* Root Variables for Easy Theme Customization */
:root {
    --primary-color: #ff5733;  /* Accent color */
    --text-color: #fff;        /* White text */
    --title-color: #ffcc00;    /* Title color */
    --bg-overlay: rgba(0, 0, 0, 0.6); /* Background overlay */
    --card-bg: rgba(255, 255, 255, 0.95); /* Semi-transparent card background */
    --btn-hover: #d42f00; /* Button hover color */
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

/* Main Container */
.container {
    width: 85%;
    max-width: 900px;
    padding: 20px;
    background: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
    margin-top: 20px;
}

/* Header Title */
h2 {
    color: var(--title-color);
    font-size: 28px;
    text-transform: uppercase;
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    margin-bottom: 15px;
}

/* Navigation Links */
a {
    text-decoration: none;
    font-weight: bold;
    padding: 10px 15px;
    border-radius: 6px;
    transition: 0.3s ease-in-out;
}

/* Buttons */
.header-buttons {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.header-buttons a {
    background: var(--primary-color);
    color: var(--text-color);
}

.header-buttons a:hover {
    background: var(--btn-hover);
}

/* Course Cards */
.course {
    background: #fff;
    padding: 15px;
    margin: 15px 0;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    transition: transform 0.3s ease-in-out;
}

.course:hover {
    transform: scale(1.05);
}

/* Course Image */
.course img {
    max-width: 120px;
    height: auto;
    border-radius: 8px;
    margin-right: 20px;
}

/* Course Text */
.course h3 {
    margin: 5px 0;
    color: #222;
    font-size: 20px;
}

.course p {
    color: #666;
    font-size: 16px;
    max-width: 70%;
}

/* Edit & Delete Buttons */
.course a {
    margin-right: 10px;
    padding: 8px 12px;
    border-radius: 5px;
    font-weight: bold;
    transition: 0.3s;
}

/* Edit Button */
.course a:nth-child(4) {
    background-color: #ffcc00;
    color: black;
}

.course a:nth-child(4):hover {
    background-color: #e6b800;
}

/* Delete Button */
.course a:nth-child(5) {
    background-color: #dc3545;
    color: white;
}

.course a:nth-child(5):hover {
    background-color: #c82333;
}
</style>

</head>
</html>