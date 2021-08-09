<?php
    include('../landingpage/session_u.php');
    if (isset($_POST['logout'])) {
                                session_unset();
                                session_destroy();
                                header("location:../landingpage/index.php");
                            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $login_session1;?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="main-container">
            <div class="main-header">
                <div class="logo-container">
                    <a href="#">
                        <img class="logo" src="img/logo.jpg" alt="">
                    </a>
                </div>
                <div class="search-container">
                    <div class="search">
                        <form method="POST" action="index.php" class="ingredient_form">
                            <h2 class="search-heading">
                                Search By Ingredient
                            </h2>
                            <input class="input-box" type="text" id='text' name="SearchByIngredient" required placeholder="Enter comma separated Ingredients">
                            <input type="submit" name="inSubmit" class="submitSearch" id="searchjquery" value="Search">
                        </form>
                    </div>
                    <div class="spacebetween"></div>
                    <div class="search">
                        <form method="POST" autocomplete="off" action="index.php" class="recipe_form">
                            <h2 class="search-heading">
                                Search By Recipe
                            </h2>
                            <div class="autocomplete">
                                <input id="myInput" class="input-box" type="text" name="SearchByName" placeholder="recipe" required>
                            </div>
                            <input type="submit" name="recipeSubmit" class="submitSearch" id="searchjquery" value="Search">
                        </form>
                    </div>
                    
                </div>
                <div class="logout">
                        <form method="POST" action="index.php">
                                <input class="submitSearch logout" type="submit" name="logout" value="LOGOUT">
                        </form>
                    </div>
            </div>
            <div class="cards" id="cards"><?php
                
                    if(isset($_POST['inSubmit'])){

                        $id = $_POST['SearchByIngredient'];
                        $id = explode(",",$id);
                        $text = "";
                        foreach($id as $x => $x_value){
                            if(sizeof($id) == $x+1)
                                $text .= "ingredientName LIKE '%$x_value%'";
                            else
                                $text .= "ingredientName LIKE '%$x_value%' AND ";
                        }
                        $sql = "SELECT * FROM recipe where $text ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<form action="foodpage/foodpage.php" method="POST" target="_blank">
                            <div class="card">
                                <input hidden type="text" id="rId" name="rId" value="'.$row['id'].'">
                                <img class="card-img-top food_image" src="'.$row['img'].'" alt="'.$row['name'].'">
                                <div class="card-body card_body">
                                    <div class="title_id_grouping">
                                        <p class="card_text">'.$row['name'].'</p>
                                        <p class="card_text">'.$row['cal'].' Cal</p>
                                    </div>    
                                    <div class="submit">
                                        <input class="submit_button" type="submit" value="See Recipe">
                                    </div>
                                </div>
                            </div>
                        </form>';
                        }
                        }
                        else {
                        echo "0 results";
                        }

                    }
                    else
                        echo "";

                        if(isset($_POST['recipeSubmit'])){

                            $name = $_POST['SearchByName'];
                            $sql = "SELECT * FROM recipe where name = '$name' ";
                            $result = mysqli_query($conn, $sql);
        
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<form action="foodpage/foodpage.php" method="POST" target="_blank">
                                <div class="card">
                                    <input hidden type="text" id="rId" name="rId" value="'.$row['id'].'">
                                    <img class="card-img-top food_image" src="'.$row['img'].'" alt="'.$row['name'].'">
                                    <div class="card-body card_body">
                                        <div class="title_id_grouping">
                                            <p class="card_text">'.$row['name'].'</p>
                                            <p class="card_text">'.$row['cal'].' Cal</p>
                                        </div>     
                                        <div class="submit">
                                            <input class="submit_button" type="submit" value="See Recipe">
                                        </div>
                                    </div>
                                </div>
                            </form>';
                            }
                            }
                            else {
                            echo "0 results";
                            }
        
                        }
                        else
                            echo "";
                    
                
                ?></div>
        </div>
        
                            
        <footer class="main-footer">
            <nav>
                <ul class="main-footer__links">
                    <li class="main-footer__link">
                        <a href="../contactus" target="_blank">Contact Us</a>
                    </li>
                    <li class="main-footer__link">
                        <a href="#">Terms of Use</a>
                    </li>
                </ul>
            </nav>
        </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    </body>
</html>