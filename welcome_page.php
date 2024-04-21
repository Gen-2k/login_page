<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome Page</title>
<style>
  /* Global styles */
  body, html {
    margin: 0;
    padding: 0;
    overflow: hidden; /* Prevent scrolling */
    background-color: rgb(17, 16, 16); /* Set background color */
  }

  /* Canvas styles */
  canvas {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1; /* Set canvas behind other elements */
  }

  h1 {
    position: absolute;
    top: 50%; /* Vertically center */
    left: 50%; /* Horizontally center */
    transform: translate(-50%, -50%); /* Centering */
    text-align: center;
    z-index: 1; /* Set h1 in front of canvas */
    color: rgb(255, 255, 255); /* Set text color */
    text-shadow: 2px 2px 4px rgba(217, 255, 0, 0.5); /* Add text shadow */
    padding: 20px; /* Add padding to create space around the text */
    background-color: rgba(0, 0, 0, 0.5); /* Set background color with opacity */
    border-radius: 10px; /* Add border radius to make it roundy */
    border: 2px solid rgba(255, 255, 255, 0.5); /* Add border with opacity */
  }
 /* Username styles */
 .username {
    color: red; /* Adjust font size as needed */
    font-weight: bold;
  }
</style>
</head>
<body>
<!-- Canvas element -->
<canvas id="canvas"></canvas>
<!-- Heading -->
<h1>WELCOME TO OUR PAGE <br>Hi <span class="username"><?php echo $_SESSION['username_or_email']; ?></span>,You have successfully logged in.</h1>
<script src="script.js"></script>
</body>
</html>
