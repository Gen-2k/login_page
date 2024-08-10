<?php
// Include the database connection file
include 'connect.php';

// Set the content type header to JSON
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate email address
    $email = $_POST["email"];

    // Check if email exists in the database
    $query = "SELECT * FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, proceed with password reset process
        // Generate reset token
        $token = bin2hex(random_bytes(32));

        // Update token in the database
        $updateQuery = "UPDATE users SET ResetToken = '$token' WHERE Email = '$email'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            // Send reset email
            $resetLink = "http://example.com/reset_password.php?token=$token";
            $to = $email;
            $subject = "Password Reset";
            $message = "Click the following link to reset your password: $resetLink";
            $headers = "From: your_email@example.com" . "\r\n" .
                       "Reply-To: your_email@example.com" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();

            if (mail($to, $subject, $message, $headers)) {
                // Return JSON response
                echo json_encode(["message" => "Password reset email has been sent to your email address."]);
            } else {
                // Return JSON response
                echo json_encode(["error" => "Failed to send password reset email. Please try again later."]);
            }
        } else {
            // Return JSON response
            echo json_encode(["error" => "Failed to generate reset token. Please try again later."]);
        }
    } else {
        // Return JSON response
        echo json_encode(["error" => "The email address is not registered."]);
    }
} else {
    // Return JSON response with HTTP status code 405 (Method Not Allowed)
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
