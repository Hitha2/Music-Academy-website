<?php
session_start();
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
    /* Root Variables for Easy Customization */
:root {
    --primary-color: #007bff;  /* Blue Theme */
    --text-color: #ffffff;     /* White Text */
    --title-color: #ff5733;    /* 🔥 Updated: Vibrant Orange Admin Login Title */
    --bg-overlay: rgba(0, 0, 0, 0.6); /* Background Overlay */
    --form-bg: rgba(255, 255, 255, 0.95); /* Semi-transparent Form */
    --btn-green: #28a745; /* Green Login Button */
    --btn-green-hover: #218838; /* Dark Green Hover */
    --error-color: #ff0000; /* Red Error Message */
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

/* Login Form */
form {
    width: 80%;
    max-width: 400px;
    background: var(--form-bg);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
}

/* Page Title - Updated to Vibrant Orange */
h2 {
    color: var(--title-color);
    font-size: 26px;
    text-transform: uppercase;
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    margin-bottom: 20px;
}

/* Error Message */
p {
    color: var(--error-color);
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Input Fields */
input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: 0.3s;
}

/* Input Focus Effect */
input:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
}

/* Submit Button */
button {
    width: 100%;
    padding: 12px;
    background: var(--btn-green); /* Green Button */
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
    <form method="POST">
        <h2>Admin Login</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
