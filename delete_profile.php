<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['user_name'];
        $user_email = $row['email'];
        $password = $row['password'];
    }
    else {
        echo "Profile details not found";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body{
        background-image: url('Images/compass.jpg');
        background-size: 100%;
    }
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }
        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }
        #box {
            margin: auto;
            width: 300px;
            padding: 20px;
        }
        input[type = "submit"] {
        background-color: blue;
        color :#fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;

    }
    input[type="submit"]:hover{
        background-color: lightblue;
    }
    .back-to-main {
        display: block;
        margin: 20px auto;
        width: fit-content;
    }
    </style>
</head>
<body>
    <div id="box">
        <form action="delete_profile_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>"><br><br>
            <div style="font-size: 20px; margin: 10px;">Delete Profile</div>
            <h4>Username</h4>
            <input id="text" type="text" name="user_name" value="<?php echo $user_data['user_name']; ?>"><br><br>
            <h4>User Email</h4>
            <input id="text" type="text" name="user_email" value="<?php echo $user_data['email']; ?>"><br><br>
            
            <?php echo "Are you sure you want to delete your profile?"; ?> <br>
            <input id="button" type="submit" value="YES"><br><br>
            <?php
            if (!empty($errorMsg)) {
                echo '<div style="color: red;">' . $errorMsg . '</div>';
            }
            if (!empty($successMsg)) {
                echo '<div style="color: green;">' . $successMsg . '</div>';
            }
            ?>
        </form>
        <br><br>
        <a href = "index.php" class="back-to-main">
            <input type = "submit" value = "BACK TO MAIN">
            </a>
        
    </div>
</body>
</html>

