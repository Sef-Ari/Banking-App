<?php
include '../model/model.php';
session_start();
$adminId = $_SESSION['hash_id'];

$fetchData = $conn->prepare("SELECT * FROM admins WHERE admin_id=:aid");
$fetchData->bindParam(':aid', $adminId);
$fetchData->execute();

$rowUserData = $fetchData->fetch(PDO::FETCH_BOTH);
// var_dump($rowUserData);

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage.php</title>
    <link rel="stylesheet" href="../css/Admin.css">
</head>
<body>
    <header>
        <div>
        <h1 class="h1">WELCOME TO SAIF-ARI BANK</h1>
        <h3>Name: <?php echo $rowUserData['full_name']; ?></h3>
        <h3>Username: <?php echo $rowUserData['username']; ?></h3>
        <h3>Email: <?php echo $rowUserData['email']; ?></h3>
        </div>
        <nav>
            <a href="homepage.php">Home </a>
            <a href="view_transfer.php">View Transfer</a>
            <a href="view_customer.php">View Customers</a>
            <a href="logins.php">Log Out</a>
        </nav>
    </header>
