<?php

    include('../landingpage/session_a.php');
    if (isset($_POST['logout'])) {
                                session_unset();
                                session_destroy();
                                header("location:../landingpage");
                            }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function showUser(str) {
            if (str=="") {
            document.getElementById("txtHint").innerHTML="";
            return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }

        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }

        $(document).ready(function(){
            $("#review-table").load("reviews.php");
            setInterval(function(){ 
                $("#review-table").load("reviews.php"); 
            }, 100000);
            
        });
    </script>
</head>
<body>
    <div class="main-container">
        <div class="main-header">
            <div class="logo-container">
                <a href="#">
                    <img class="logo" src="img/logo.jpg" alt="">
                </a>
                <div class="logout-container">
                        <form method="POST" action="index.php">
                                <input class="logout" type="submit" name="logout" value="LOGOUT">
                        </form>
                    </div>
            </div>
            
            <div class="w3-bar w3-black tabs-button">
                <button class="w3-bar-item w3-button tablink w3-red tab-button" onclick="openCity(event,'user-info')">User Info</button>
                <button class="w3-bar-item w3-button tablink tab-button" onclick="openCity(event,'reviews')">Reviews</button>
            </div>
        </div>
        
    </div>
    <div class="w3-container">

  
  
  <div id="user-info" class="w3-container city">
  <div class="form-container">
        <form>
            <select name="users" onchange="showUser(this.value)" class="drop-down">
            <option value="">Select a person:</option>
            <?php
            
                         $sql = "SELECT * FROM users";
                         $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value='.($row['id']).'>'.$row['username'].'</option>';
                            
                            
                        }

                        if (isset($_POST['remove-user'])) {
                            $email = $_POST['user-info'];
                            $sql = "DELETE FROM users WHERE email='$email'";
                            if (mysqli_query($conn, $sql)) {
                            echo '<script>alert("Info Deleted")</script>';
                            header("location:index.php");
                  
                            } else {
                            echo '<script>alert("Error removing record: ' . mysqli_error($conn) . '")</script>';
                            }
                        }

                        
                    }
                    
            
            ?>
            </select>
        </form>
        
    </div>
    <div class="table-view" id="txtHint"><b>Person info will be listed here...</b></div>
    
  </div>

  <div id="reviews" class="w3-container  city" style="display:none">
        
        <div class="review-table-container" id="review-table"></div>

  </div>
    <script src="script.js"></script>
</body>
</html>

