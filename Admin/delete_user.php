<?php
include '../model/model.php';

var_dump($_GET);

$deleteUser = $conn->prepare("DELETE FROM customers WHERE account_number=:acn");
$deleteUser->bindParam(":acn", $_GET['delete']);
$deleteUser->execute();

header("Location:view_customer.php");

 ?>
