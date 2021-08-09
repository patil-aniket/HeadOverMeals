<?php

    include('../landingpage/config.php');
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $review = $_POST['review'];
        $sql = "INSERT INTO `reviews`(`email`, `review`) VALUES ('$email','$review')";
        if (mysqli_query($conn, $sql)) {
        echo '<script>alert("review submitted")</script>';

        } else {
        echo '<script>alert("Error removing record: ' . mysqli_error($conn) . '")</script>';
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="../landingpage/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo-container">
        <div class="logo">
            <a href="../landingpage"><img src="img/logo.jpg" alt=""></a>
        </div>
    </div>
    <div class="map-container-mega">
        <div class="review-container">
            <form action="index.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" class="input-box" id="email" placeholder="abc@xyz.com" required>
                <label for="review">Review</label>
                <textarea name="review" class="input-box" id="review" cols="20" rows="10" placeholder="Enter review here..." required maxlength="1000"></textarea>
                <input type="submit" name="submit" id="submit" value="Submit">
            </form>
        </div>
        <div class="map-container">
            <h3>
                Our Location :
            </h3>
            <div id="mapid">
                <iframe src="https://www.google.com/maps/d/embed?mid=1gOK4-dm-JBHUVx-hBxQw7WucyT9sBSkf" width="640" height="480"></iframe>
            </div>
        </div> 
    </div>
    
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="script.js"></script>
</body>
</html>