<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/forgetpassword.css"> <!-- Link to external stylesheet -->
</head>
<body>
    <div class="container">
        <h2>Forget Password</h2>
        <form id="forgetPasswordForm">
            <label for="email">Enter your email address:</label><br>
            <input type="email" id="email" name="email" required><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("forgetPasswordForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch("forget_password_handler.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
