<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MuSiCaLy - Music Academy</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background: url('3.jpg') no-repeat center center/cover;
            margin: 0;
            padding: 0;
            background-size: cover;
            height: 1000px;
        }
        .main {
            width: 100%;
            min-height: 100vh;
            background: rgba(255, 255, 255, 0.8); /* Light overlay for readability */
        }
        
        /* Navbar Styling */
        .icon h3 {
            color: cornflowerblue;
            font-size: 30px;
            font-weight: bold;
        }
        .icon h5 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
        }

        /* Registration Form Styling */
        .form-container {
            width: 40%;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .form-container h2 {
            text-align: center;
            color: navy;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }
        .btn {
            background: navy;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            border-radius: 5px;
        }
        .btn:hover {
            background: darkblue;
        }
        /* Message Box Styles */
        .message {
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50%;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    padding: 15px;
    border-radius: 8px;
    z-index: 1000;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    opacity: 1;
    transition: opacity 0.5s ease-in-out;
}

/* Success Message - Green */
.success {
    background-color: #d4edda;
    color: #155724;
    border-left: 5px solid #28a745;
}

/* Error Message - Red */
.error {
    background-color: #f8d7da;
    color: #721c24;
    border-left: 5px solid #dc3545;
}

/* Fade-in Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message {
    animation: fadeIn 0.5s ease-in-out;
}


        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .form-container {
                width: 85%;
                padding: 20px;
            }
        }

    </style>
</head>
<body>
    <div class="icon">
        <h3>MuSiCaLy</h3>
        <h5>Music Academy</h5>
    </div>

    <!-- Registration Form -->
    <div class="form-container">
        <h2>Registration Form</h2>
        <form action="reg.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required>

            <label for="address">Address:</label>
            <textarea name="address" id="address" rows="3" required></textarea>

            <label for="branch">Your interest:</label>
            <select name="branch" id="branch" required>
                <option value="Instrumental Training">Instrumental Training</option>
                <option value="Vocal Training">Vocal Training</option>
                <option value="Music Theory Basics">Music Theory Basics</option>
                <option value="Introduction to Singing Styles">Introduction to Singing Styles</option>
                <option value="Simple Songwriting & Lyrics">Simple Songwriting & Lyrics</option>
                <option value="Rhythm & Percussion">Rhythm & Percussion</option>
            </select>

            

            <label for="slot">Slot:</label>
            <select name="slot" id="slot" required>
                <option value="Morning">Morning</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
            </select>

            
            <button type="submit" class="btn">Submit</button>
        </form>
        <a href="logout.php">Logout</a>
    </div>

</body>
</html>
<?php
if (isset($_SESSION['success'])) {
    echo "<p class='message success'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']); // Clear message after showing
}
if (isset($_SESSION['error'])) {
    echo "<p class='message error'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']); // Clear message after showing
}
?>






