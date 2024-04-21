<?php
// Start session
session_start();

// Database configuration
$servername = "localhost"; 
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "login_db"; // MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username/email and password from the form
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];
    
    // Prepare a SQL statement to check if the username/email and password match
    $sql = "SELECT * FROM users WHERE (username = '$usernameOrEmail' OR email = '$usernameOrEmail') AND password = '$password'";
    $result = $conn->query($sql);
    
    // Check if a row is returned
    if ($result->num_rows > 0) {
        // Authentication successful, store username/email in session
        $_SESSION['username_or_email'] = $usernameOrEmail;
        // Redirect to welcome page
        header("Location: welcome_page.php");
        exit;
    } else {
        // Authentication failed, store error message in session
        $_SESSION['error'] = "Invalid username/email or password.";
        // Redirect back to login page
        header("Location: index.php");
        exit;
    }
}

// Close connection
$conn->close();
?>
