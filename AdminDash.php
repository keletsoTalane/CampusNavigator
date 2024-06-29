<?php
session_start();

include("connection.php");



if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet"href="dashboard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous"
     referrerpolicy="no-referrer" />
</head>
<body>
    <div class ="sidebar">
       <div class = "logo" ></div>
       <ul class="menu">
        <li class = "active">
            <a href="calendar.php" >
                <i class = "fas fa-tachometer-alt"></i>
                <span> Academic Route </span>
            </a>
        </li>

        <li> 
            <a href="addSecurity.php">
                <i class = "fas fa-user"></i>
                <span> Add security </span>
            </a>
        </li>

        <li> 
            <a href="qr-code-generator-main/index.php">
                <i class="fa-solid fa-building-columns"></i>
                <span> Scan QR codes </span>
            </a>
        </li>

        <li> 
            <a href="add_building.php">
                
                 <i class = "fas fa-star"></i>
                 <span> Add Building</span></a>
            </a>
        </li>

        <li> 
            <a href="building_information_admin.php">
                
                 <i class = "fas fa-star"></i>
                 <span> View Building</span></a>
            </a>
        </li>

        <li> 
            <a href="https://app.mappedin.com/editor/edit/665a17bc6b9751000ba5a089">
                <i class= "fa-solid fa-location-dot" > </i>
                <span>   Edit Map </span>
            </a>
        </li>
        <li class = "logout"> 
            <a href="#">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span> <a href="logout.php">Logout</a></span>
            </a>
        </li>
        <li> 
            <a href="summary_report.php">
                
                 <i class = "fas fa-star"></i>
                 <span>Summary Report</span></a>
            </a>
        </li>

       </ul>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
         <div class="header--title">
            <span><br> Hello <?php echo $_SESSION["username"]; ?></span>
            <h2>Admin  Dashboard </h2>
         </div>
         
    </div>
        
    <div class = "notification--container">
        <h3 class="main--title">Notification</h3>
        <div class = "notification--wrapper">
            <div class="notification">
                <div class="description">
                    <div class="alerts">
                        <span class="title"> notifications for</span>
                        <span class="amount-value"> Emergency</span>
                    </div>
                    <i class="fa-sharp fa-regular fa-bell"></i>
                    <span class="alert"> **************</span>
                </div>
               
            </div>


            <div class = "notification--wrapper">
                <div class="notification">
                    <div class="description">
                        <div class="alerts">
                            <span class="title"> notifications for</span>
                            <span class="amount-value"> Campus current activity </span>
                        </div>
                        <i class="fa-sharp fa-regular fa-bell"></i>
                        <span class="alert"> **************</span>
                    </div>
        </div>
 
    </div>

    <div class = "notification--wrapper">
        <div class="notification">
            <div class="description">
                <div class="alerts">
                    <span class="title"> notifications for </span>
                    <span class="amount-value"> health and wellness </span>
                </div>
                <i class="fa-sharp fa-regular fa-bell"></i>
                <span class="alert"> **************</span>
            </div>

    </div>

    <div class = "notification--wrapper">
        <div class="notification">
            <div class="description">
                <div class="alerts">
                    <span class="title"> notifications for</span>
                    <span class="amount-value"> campus operating hours </span>
                </div>
                <i class="fa-sharp fa-regular fa-bell"></i>
                <span class="alert"> **************</span>
            </div>

            
            
</body>
</html>