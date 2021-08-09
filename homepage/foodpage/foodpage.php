<?php

     include('../../landingpage/session_u.php');
    $id = $_POST['rId'];
    $sql = "SELECT * FROM recipe where id='$id' ";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $result['name']?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-container">
        <div class="main-header">
            <div class="logo-container">
                <a href="#">
                    <img class="logo" src="../img/logo.jpg" alt="">
                </a>
            </div>
        </div>
        <div class="recipe-info">
            <div class="img-and-ing">
                <div class="recipe-img">
                    <img class="card-img-top food_image" src="<?php echo $result['img'] ?>" alt="<?php echo $result['name']?>">
                </div>
                <div class="count">
                    <div class="colour-count">
                            <div class="count-prop">
                                <div class="center-count">
                                <?php echo $result['inCount'] ?>
                                
                                </div>
                                
                                
                                <div class="base">ingredients</div>
                            </div>
                            <div class="count-prop">
                                <div class="count-line">
                                <div class="center-count">
                                    <?php echo $result['time'] ?>
                                    
                                </div>
                                
                                </div>
                                
                                <div class="base">time (min)</div>
                            </div>
                            <div class="count-prop">
                                <div class="center-count">
                                    <?php echo $result['cal'] ?>
                                </div>
                                <div class="base">calories</div>
                            </div>
                    </div>
                    
                </div>
                <div class="recipe-ing-container">
                <div class="recipe-ing">
                    <h1>Ingredients :</h1>
                    <?php echo $result['ingredientAll'] ?>
                </div>
                </div>
                
            </div>
            <div class="procedure">
            <h1>Procedure :</h1>
                    <?php echo $result['Procedure'] ?>
            </div>
        </div>
    </div>
    
    
    <footer class="main-footer">
        <nav>
            <ul class="main-footer__links">
                <li class="main-footer__link">
                    <a href="../../contactus" target="_blank">Contact Us</a>
                </li>
                <li class="main-footer__link">
                    <a href="#">Terms of Use</a>
                </li>
            </ul>
        </nav>
    </footer>
</body>
</html>