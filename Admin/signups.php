<?php

 include "../model/model.php";

if (isset($_POST['signup'])) {

    $error = [];

    if (isset($_POST['full_name']) && empty ($_POST['full_name'])){
        $error[] = "Please enter your Full Name";
    }else {
        $fullName = $_POST['full_name'];
    }

    if (isset($_POST['username']) && empty ($_POST['username'])) {
        $error[] = "Please enter your Username";
    }else {
        $userName = $_POST['username'];
    }

    if (isset($_POST['email']) && empty ($_POST['email'])) {
        $error[] = "Please enter your Email Address";
    }else {
        $emailAddress = $_POST['email'];
    }

    if (isset($_POST['phone_number']) && empty ($_POST['phone_number'])) {
        $error[] = "Please enter your Phone Number";
    }else {
        $phoneNumber = $_POST['phone_number'];
    }

    if (isset($_POST['password']) && empty ($_POST['password'])) {
        $error[] = "Please enter your Password";
    }else {
        $password = $_POST['password'];
    }

    $checkuserName = $conn->prepare("SELECT * FROM Admins WHERE username=:usr");
    $checkuserName->bindParam(":usr", $_POST['username']);
    $checkuserName->execute();
    if ($checkuserName->rowCount()> 0) {
        $error[] = "Username Already Exists";
    }


     $checkEmail = $conn->prepare("SELECT * FROM Admins WHERE email=:em");
    $checkEmail->bindParam(":em", $_POST['email']);
    $checkEmail->execute();
    if ($checkEmail->rowCount()> 0) {
      $error[] = "Email Already Exist";
    }

    $checkphoneNumber = $conn->prepare("SELECT * FROM Admins WHERE phone_number=:pn");
    $checkphoneNumber->bindParam(":pn", $_POST['phone_number']);
    $checkphoneNumber->execute();
    if ($checkphoneNumber->rowCount()> 0) {
        $error[] = "Phone Number Already Exists";
    }


    if (empty($error)) {
        $visibility = 1;
        $tryghjiufiui = rand(10000,99999);
        $encryptPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $newAdmin=$conn->prepare("INSERT INTO Admins VALUES(NULL,:hid,:fn,:usr,
        :em,:pn,:ps,:vs,NOW(), NOW() )");
        $newAdmin->bindParam(':hid', $tryghjiufiui);
        $newAdmin->bindParam(':fn', $_POST['full_name']);
        $newAdmin->bindParam(':usr', $_POST['username']);
        $newAdmin->bindParam(':em', $_POST['email']);
        $newAdmin->bindParam(':pn', $_POST['phone_number']);
        $newAdmin->bindParam(':ps', $encryptPassword);
        $newAdmin->bindParam(':vs', $visibility);
        $newAdmin->execute();
        header("Location:../admin/logins.php");

    } else {
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
               <input type="text" name="full_name" placeholder="Full Name">
            </div>
           <div class="input-box">
              <input type="text" name="username" placeholder="Username">
            </div>
           <div class="input-box">
              <input type="email" name="email" placeholder="Email">
            </div>
           <div class="input-box">
              <input type="text" name="phone_number" placeholder="Phone Number">
            </div>
           <div class="input-box">
              <input type="password" name="password"placeholder="Password">
            </div>
          

            <button type="submit" name="signup" class="btn" value="submit">SignUp</button>

            <div class="register-link">
                <p>Don't have an account?<a href="logins.php">Login</a></p>
            </div>
        </form>
    </div> 
 </body>
 </html>