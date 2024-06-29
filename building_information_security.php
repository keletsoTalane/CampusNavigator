<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Information</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('Images/addB.jpg') no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            width: 90%;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border: 3px solid #8B008B;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-decoration: underline;
            color: #8B008B;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p {
            font-size: 18px;
            text-align: justify;
            padding: 0 20px;
        }
        form {
            margin-top: 20px;
        }
        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #8B008B;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #9932CC;
        }
        .back-to-main {
            display: block;
            margin: 20px auto;
            width: fit-content;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select a Building</h1>
        <form action="display_info_security.php" method="post">
            <?php
            
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "academic_route";

            $conn = new mysqli($host, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT building_id, building_name FROM building_information";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<select name="selected_building">';
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['building_id'] . '">' . $row['building_name'] . '</option>';
                }
                echo '</select>';
            } else {
                echo 'No buildings found.';
            }

            $conn->close();
            ?>
            <br>
            <input type="submit" value="Show Details">
        </form>
        <form action="securityDash.php" method="get" class="back-to-main">
            <input type="submit" value="Back to Main">
        </form>
    </div>
</body>
</html>
