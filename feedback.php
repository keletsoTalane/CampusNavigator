<?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $rating = isset($_POST["rate"]) ? intval($_POST["rate"]) : 0; // Convert to integer
        $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";

        // Validate and sanitize data (e.g., escape special characters)
        $rating = max(1, min(5, $rating)); // Ensure rating is between 1 and 5

        // Database connection (replace with your actual credentials)
        session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
$user_id =$user_data['id'];
        // Insert data into the feedback table
        $sql = "INSERT INTO feedback (id ,rating, comment) VALUES (?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("iis" ,$user_id, $rating, $comment);

        if ($stmt->execute()) {
            echo "<script>alert('Feedback submitted successfully!');</script>";
            
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";

            header("location: profile.php");
    
        }

        $stmt->close();
        $con->close();
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="feedbackStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Student Rating Form</title>
    <style>
    
     
    input[type = "submit"] {
        background-color: red;
        color :#fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        bottom: 100%;
        font-size: larger;

    }
    input[type="submit"]:hover{
        background-color: red;
    }
.back-to-main {
    display: block;
    margin: 20px auto;
    width: fit-content;
}</style>
</head>
<body>
    <div class="container">
        <div class="post">
            <div class="text">THANK YOU FOR RATING US!</div>
            <div class="edit">Edit here</div>
        </div>

        <div class="star-widget">
            <input type="radio" name="rate" id="rate-5">
            <label for="rate-5" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-4">
            <label for="rate-4" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-3">
            <label for="rate-3" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-2">
            <label for="rate-2" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-1">
            <label for="rate-1" class="fas fa-star"></label>
            <form method="POST">

                <header></header>
                <div class="textarea">
                    <textarea cols="30" name="comment" placeholder="Describe your experience.."></textarea>
                </div>

                <div class="btn">
                    <button type="submit" name="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
    <a href = "index.php" class="back-to-main">
            <input type = "submit" value = "BACK TO MAIN">
            </a>
            <script>
    const stars = document.querySelectorAll('.fas.fa-star'); // Get all star icons

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            const rating = index + 1; // Rating is 1-indexed
            document.querySelector(`#rate-${rating}`).checked = true; // Select the corresponding radio button
        });
    });
</script>

    
</body>
</html>
