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
    <title>Login Page</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="css/styles.css">
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
    <!-- Login container -->
    <div class="login-container">
        <!-- Login heading -->
        <h2>Login</h2>
        
        <!-- Error message -->
        <?php
        // Display error message if it exists in session
        if (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            // Remove error message from session
            unset($_SESSION['error']);
        }
        ?>
        
        <!-- Login form -->
        <form action="connect.php" method="post">
            
            <!-- Username input field -->
            <div style="position:relative; margin-bottom: 20px;">
                <input type="text" id="username_or_email" name="username_or_email" required>
                <label for="username_or_email" class="input-label">Username or Email</label>
            </div>

            <!-- Password input field -->
            <div style="position:relative;">
                <input type="password" id="password" name="password" required>
                <label for="password" class="input-label">Password</label>
            </div>
            <!-- Submit button -->
            <input type="submit" value="Login">
        </form>
        <!-- Login options -->
        <div class="login-options">
            <a href="#">Forgot password?</a>
        </div>
        <!-- Sign up link -->
        <p style="text-align: center; margin-top: 15px;color: #ffffff;">Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>

    <!-- JavaScript script for input field animations -->
    <script src="js/script.js"></script>
</body>
</html>