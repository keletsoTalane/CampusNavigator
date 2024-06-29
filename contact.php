<?php
// Assuming you have already established a database connection
// Replace the placeholders with your actual database credentials

session_start();

include("connection.php");
include("functions.php");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $first_name = mysqli_real_escape_string($con, $_POST["firstname"]);
    $email = mysqli_real_escape_string($con, $_POST["email3"]);
    $reason_for_contact = mysqli_real_escape_string($con, $_POST["subject"]);

    // Insert data into the 'contact' table
    $sql = "INSERT INTO contact (first_name, email, reason_for_contact) VALUES ('$first_name', '$email', '$reason_for_contact')";

    if ($con->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


?>


<!DOCTYPE 
html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="contactStyle.css">
    <title>Contact Page</title>
</head>
<body>
<div class="content">
<header>
        <h2 class="logo">Academic Route</h2>
        <nav class="navigation">
            <a href="login.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="contact.php">Contact</a>
            <button class="btnLogin-popup">User Login</button>
            <button class="btnLogin-popup" onclick="location.href='sec_adminLogin.php'">Staff Login</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span> 
                    <input type="email" name="email"required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Login</button>
                <input type="hidden" name="login" value="1">
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span> 
                    <input type="text" name="user_name" required>
                    <label>UserName</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span> 
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
                    <input type="password" name="password_2" required>
                    <label>Confirm Password</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <input type="hidden" name="register" value="1">
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">login</a></p>
                </div>
            </form>
        </div>
    </div>

</div>

<div class="additional-content">
    <div class="container">
        <div style="text-align:center">
          <h2>Contact Us</h2>
          <p>leave us a message:</p>
        </div>
        <div class="row">
          <div class="column">
            <img src="images/Locations_Of_TUT.png" style="width:100%">
          </div>
          <div class="column">
            <form  method="POST">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Your name..">

              <label for="email">Email Address</label>
              <input type="email" id="email" name="email3" placeholder="Your email address is .." style="width:100%; height: 40px;" >
              
              <label for="subject">Reason for contact</label>
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
              <input type="submit" name="submit" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
          <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      

</body>
</html>