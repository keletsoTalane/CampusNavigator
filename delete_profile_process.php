<?php
// Start the session
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$id = $user_data['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Check if the user is logged in

    $sql = "DELETE FROM users WHERE id = $id";

    $con->query($sql);
}

// Redirect to the login page
header("Location: login.php");
exit;
?>