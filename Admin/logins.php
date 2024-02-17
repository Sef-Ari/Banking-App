<?php

session_start();
// var_dump($_SESSION);

include "../model/model.php";

if (isset($_POST['login'])) {

    // die(var_dump($_POST));


    $error = [];


if (isset($_POST['username']) && empty ($_POST['username'])) {
    $error[] = "Please enter your Username";
    }else {
            $username = $_POST['username'];
    }

    if (isset($_POST['password']) && empty ($_POST['password'])) {
        $error[] = "Please enter your Password";
        }else {
            $email = $_POST['password'];
        }

if (empty($error)) {
    $login  = $conn->prepare("SELECT * FROM admins WHERE email=:em");
    $login->bindParam(':em', $_POST['username']);
    $login->execute();
    $userRow = $login->fetch(PDO::FETCH_BOTH);


    if ($login->rowCount()> 0 && password_verify($_POST['password'], $userRow['password'])){
        $_SESSION['hash_id'] =  $userRow['admin_id'];

            header("Location:../admin/homepage.php");
    }






}else {
    var_dump($error);
}

}

?>



<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
 </head>
 <body>
    <div class="wrapper">
         <form method="POST">
            <h1>Login</h1>
           <div class="input-box">
               <input type="text" name="username" placeholder="Username">
              <i class='bx bxs-user'></i>
            </div>
           <div class="input-box">
              <input type="password" name="password" id="pwd" placeholder="Password">
              <i class='bx bxs-lock-alt'></i>
            </div>
            
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" name="login" class="btn" value="submit">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="signups.php">SignUp</a></p>
            </div>
        </form>
    </div> 
 </body>
 </html>