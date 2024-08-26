<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location:index.php");
}
if(isset($_POST['submit'])){
    $UsernameOrEmail = $_POST['UsernameOrEmail'];
    $Password = $_POST['Password'];
    $result = mysqli_query($connect,"SELECT * FROM info WHERE username = '$UsernameOrEmail' OR email = '$UsernameOrEmail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($Password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
    }
    else{
        echo
            "<script> alert('Worng Password Or Username'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/MainStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
    <div class="Login_box">
            <div class="Login_header">
                <span>login</span>
            </div>
    
    <form action="" method="post" autocapitalize="off">
        <div class="input_box">
            <input type="text" name="UsernameOrEmail" required value="" id="user" class="input-field" >
            <label for="user" class="label">Username</label>
            <i class="material-icons">person</i>
        </div>
        <div class="input_box">
        <input type="password" name="Password" required value="" id="pass" class="input-field">
        <label for="pass" class="label">Password</label>
        <i class="material-icons">lock</i>
        </div>
        <div class="remember-forget">
            <div class="rember-me">
                <input type="checkbox" id="remember">
                <label for="remember"> Remmber me</label>
            </div>
            <div class="forget">
                <a href="#">Forget password?</a>
            </div>
        </div>
        <div class="login-butt">
            <button type="submit" name="submit" class="Login">Login</button>
        </div>
        <div class="register">
            <span>Donn't have an account? <a href="registor.php">Register</a></span>
        </div>
    </form>
    </div>
</div>
</body>
</html>