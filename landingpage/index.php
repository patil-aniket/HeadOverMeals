<?php 

   include("config.php");
   session_start();
   if(isset($_POST['login_u'])) {
        
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,md5($_POST['password']));
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if($count == 1) {
          #session_register("myusername");
          $_SESSION['login_user'] = $myusername;
          header("location: ../homepage");
      }else {
         echo '<script>alert("Invalid username or password")</script>';
      }
  }

  if(isset($_POST['register_a'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $pass = md5($_POST['password']);


   #CHECK IF ACCOUNT ALREADY EXISTS
   $query = "SELECT id FROM users WHERE email = '$email'";
   $check = mysqli_query($conn,$query);
   $count = mysqli_num_rows($check);

   $query = "SELECT id FROM users WHERE username = '$username'";
   $check1 = mysqli_query($conn,$query);
   $count1 = mysqli_num_rows($check1);


   if($count > 0){
      echo '<script>alert("Account already exsits with given Email Address")</script>';
      echo '<script>window.location.href = "https://headovermeals57.000webhostapp.com/landingpage/";</script>';
      die();
   }
   if($count1 > 0){
      echo '<script>alert("username already exsits please try different username")</script>';
      echo '<script>window.location.href = "https://headovermeals57.000webhostapp.com/landingpage/";</script>';
      die();
      
   }


   $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pass');";
   $res = mysqli_query($conn, $sql);

   if ($res) {
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,md5($_POST['password']));

      $query = "SELECT id FROM users WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$query);
      if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit();
      }
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: ../homepage");
      }
  }
  else{
    echo "Error adding record: " . mysqli_error($conn);
  }
}


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>HeadOverMeals</title>
      <link rel="icon" href="favicon.ico" type="image/x-icon"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link rel="stylesheet" href="style.css">
      
   </head>
   <body>
    
      <div class="wrapper">
         <header>
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo-container">
                  <a href="">
                     <img class="logo" src="img/logo.jpg" alt="">
                  </a>
              </div>
               <div class="menu">
                  <ul>
                     <li><a class="nav-names" href="../About Us">about us</a></li>
                     <li><a class="nav-names" onclick="signIn();">login</a></li>
                     <li><a class="nav-names" onclick="register1();"><span class="register-button">register</span></a></li>
                  </ul>
               </div>
            </nav>
            <section id="home">
               <div class="intro">
                  <div>
                     <h1 id="id1"><div class="scene">
                        <div class="layer"></div>
                        <div class="layer"></div>
                        <div class="layer"></div>
                        <div class="layer"></div>
                        <div class="layer"></div>
                        <div class="layer"></div>
                      </div></h1>
                     <h1 id="id2">Beginner ? Don't worry. Get started on your culinary journey. <span></span></h1>
                     <div class="button-container"><span class="getstarted-button" onclick="register1();">Get Started</span></div>
                  </div>
               </div>
            </section >            
         </header>

         <section id="card-container">
            <div class="content">
               <div class="info">
                  <div class="info_text">
                     <h2>
                        Find your favourite recipe
                     </h2>
                     <p>
                        Choose the recipe you want to cook from over thousands of mouth watering recipes. Right from Italian pasta and Indian Paneer Makhni, to exquisite Chinese delicacies, all your favourite dishes, at one place.
                     </p>
                  </div>
                  <div class="img-container">
                     <img class="find_img" src="img/search.png" alt="">
                  </div>
               </div>
               <div class="info">
                  <div class="info_text">
                     <h2>
                        Search by ingredients
                     </h2>
                     <p>
                        If you are unsure about what you can cook from a limited number of ingredients, don't worry, we have the perfect solution for you! Enter the items availabe with you and get the recipe that can be prepared with those items, in just a few seconds.
                     </p>
                  </div>
                  <div class="img-container">
                     <img class="search_img" src="img/ing.png" alt="">
                  </div>
               </div>
               <div class="info">
                  <div class="info_text">
                     <h2>
                        Find your nearest store
                     </h2>
                     <p>
                        Wondering where you can find the exact items required for cooking the dish, but are tired of extensive researching across google ? With HeadOverMeals, your time is saved. We'll tell you where the nearest store is, within a few seconds so that you can enjoy your meal hassle free.
                     </p>
                  </div>
                  <div class="img-container">
                     <img class="store_img" src="img/map.png" alt="">
                  </div>
               </div>
            </div>
         </section>
      </div>
      <section class="modal" id="id01">
         <div class="container" >
             <div class="user signinBx">
                 <div class="imgBx">
                     <img src="img/img1.jpg" alt="">
                 </div>
                 <div class="formBx">
                     <form name="signin" action="" method="post" onsubmit="return validate1();">
                         <h2><img src="img/logo.jpg"><br><br>Sign In</h2>
                         <input type="text" name="username" placeholder="Username" required>
                         <span class="error" id="usernameErr1"></span>
                         <input type="password" name="password" placeholder="Password" required>
                         <span class="error" id="passErr1"></span><br>
                         <input class="sbutton" type="submit" name="login_u" value="login">
                         <p style="margin-top: 20px; font-size: 12px; letter-spacing: 1px;" class="signup">Don't have an account ? <a href="#" onclick="toggleForm();">Sign Up.</a></p>
                     </form>
                 </div>
             </div>
             <div class="user signupBx">
                 <div class="formBx">
                     <form name="register" action="" method="post" onsubmit="return validate2();">
                         <h2><img id="sinlogo" src="img/logo.jpg"><br><br><br>Create an Account</h2>
                         <input type="text" name="username" placeholder="Username">
                         <span class="error" id="usernameErr"></span>
                         <input type="email" name="email" placeholder="Email Address">
                         <span class="error" id="emailErr"></span>
                         <input type="password" name="password" placeholder="Create Password">
                         <span class="error" id="passErr"></span>
                         <input type="password" name="password1" placeholder="Confirm Password">
                         <span class="error" id="pass1Err"></span><br>
                         <input class="sbutton" type="submit" name="register_a" value="Sign Up">
                         <p style="margin-top: 20px; font-size: 12px; letter-spacing: 1px;" class="signup">Already have an account ? <a href="#" onclick="toggleForm();">Sign In.</a></p>
                     </form>
                 </div>
                 <div class="imgBx">
                     <img src="img/img2.jpg" alt="">
                 </div>
             </div>
             <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
         </div>
     </section>
     <section class="modal1" id="id02">
        <div class="container1">
            <div class="user1 signinBx1">
                <div class="imgBx1">
                    <img src="img/img1.jpg" alt="">
                </div>
                <div class="formBx1">
                    <div class="title">
                        <h1>Admin Login</h1>
                    </div>
                    <form name="signin" action="" onsubmit="" method="post">
                        <h2><img src="img/logo.jpg"><br>Sign In</h2>
                        <input type="text" id="uname" name="name" placeholder="Email">
                        <span class="error" id="usernameErr2"></span>
                        <input type="password" id="password" name="password" placeholder="Password">
                        <span class="error" id="passErr2"></span><br>
                        <input class="sbutton" type="button" id="submitFormData" onclick="SubmitFormData();" name="asubmit" value="login"><br>
                        <span class="error" id="loginErr"></span><br>
                    </form>
                </div>
            </div>
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close">&times;</span>
        </div>
    </section>
      <footer class="main-footer">
         <nav>
            <ul class="main-footer__links">
               <li class="main-footer__link">
                     <a href="../contactus">Contact Us</a>
               </li>
               <li class="main-footer__link">
                     <a href="">Terms of Use</a>
               </li>
               <li class="main-footer__link">
                     <a onclick="login_a();">Admin Login</a>
               </li>
            </ul>
         </nav>
      </footer>

      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="script.js"></script>
   </body>
</html>