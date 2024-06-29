<?php

$building_name = "";
$building_purpose = "";
$building_description = "";


if (isset($_POST['selected_building'])) {
    $selected_building_id = $_POST['selected_building'];

    
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "academic_route";

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT building_name, building_purpose, building_description FROM building_information WHERE building_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selected_building_id);
    $stmt->execute();
    $stmt->bind_result($building_name, $building_purpose, $building_description);
    $stmt->fetch();

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('images/addB.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 90%;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #FF69B4;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-family: 'Garamond', serif;
            font-size: 3rem;
            margin-bottom: 20px;
            color: #FF69B4;
            text-decoration: underline;
        }
        .building-info {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
            text-align: left;
        }
        .building-info p {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #FF69B4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #FFC0CB;
            color: #FF69B4;
        }
        .back-to-main {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Building Details</h1>
        <?php if ($building_name && $building_purpose && $building_description): ?>
            <div class="building-info">
                <p><strong>Name:</strong> <?php echo $building_name; ?></p>
                <p><strong>Purpose:</strong> <?php echo $building_purpose; ?></p>
                <p><strong>Description:</strong> <?php echo $building_description; ?></p>
            </div>
        <?php else: ?>
            <p>Select a building to view details.</p>
        <?php endif; ?>

        <!-- Back button -->
        <form action="building_information.php" method="get" class="back-to-main">
            <input type="submit" value="Back to Selection">
        </form>

        <form action="building_information_security.php" method="get" class="back-to-main">
            <input type="submit" value="Back to Main">
        </form>

        
    </div>
</body>
</html>
