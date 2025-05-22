<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MuSiCaLy</title>
    <link rel="stylesheet" href="style1.css">
    <style>
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
        .message {
            text-align: center;
            font-size: 18px;
            padding: 10px;
            margin: 10px auto;
            width: 50%;
            border-radius: 5px;
        }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<!-- ✅ Show Success or Error Messages at the Top -->
<?php
if (isset($_SESSION['success'])) {
    echo '<p class="message success">' . $_SESSION['success'] . '</p>';
    unset($_SESSION['success']); // Clear message after displaying
}
if (isset($_SESSION['error'])) {
    echo '<p class="message error">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']); // Clear message after displaying
}
?>

<div class="main">
    <div class="navbar">
        <div class="icon">
            <h2>MuSiCaLy</h2>
            <h5>Music Academy</h5>
        </div>
        <div class="menu">
            <ul>
                <li><a href="home.html">HOME</a></li>
                <li><a href="about4.html">ABOUT</a></li>
                <li><a href="service3.html">SERVICE</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="index.php">LOGIN</a></li>
            </ul>
        </div>
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
    </div>

    <div class="content">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Get in touch with us using the form below or reach out via email or phone.</p>
        <div class="container">
            <form action="contact_process.php" method="post"> <!-- ✅ Ensure it points to contact_process.php -->
                <div class="input-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-group">
                    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
        <div class="contact-info">
            <p><strong>Address:</strong> Music Street, Mangalore, India</p>
            <p><strong>Phone:</strong> +91 98765 43210</p>
            <p><strong>Email:</strong> contact@musicaly.com</p>
        </div>
    </div>
</div>

<script>
    function toggleMenu() {
        document.querySelector(".menu").classList.toggle("active");
    }
</script>

</body>
</html>
