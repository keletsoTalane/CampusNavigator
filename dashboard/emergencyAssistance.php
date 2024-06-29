<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Assistance</title>
    <style> 
    body{
        font-family: Arial , sans-serif;
        margin : 0;
        padding : 0;
       font-size: larger;
        background-size: cover;
        background: url('Images/emergency.jpg') no-repeat;
    background-size: cover;
    background-position: center;
    
        
    }
    .container{
        max-width: 600px;
        margin: 20px auto;
        padding : 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: lightgrey;
        padding-bottom: 10% 10%;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    textarea{
        width: 100%;
        padding : 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        resize: none;
    }
    textarea {
        height: 150px;
    }
    input[type = "submit"] {
        background-color: #007bff;
        color :#fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;

    }
    input[type="submit"]:hover{
        background-color: #0056b3;
    }

   
    </style>
</head>
<body>
    <div class="container">
        <h1> Report Emergency</h1>
        <form action="submitEmergency.php" method="POST">
            <div class = "form-group">
                <label for= "location">Enter Emergency Location</label>
                <input type = "text" id="location" name = "location" placeholder="Current location" required>
            </div>
            <div class = "form-group">
                <label for="description"> Emergency Description: </label>
                <textarea id = "description" name="description" placeholder="What is your Emergency..." required ></textarea>
            </div>
            <input type = "submit" value = "SUBMIT">
            
        </form>

        <form action="index.php" method="get">
        <input type="submit" value="Back Main Page">
    </div>
</body>
</html>