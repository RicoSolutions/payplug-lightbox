<?php

require_once('payplug-php/lib/init.php');
require_once('config.php');

// Retrieve a list of refunds from the payment id.
$paymentId = 'pay_4eQjXR2ElOpdW5bZT1lsSv';
$refunds = \Payplug\Refund::listRefunds($paymentId);
$refund = $refunds[0];

foreach ($refund as $value) {
  echo $value->id . "<br>";
}


// Retrieve a list of refunds from the payment object.
$payment = \Payplug\Payment::retrieve('pay_4eQjXR2ElOpdW5bZT1lsSv');
$refunds = $payment->listRefunds();
$refund = $refunds[0];

foreach ($refund as $value) {
  echo $value->id . "<br>";
}
