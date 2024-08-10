<?php
// Start session
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'login_db';
$username = 'root';
$password = ''; // Assuming no password for local development

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Consider hashing the password

        // Prepare SQL statement to prevent SQL injection
        $stmt = $pdo->prepare("INSERT INTO users (Username, Email, Password) VALUES (:username, :email, :password)");

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); // Hash password before storing, e.g., password_hash($password, PASSWORD_DEFAULT)

        // Execute the statement
        $stmt->execute();

        // Redirect or inform the user of successful registration
        $_SESSION['message'] = 'Registration successful!';
        header('Location: success.php');
    }
} catch (PDOException $e) {
    // Check if the error is due to a duplicate entry for the email address
    if ($e->getCode() == '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
        // Handle the duplicate email address error
        $_SESSION['error'] = "The email address provided is already registered. Please use a different email address.";
        header('Location: signup.php');
        exit;
    } else {
        // Handle other database errors
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header('Location: signup.php');
        exit;
    }
}
?>
