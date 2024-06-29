<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password)) {
            $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])==true) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    echo "<div class='alert alert-success'>Login successful!</div>";
                    die;
                } else {
                    echo "<script>alert('Invalid email or password.');</script>";
                }
            } else {
                echo "<script>alert('Invalid email or password.');</script>";
            }
        } else {
            echo "<script>alert('Please fill in all fields.');</script>";
        }


    }

    if (isset($_POST['register'])) {
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];

        if (!empty($user_name) && !empty($email) && !empty($password) && !empty($password_2) && $password === $password_2) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email format.');</script>";
                exit;
            }
            
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $user_id = random_num(5);
            $query = "INSERT INTO users (user_id, user_name, email, password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, 'ssss', $user_id, $user_name, $email, $hashed_password);
            mysqli_stmt_execute($stmt);

            echo "<script>alert('Registered Successfully, login now.'); document.location.href = 'login.php';</script>";
            header("Location: login.php");
            die;
        } else {
            echo "<script>alert('Please fill in all fields correctly.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type ="text/css" href="styleLogin.css">
</head>
<body>
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
                    <p>Sign in a visitor <a href="#" class="login-link">Sign Up</a></p>
                    <p>Login as staff member <a href="#" class="login-link">login</a></p>
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
                    <p>Sign in a visitor <a href="#" class="login-link">Sign Up</a></p>
                    <p>Login as staff member <a href="security.php" class="login-link">login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
