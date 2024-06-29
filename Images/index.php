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
    <link rel = "stylesheet" type ="text/css" href ="styleDash.css">
    <title> Dashboard</title>
</head>
<body>
    
    <header>
        <div class="navbar">
            <div class="logo"> <a href="#"> Academic Route </a></div>
            <ul class=" link">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="building_information.php">buildingInfo</a></li>
            <li><a href="navigate.php">navigate</a></li>
            <li><a href="feedback.php">feedback</a></li>
            </ul>
            <a href="emergencyAssistance.php" class="action_btn"> Request Emergency Assistance </a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown_menu ">
        <li><a href="profile"> Profile</a></li>
            <li><a href="building_information.php"> buildingInfo</a></li>
            <li><a href="navigate.php"> navigate</a></li>
            <li><a href="feedback.php"> feedback</a></li>
            <li><a href="emergencyAssistance.php" class="action_btn"> Request Emergency Assistance </a> </li>
        </div>
    </header>
    <main>
        <section id="profile">
            <h1> Welcome to campus navigation</h1>
            <p> navigate with ease , Arrive with speed: <br>
                Your shourtcut to swift destination.
            </p>
            <br> Hello <?php echo $user_data['user_name']; ?>
             <a href="logout.php">Logout</a>
        </section>
    </main>
    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function () {         
               dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');

            toggleBtnIcon.classList = isOpen
            ? 'fa-solid fa-xmark'
            : 'fa-solid fa-bars'
        };
    </script>

</body>
</html>