<?php
 include '../include/header.php';


$getCustomer = $conn->prepare("SELECT * FROM customers");
$getCustomer->execute();
$fetchRow = $getCustomer->fetchAll(PDO::FETCH_BOTH);







 ?>


    <table class="table">
      <br><br><br><br>
        <tr>
            <th>S/N</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>VIEW</th>
            <th>EDIT</th>
        </tr>



<?php foreach ($fetchRow as $key => $value): ?>
  <?php
  // var_dump($fetchRow);
  ?>
  <tr>
      <td><?php echo $key + 1; ?></td>
      <td> <?php echo $value['first_name']; ?></td>
      <td> <?php echo $value['last_name']; ?></td>
      <td><?php echo $value['username']; ?></td>
      <td><?php echo $value['email']; ?></td>
      <td><?php echo $value['phone_number']; ?></td>
      <td><a href="edit_customers.php?edit=<?php echo $value['hash_id'] ?>">EDIT</a></td>
      <td><a href="delete_user.php?delete=<?php echo $value['account_number']; ?>">DELETE</a></td>
  </tr>
<?php endforeach; ?>



    </table>

</body>
</html>
