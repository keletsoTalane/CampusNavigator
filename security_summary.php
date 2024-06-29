<?php
include("connection.php");

//Query to count number of emergency requests
$numEmergencies = "SELECT COUNT(*) as total FROM emergencytbl";
$numEmergenciesResults = $con->query($numEmergencies)->fetch_assoc();

//Query to fetch emergency information
$emergencyQuery = "SELECT * FROM emergencytbl";
$emergencyResults = $con->query($emergencyQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Summary</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
        }

        body {
            background-color: #2a2a3e;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .back-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .chart-container {
            position: relative;
            height: 40vh;
            margin-bottom: 50px;
        }

        .back-button {
            border: 0;
            background: #28a745;
            color: #fff;
            width: auto;
            height: 3.5em;
            padding: 0 2.25em;
            border-radius: 3.5em;
            font-size: 1em;
            text-transform: uppercase;
            font-weight: 600;
            transition: background-color 0.15s;
            border-bottom: 5px;
        }
    </style>

</head>
<body>
<div class="container">
        <h1>Summary Report</h1>
        <button onclick="window.history.back()" class="back-button">Back</button>
       
        <p>Below is the emergency request statistic.
            <br>
            There has been <?php echo $numEmergenciesResults['total']; ?>  user emergency requests thus far.
        </p>
        <br>
        <h2>Emergency Information</h2>
    <table>
        <tr>
            <th>Emergency ID</th>
            <th>Emergency Location</th>
            <th>Emergency Description</th>
        </tr>
        <?php
        if ($emergencyResults->num_rows > 0) {
            while ($row = $emergencyResults->fetch_assoc()) {
                echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["location"] . "</td>
                            <td>" . $row["description"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No emergencies found</td></tr>";
        }
        ?>
    </table>

    <h6>End...</h6>
    <button onclick="window.history.back()" class="back-button">Back</button>
    </div>

    <br>

    <div class="button-container">
        <button onclick="printPreview()" class="back-button">Print Preview</button>
    </div>
    

    <script>
        function printPreview() {
            window.print();
        }

    </script>
</body>
</html>