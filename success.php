<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Success</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  .container {
    max-width: 400px;
    margin: 50px auto;
    text-align: center;
  }

  .success-message {
    color: #28a745; /* Green color */
    font-size: 24px;
    margin-bottom: 20px;
  }

  .tick-icon {
    color: #28a745; /* Green color */
    font-size: 60px;
    margin-bottom: 20px;
  }
  
  /* Add custom styles for the button */
button {
  background-color: #4CAF50; /* Green background color */
  color: white; /* White text color */
  padding: 10px 20px; /* Add padding to the button */
  border: none; /* Remove border */
  border-radius: 5px; /* Add rounded corners */
  cursor: pointer; /* Add pointer cursor on hover */
  font-size: 16px; /* Set font size */
}

/* Add hover effect for the button */
button:hover {
  background-color: #45a049; /* Darker green background color on hover */
}

</style>
</head>
<body>
<div class="container">
  <div class="tick-icon">&#10004;</div>
  <div class="success-message">Account created successfully!</div>
  <p>Your account has been successfully created. You can now log in using your credentials.</p>
  <a href="index.php"><button>Login</button></a>
</div>
</body>
</html>
