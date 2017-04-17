<?php

require_once('payplug-php/lib/init.php');
require_once('config.php');


$paymentid = $_POST['paymentid'];
$amount = $_POST['amount'];
$comment = $_POST['comment'];

$amountc = $amount*100;


/* Create a refund from a payment id
$data = array(
  'amount'   => $amount,
  'metadata' => array(
      'customer_id' => 42,
      'reason' => $comment
    )
  );
$refund = \Payplug\Refund::create($paymentid, $data);
*/


// Also refund a payment object directly
$payment_id = \Payplug\Payment::retrieve($paymentid);
$data = array('amount' => $amountc);
$refund = $payment_id->refund($data);


/* Or more simply for a total refund
$payment_id = \Payplug\Payment::retrieve($paymentid);
$refund = $payment_id->refund();
*/


$payment = $payment_id->id;



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
        <th>Refund (euros)</th>
        <th>Your comment</th>
        <th>Refund id</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><?php echo $payment; ?></td>
        <td><?php echo $refund->amount / 100; ?></td>
        <td><?php echo $comment; ?></td>
        <td><?php echo $refund->id; ?></td>


      </tr>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
