<?php
include '../include/header.php';




$getCustomer = $conn->prepare("SELECT * FROM transaction");
$getCustomer->execute();
$fetchRow = $getCustomer->fetchAll(PDO::FETCH_BOTH);



?>
    <table class="table">
        <br><br><br><br>
        <tr>
            <th>S/NO</th>
            <th>Id</th>
            <th>Customer_Id</th>
            <th>Transaction Type</th>
            <th>Sender_Account</th>
            <th>Reciever_Account</th>
            <th>Previous_Balance</th>
            <th>Transaction_Amount</th>
            <th>Final_Balance</th>
            <th>Date</th>
            <th>Time</th>
        </tr>



<?php foreach ($fetchRow as $key => $value): ?>
  <?php
  // var_dump($fetchRow);
  ?>
  <tr>
      <td><?php echo $key + 1; ?></td>
      <td> <?php echo $value['id']; ?></td>
      <td> <?php echo $value['customer_id']; ?></td>
      <td> <?php echo $value['transaction_type']; ?></td>
      <td><?php echo $value['sender_account']; ?></td>
      <td><?php echo $value['reciever_account']; ?></td>
      <td> <?php echo $value['previous_balance']; ?></td>
      <td><?php echo $value['transaction_amount']; ?>
      <td> <?php echo $value['final_balance']; ?></td>
      <td> <?php echo $value['date_created']; ?></td>
      <td> <?php echo $value['time_created']; ?></td>
  </tr>
<?php endforeach; ?>



    </table>
</body>
</html>
