<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
</head>

<style>
    body{
        background-image: url('Images/compass.jpg');
        background-size: 100%;
    }
    .profile_tbl{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 800px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        margin-left: auto;
        margin-right: auto;
        
    }

    .profile_tbl thead tr{
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
        font-size: 1.5em;
    }

    .profile_tbl th, .profile_tbl td{
        padding: 12px 15px;
    }

    .profile_tbl tbody tr{
        border-bottom: 2px solid #dddddd;
    }

    .profile_tbl tbody td{
        font-size: 1.2em;
    }

    .profile-header{
        text-align: center;
        font-weight: bold;
        font-size: 1.5em;
        
    }

    /* Style the button */
input[type="submit"] {
    background-color: lightblue; 
    color: white;
    border: none;
    padding: 15px 32px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    /* Add a subtle shadow on hover */
    transition: box-shadow 0.3s ease;
}

/* Hover effect: change background color and add shadow */
input[type="submit"]:hover {
    background-color: blue; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
<body>

        <div>
        <h1 class="profile-header"><b>Your Profile</b></h1>
            <table class="profile_tbl">
                <thead>
                    <tr>
                        
                    </tr>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>Date of Registration</th>
                        <th>Edit Profile</th>
                        <th>Delete Profile</th>
                    </tr>
                </thead>

                <tbody>
                    
                        <tr>
                            <td> <?php echo $user_data['user_id']; ?> </td>
                            <td> <?php echo $user_data['user_name']; ?> </td>
                            <td> <?php echo $user_data['email']; ?> </td>
                            <td> <?php echo $user_data['date']; ?> </td>
                            <td> <a class='btn btn-primary btn-sm' href="edit_profile.php">EDIT</a> </td>
                            <td> <a class='btn btn-danger btn-sm' href="delete_profile.php">DELETE</a> </td>
                        </tr>
                    
                </tbody>
            </table>
            <br><br><br>

            <form action="index.php" method="get">
        <input type="submit" value="Back Main Page">
        <button onclick="printPreview()" class="back-button">Print Profile Data</button>

<script>
    function printPreview() {
        window.print();
    }

</script>
</body>
</html>