<?php

$paymentid = $_POST['paymentid'];

require_once('payplug-php/lib/init.php'); 
require_once('config.php');


// Abort from a payment ID
$payment_id = \Payplug\Payment::abort($paymentid);

// Abort from a payment object
$payment_id = \Payplug\Payment::retrieve($paymentid);
$payment = $payment_id->abort();

$payment = $payment_id->id;
$amount = $payment_id->amount / 100;
$amount_refunded = $payment_id->amount_refunded / 100;
$currency = $payment_id->currency;
$card = $payment_id->card;
$customer = $payment_id->customer;
$failure = $payment_id->failure;


?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table</h2>
  <p>Transactions</p>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Payment</th>
        <th>Amount</th>
        <th>Refund amount</th>
        <th>Currency</th>
        <th>Card</th>
        <th>Customer</th>
        <th>Failure</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><?php echo $payment; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $amount_refunded; ?></td>
        <td><?php echo $currency; ?></td>
        <td><?php echo $card; ?></td>
        <td><?php echo $customer; ?></td>
        <td><?php echo $failure; ?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
