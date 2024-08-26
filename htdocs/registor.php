<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location:index.php");
}
if(isset($_POST["submit"])){
    $username = $_POST["UserName"];
    $password = $_POST["Password"];
    $confirmpassword = $_POST["ConfirmPassword"];
    $email = $_POST["Email"];
    $duplicate = mysqli_query($connect,"SELECT * FROM info WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username Or Email Has Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $qurey = "INSERT INTO info VALUES ('','$username','$password','$email')";
            mysqli_query($connect,$qurey);
            echo
            "<script> alert('Registration was Successful'); </script>";
            header("Location:login.php");
        }
        else{
            echo
            "<script> alert('Password Does not match'); </script>";
        }
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
    <title>Registor</title>
</head>
<body>
<div class="wrapper">
    <div class="Login_box">
        <div class="Login_header">
            <span>Redistor</span>
        </div>
    <form action="" method="post" autocomplete="off">
        <div class="input_box">
            <input type="text" name="UserName" id="user"  required value="" class="input-field" >
            <label for="user" class="label">Username</label>
            <i class="material-icons">person</i>
        </div>
        <div class="input_box">
            <input type="password" name="Password" id="pass"  required value="" class="input-field" >
            <label for="pass" class="label">Password</label>
            <i class="material-icons">lock</i>
        </div>
        <div class="input_box">
            <input type="password" name="ConfirmPassword" id="ConfirmPassword" required value="" class="input-field" >
            <label for="pass" class="label">ConfirmPassword</label>
            <i class="material-icons">lock</i>
        </div>
        <div class="input_box">
            <input type="email" name="Email" id="Email"  required value="" class="input-field" >
            <label for="Emial" class="label">Email</label>
            <i class="material-icons">email</i>
        </div>
        <div class="login-butt">
            <button type="submit" name="submit" onclick="" class="Login">Register</button>
        </div>
        <div class="login-butt">
            <button type="button" class="Login" onclick="header()">Login</button>
        </div>
    </form>
    </div>
</div>
<script>
    function header(){
        window.location.href = 'login.php';
}
</script>
</body>
</html>