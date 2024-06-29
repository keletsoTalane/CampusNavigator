<?php
include("connection.php");
//Query to count number of registered users
$numUsers = "SELECT COUNT(*) as total FROM users";
$numUsersResults = $con->query($numUsers)->fetch_assoc();

//Query to count number of registered staff members
$numStaff= "SELECT COUNT(*) as total_staff FROM staff";
$numStaffResults = $con->query($numStaff)->fetch_assoc();

// Query to fetch users' information
$usersQuery = "SELECT * FROM users";
$usersResults = $con->query($usersQuery);

// Query to fetch staff information
$securityQuery = "SELECT * FROM staff";
$securityResults = $con->query($securityQuery);

//Query to fetch feedback information
$feedbackQuery = "SELECT * FROM feedback";
$feedbackResults = $con->query($feedbackQuery);

//Query to fetch builing information
$buildingQuery = "SELECT * FROM building_information";
$buildingResults = $con->query($buildingQuery);

//Query to fetch contact information
$contactQuery = "SELECT * FROM contact";
$contactResults = $con->query($contactQuery);

//Query to fetch emergency information
$emergencyQuery = "SELECT * FROM emergencytbl";
$emergencyResults = $con->query($emergencyQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>
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
        
        <h2>About Academic Route</h2>
        <p>
            Academic Route was created by students for students,
            The objective of Academic Route is to create an advanced campus navigation system using modern technologies like mobile apps.
            The system aims to offer precise real-time location tracking for first-year students and others unfamiliar with campus buildings.
            It seeks to streamline navigation to lecture halls, facilities, cafeterias, etc., ensuring timely arrivals and reducing confusion,
            ultimately enhancing the overall campus experience.
        </p>

        <br>

        <h2>Our goals</h2>
        <p>
        We're here to enhance your campus journey.
                Our plan is to revolutionize campus navigation.
                our primary mission is to prioritize the comfort and ease of first-year students as they navigate campus life.
                We understand that starting university can be overwhelming, so we're dedicated to creating a welcoming and stress-free environment.
                Our goal is to develop a user-friendly campus navigation system specifically tailored to the needs of first-year students.
                Through modern technologies like web apps, we provide intuitive and precise guidance,
                ensuring that newcomers can find their way around campus with confidence.
            </p>

        <br>

        <h2>Our vision</h2>
        <p>
        At Academic Route, our vision is to make the
                transition between high school and
                university or the transfer
                from other universities easier for students,
                like finding a hidden shortcut on a crowded
                street or stumbling upon a friendly face in a bustling crowd.
                We aim to be the guiding light in the foggy maze of academic uncertainty,
                helping students navigate their way with confidence and clarity.
                With our innovative tools and unwavering support,
                we're here to transform the journey into a seamless adventure,
                where every step forward feels like a leap of progress.
                Join us as we pave the way to success,
                turning challenges into opportunities and uncertainties into triumphs. Together,
                let's embark on a journey of growth, empowerment, and endless possibilities.
             </p>

        <br>

        <h4>Find the website summary details below</h4> <br>

        <h2>Users Statistics</h2>
        <p>Total Number of registered Users thus far: <?php echo $numUsersResults['total']; ?></p>
    
        <br>
    
        <h2>Users Information</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>UserName</th>
            <th>Contact Info</th>
            <th>User password</th>
            <th>Date Registered</th>
        </tr>
        <?php
        if ($usersResults->num_rows > 0) {
            while ($row = $usersResults->fetch_assoc()) {
                echo "<tr>
                            <td>" . $row["user_id"] . "</td>
                            <td>" . $row["user_name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["password"] . "</td>
                            <td>" . $row["date"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>
    </table>

    <br>

<h2>Security Information</h2>

<p>There are  <?php echo $numStaffResults['total_staff']; ?> Security Officers ready to assist the users with any sort of emergencies.</p>
<table>
<tr>
    <th>Security ID</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Staff Number</th>
    <th>Username</th>
    <th>Password</th>
    <th>Role</th>
</tr>
<?php
if ($securityResults->num_rows > 0) {
    while ($row = $securityResults->fetch_assoc()) {
        echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["surname"] . "</td>
                    <td>" . $row["staff_number"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["usertype"] . "</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No feedback found</td></tr>";
}
?>
</table>
        <br>

        <h2>Users Feedback</h2>
        <table>
        <tr>
            <th>Feedback ID</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Date Logged</th>
        </tr>
        <?php
        if ($feedbackResults->num_rows > 0) {
            while ($row = $feedbackResults->fetch_assoc()) {
                echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["rating"] . "</td>
                            <td>" . $row["comment"] . "</td>
                            <td>" . $row["feedback_timestap"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No feedback found</td></tr>";
        }
        ?>
    </table>

    <br>
    <h2>Users Seeking Assistance</h2>
    <table>
        <tr>
            <th>Contact ID</th>
            <th>UserName</th>
            <th>Contact Info</th>
            <th>Reason for Contacting</th>
            <th>Date Logged</th>
        </tr>
        <?php
        if ($contactResults->num_rows > 0) {
            while ($row = $contactResults->fetch_assoc()) {
                echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["first_name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["reason_for_contact"] . "</td>
                            <td>" . $row["Date"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>
    </table>
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
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>
    </table>
        <br>

        <h2>Building information</h2>
        <table>
        <tr>
            <th>Building ID</th>
            <th>Building Name</th>
            <th>Building Purpose</th>
            <th>Building Description</th>
        </tr>
        <?php
        if ($buildingResults->num_rows > 0) {
            while ($row = $buildingResults->fetch_assoc()) {
                echo "<tr>
                            <td>" . $row["building_id"] . "</td>
                            <td>" . $row["building_name"] . "</td>
                            <td>" . $row["building_purpose"] . "</td>
                            <td>" . $row["building_description"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No building information found</td></tr>";
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