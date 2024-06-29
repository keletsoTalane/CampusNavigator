<?php
session_start();

include("connection.php");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $surname = mysqli_real_escape_string($con, $_POST["surname"]);
    $staff_number = mysqli_real_escape_string($con, $_POST["staff_number"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the 'staff' table
    $sql = "INSERT INTO staff (name, surname, staff_number, username, password) VALUES ('$name', '$surname', '$staff_number', '$username', '$hashed_password')";

    if ($con->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Security</title>
    <link rel="stylesheet" href="add_security.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com' crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <form action="" method="POST">
        <h1>Add Security Details</h1>
        <div class="input-box">
            <input type="text" name="name" placeholder="Security Name" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="text" name="surname" placeholder="Security Surname" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="text" name="staff_number" placeholder="Staff Number" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="text" name="username" placeholder="User Name" required>
            <i class='bx bxs-envelope'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock'></i>
        </div>

        <button type="submit" class="btn">Add Security</button>
    </form>

    <form action="AdminDash.php" method="get" class="back-to-main">
        <input type="submit" class="btn back-to-main-btn" value="Back to Main">
    </form>
</div>
</body>
</html>
