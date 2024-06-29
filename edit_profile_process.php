<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Update the user profile in the database
    $sql = "UPDATE users SET user_name = '$user_name', email = '$email', password = '$password' WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Profile updated successfully";

        //redirect to profile page
        header("location: profile.php");
        exit;
    }
    else {
        echo "Error updating profile: " . $con->error;
    }
}
?>