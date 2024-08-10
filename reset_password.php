<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/forgetpassword.css"> <!-- Link to external stylesheet -->
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form id="resetPasswordForm">
            <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>">
            <label for="password">New Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="confirmPassword">Confirm Password:</label><br>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br>
            <button type="submit">Reset Password</button>
        </form>
    </div>

    <script>
        document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch("reset_password_handler.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    window.location.href = "login.php";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
