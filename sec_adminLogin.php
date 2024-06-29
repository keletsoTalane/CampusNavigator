<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM staff WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username']; 
        if ($row["usertype"] == "security") {
            $_SESSION["username"]=$username;
            header("Location: securityDash.php");
           
        } else if ($row["usertype"] == "admin") {
            $_SESSION["username"]=$username;
            header("Location: AdminDash.php");
            
        } else {
            echo "User Name or Password is Incorrect";
        }
    } else {
        echo "User Name or Password is Incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="sec_adminLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
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
            <button class="btnLogin-popup">Staff Login</button>
        </nav>
    </header>
    

</div>
<div class="wrapper">
    <form action="#" method="POST">
        <h1>Staff Login</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="User Name" required>
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock'></i>
        </div>
        <div class="options">
            <div class="remember-me">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Remember Me</label>
            </div>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
</body>
</html>
