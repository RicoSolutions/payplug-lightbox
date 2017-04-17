<?php

$paymentid = $_POST['paymentid'];
$refundid = $_POST['refundid'];

require_once('payplug-php/lib/init.php');
require_once('config.php');


$refund = \Payplug\Refund::retrieve($paymentid, $refundid);


$refundid = $refund->id;
$paymentid = $refund->payment_id;
$object = $refund->object;
$amount = $refund->amount/100;
$currency = $refund->currency;
$refunddate = date('d/m/Y H:i:s',$refund->created_at);

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
        <th>Refund ID</th>
        <th>Payment ID</th>
        <th>Object</th>
        <th>Refund amount (€)</th>
        <th>Currency</th>
        <th>Refund date</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><?php echo $refundid; ?></td>
        <td><?php echo $paymentid; ?></td>
        <td><?php echo $object; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $currency; ?></td>
        <td><?php echo $refunddate; ?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
