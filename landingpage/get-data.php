<?php 
    include('config.php');
    session_start();
    if(isset($_POST['uname'])) {
        $email = $_POST['uname'];
        $pass = $_POST['password'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $userErr = "1";
        }
        else{
            $userErr = "0";
        }
        if ($pass == null or $pass == "") {
            $passErr = "1";
        }
        else if(strlen($pass) < 6){
            $passErr = "2";
        }
        else{
            $passErr = "0";
        }
        $res = "$userErr$passErr";
        if ($res == "00"){
            $myusername = mysqli_real_escape_string($conn,$email);
            $password = md5($pass);
            $sql = "SELECT id FROM admin WHERE email = '$myusername' and password = '$password'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if($count == 1) {
                #session_register("myusername");
                $_SESSION['login_user'] = $myusername;
                #header("location: ../homepage");
                $res = "00";
            }else {
                #echo '<script>alert("Invalid username or password")</script>';
                $res = "13";
            }
        }
        echo "$res";
    }
?>
