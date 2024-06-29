<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Popup</title>
    <style>
        /* Style for the overlay background */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: red; /* Semi-transparent black */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Style for the popup container */
        .popup {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }

        /* Style for the close button */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        input[type = "submit"] {
        background-color: red;
        color :#fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;

    }
    input[type="submit"]:hover{
        background-color: pink;
    }
    .back-to-main {
        display: block;
        margin: 20px auto;
        width: fit-content;
    }
    </style>
</head>
<body>
    <!-- Example popup -->
    <div class="overlay">
        <div class="popup">
            <span class="close-button">×</span>
            <h2>Help is on the way</h2>
           
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $location = $_POST['location'];
                $description = $_POST['description'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "academic_route";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO emergencyTBL(location, description) VALUES ('$location', '$description')";

                if ($conn->query($sql) === TRUE) {
                    echo "Sent!! Successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close database connection
                $conn->close();
                
            }
            ?>
<a href = "index.php" class="back-to-main">
            <input type = "submit" value = "BACK TO MAIN">
            </a>

        </div>
    </div>

    <!-- JavaScript to close the popup when clicking the close button -->
    <script>
        document.querySelector('.close-button').addEventListener('click', function() {
            document.querySelector('.overlay').style.display = 'none';
        });
    </script>
</body>
</html>
