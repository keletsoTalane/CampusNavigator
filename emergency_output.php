<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Emergencies</title>
    <!-- Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 50px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-back {
            margin-bottom: 20px;
        }
        .table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th {
            background-color: #f8f9fa; /* Bootstrap default table header background */
            color: #333;
        }
        td {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="securityDash.php" class="btn btn-outline-primary btn-back">Back to Security Dashboard</a>
        <h1>Campus Emergencies</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Emergency Location</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    include("connection.php");

                    $sql = "SELECT * FROM emergencytbl";
                    $result = $con->query($sql);

                    if (!$result) {
                        die("Invalid query:" . $con->error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["location"]) . "</td>
                                <td>" . htmlspecialchars($row["description"]) . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
