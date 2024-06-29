<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="servicesStyle.css">
  <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css>
  <title>Services Page</title>
</head>
<body>

<div class="content">
<header>
        <h2 class="logo">Academic Route</h2>
        <nav class="navigation">
            <a href="login.php">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="contact.php">Contact</a>
            <button class="btnLogin-popup">User Login</button>
            <button class="btnLogin-popup" onclick="location.href='sec_adminLogin.php'">Staff Login</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span> 
                    <input type="email" name="email"required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Login</button>
                <input type="hidden" name="login" value="1">
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span> 
                    <input type="text" name="user_name" required>
                    <label>UserName</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span> 
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> 
                    <input type="password" name="password_2" required>
                    <label>Confirm Password</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <input type="hidden" name="register" value="1">
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">login</a></p>
                </div>
            </form>
        </div>
    </div>

</div>

<div class="additional-content">
  <section id ="service" class="servicesBody">
    <div  class="container_service">
    <div class="service-wrapper">
        <div class="service">
           <h1>Our Service <span></span></h1> 
           <div class="cards">
            <div class="card">
                <i class="fas fa-route"></i>
                <h2>Route Planning</h2>
                <p>
    
                    Algorithms to calculate and display the shortest, fastest, or accessible routes
                </p>
            </div>
    
            <div class="card">
                <i class="fa-solid fa-layer-group"></i>
                <h2>Feedback Mechanism</h2>
                <p>
                    Allow users to rate the accuracy of directions and provide comments
                </p>
            </div>
    
            <div class="card">
                <i class="fa-solid fa-building"></i>
                <h2>Building Infromation</h2>
                <p>
    
                    Provide details about each building, such as purpose (lecture hall, cafeteria, etc.)

                </p>
            </div>
    
            <div class="card">
                <i class="fa-solid fa-map-marker"></i>
                <h2>Location Tracking</h2>
                <p>
    
                    Utilize GPS or other location services for real-time tracking
                </p>
            </div>
    
            <div class="card">
                <i class="fa-solid fa-wheelchair"></i>
                <h2>Accessiblity Feature</h2>
                <p>
    
                    Consideration for users with disabilities, such as wheelchair accessibility information
                </p>
            </div>
           </div>
        </div>
    </div>
    
    </div>
    </section>
</div>

<script src="script.js"></script>
              <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
              <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
          
    
</body>
</html>