<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="aboutStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>About Page</title>
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
    <div class="about-section about-section-bg">
        <h1>About Us Page</h1>
       <p class="about-text"> Academic Route was created by students for students,
                            The objective of Academic Route is to create an advanced campus navigation system using modern technologies like mobile apps.
                            The system aims to offer precise real-time location tracking for first-year students and others unfamiliar with campus buildings.
                            It seeks to streamline navigation to lecture halls, facilities, cafeterias, etc., ensuring timely arrivals and reducing confusion,
                            ultimately enhancing the overall campus experience.
                            </p>
      </div>
      
      <h2 style="text-align:center">Tracing Our Footsteps</h2>
      <div class="row">
        <div class="column">
          <div class="card">
            <div class="about-item text-center">
              <i class="fa fa-book"></i>
            <div class="container">
              <h2>Mission</h2>
              <p class="title">Goals</p>
              <p>
                We're here to enhance your campus journey.
                Our plan is to revolutionize campus navigation.
                our primary mission is to prioritize the comfort and ease of first-year students as they navigate campus life.
                We understand that starting university can be overwhelming, so we're dedicated to creating a welcoming and stress-free environment.
                Our goal is to develop a user-friendly campus navigation system specifically tailored to the needs of first-year students.
                Through modern technologies like web apps, we provide intuitive and precise guidance,
                ensuring that newcomers can find their way around campus with confidence.
            </p>
              
              <p><button class="button">Read More</button></p>
            </div>
          </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <div class="about-item text-center">
    <i class="fa fa-globe"></i>
            <div class="container">
              <h2>Vision</h2>
              <p class="title">Foresight</p>
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
              
              <p><button class="button">Read More</button></p>
            </div>
          </div>
        </div>
        </div>
      
        <div class="column">
          <div class="card">
            <div class="about-item text-center">
              <i class="fa fa-pencil"></i>
            <div class="container">
              <h2>Achievements</h2>
              <p class="title">Accomplishments</p>
              <p>
                Under construction, COMING SOON!! Keep checking for updates.
            </p>
              <p><button class="button">Read More</button></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
          <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>