<?php
// Start the session
session_start();

// Include the database connection file
include("connection.php");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $building_name = htmlspecialchars(mysqli_real_escape_string($con, $_POST["building_name"]));
    $building_purpose = htmlspecialchars(mysqli_real_escape_string($con, $_POST["building_purpose"]));
    $building_description = htmlspecialchars(mysqli_real_escape_string($con, $_POST["building_description"]));
    
    // Prepare an SQL statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO building_information (building_name, building_purpose, building_description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $building_name, $building_purpose, $building_description);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Building Information</title>
    <link rel="stylesheet" href="add_buildingInfo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <form action="" method="POST">
        <h1>Add Building Information</h1>
        <div class="input-box">
            <textarea name="building_name" placeholder="Building Name" maxlength="100" required></textarea>
        </div>

        <div class="input-box">
            <textarea name="building_purpose" placeholder="Building Purpose" maxlength="700" required></textarea>
        </div>

        <div class="input-box">
            <textarea name="building_description"  placeholder="Building Description" maxlength="700" required></textarea>
        </div>

        <button type="submit" class="btn">Add Building</button>
    </form>
</div>
<button type="button" class="btn" onclick="window.location.href='AdminDash.php'">Back</button>
</body>
</html>
