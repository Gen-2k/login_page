<?php
// Start session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Define document metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set page title -->
    <title>Sign Up Page</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="signup.css">
    <style>
        /* Shake animation */
        @keyframes shake {
            0% { transform: translateX(0); }
            10%, 90% { transform: translateX(-10px); }
            30%, 50%, 70% { transform: translateX(10px); }
            100% { transform: translateX(0); }
        }
        /* Error message styles */
        .error-message {
            color: red;
            animation: shake 0.5s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Sign-up container -->
    <div class="signup-container">
        <!-- Sign-up heading -->
        <h2>Sign Up</h2>
        <!-- Error message -->
        <?php
        // Display error message if it exists in session
        if (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            // Remove error message from session
            unset($_SESSION['error']);
        }
        ?>
        <!-- Sign-up form -->
        <form action="register.php" method="post">
            <!-- Name input field -->
            <div style="position:relative; margin-bottom: 20px;">
                <input type="text" id="name" name="name" required>
                <label for="name" class="input-label">Name</label>
            </div>
            <!-- Email input field -->
            <div style="position:relative; margin-bottom: 20px;">
                <input type="email" id="email" name="email" required>
                <label for="email" class="input-label">Email</label>
            </div>
            <!-- Password input field -->
            <div style="position:relative;">
                <input type="password" id="password" name="password" required>
                <label for="password" class="input-label">Password</label>
            </div>
            <!-- Submit button -->
            <input type="submit" value="Sign Up">
        </form>
        <!-- Login link -->
        <p style="text-align: center; margin-top: 15px;color: #ffffff;">Already have an account? <a href="index.php">Login</a></p>
    </div>
    <!-- JavaScript script for input field animations -->
    <script src="signup_form_animations.js"></script>
</body>
</html>
  