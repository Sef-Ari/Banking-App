<?php include '../include/header.php';


$uniqueHashId = $_GET['edit'];


$editCustomer  = $conn->prepare("SELECT * FROM customers WHERE hash_id=:hid");
$data = [
    ':hid' => $uniqueHashId
];
$editCustomer->execute($data);

$getAllCustomerData = $editCustomer->fetch(PDO::FETCH_BOTH);

// var_dump($getAllCustomerData, $_POST );
if (isset($_POST['update'])) {
    $error = [];
    if (isset($_POST['first_name']) && empty($_POST['first_name'])) {
       $error = "Please Enter Your First Name";
    }
    if (isset($_POST['last_name']) && empty($_POST['last_name'])) {
        $error = "Please Enter Your Last Name";
     }
     if (isset($_POST['username']) && empty($_POST['usename'])) {
         $error = "Please Enter Your Username";
      }
      if (isset($_POST['email']) && empty($_POST['email'])) {
          $error = "Please Enter Your Email";
       }


       if (isset($_POST['phone_number']) && empty($_POST['phone_number'])) {
        $error = "Please Enter Your Phone Number";
     }


     if (empty($error)) {
       $updateCustoer = $conn->prepare("UPDATE customers SET first_name=:fn, last_name=:ln,username=:usr,email=:em,phone_number=:pn WHERE hash_id=:hid");
       $theData = [
        ":fn" => trim($_POST['first_name']),
        ":ln" =>trim( $_POST['last_name']),
        ":usr" => $_POST['username'],
        ":em" => $_POST['email'],
        ":pn" => $_POST['phone_number'],
        ":hid" => $uniqueHashId,
       ];
       $updateCustoer->execute($theData);
     }

}


?>


    <fieldset>
    <form action="" method="POST">

<label for="first_name">Your First Name:</label>
    <input type="text" name="first_name" value= "<?php echo $getAllCustomerData['first_name']; ?>"><br>
    <br>
    <label for="lname">Your last Name:</label>
    <input type="text" name="last_name" value= "<?php echo $getAllCustomerData['last_name']; ?>"><br>
    <br>
    <label for="username">Your Username:</label>
    <input type="text" name="username" value= "<?php echo $getAllCustomerData['username']; ?>"><br>
    <br>
    <br><label for="email">Email Address:</label>
    <input type="email" name="email" value= "<?php echo $getAllCustomerData['email']; ?>">
    <br>
    <br><label for="phone">Phone Number:</label>
    <input type="text" name="phone_number" value= "<?php echo $getAllCustomerData['phone_number']; ?>"><br>
    <br>
    <input type="submit" value="UPDATE" name="update">
</form>
    </fieldset>
</body>
</html>
