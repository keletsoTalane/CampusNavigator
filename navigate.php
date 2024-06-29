<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps Locator</title>
    
    <style> 
    body{
        font-family: Arial , sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    h1{
        text-align: center;
        margin-top: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);

}
label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }

        #map-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #map {
            height: 400px;
            width: 100%;
            border-radius: 8px;
        }
</style>
</head>
<body>
    <h1>
        Campus navigate
    </h1>
    <form>
        <label for = "location"> Current location: </label>
        <input type = "text" id="location" name="name" required> <br> <br>
        <label for = "destination"> Destination: </label>
        <input type = "text" id="destination" required> <br><br>
        <button type = "button" onclick="locate()"> Locate </button>
    </form>
    <div id="map-container">
        <div id ="map"></div>
    </div>

    <script> 
    function locate() {
        var location = document.getElementById('location').value;
        var destination = document.getElementById('destination').value;

        var gooleMapsUrl = "https://www.google.com/maps/dir/" + Location + destination;

        window.open(googleMapsUrl, '_blank');
        }

</script>
</body>
</html>