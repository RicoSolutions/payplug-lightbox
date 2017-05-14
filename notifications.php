<?php

require_once('payplug-php/lib/init.php');
require_once('config.php');

$input = file_get_contents('php://input');

try {
  $resource = \Payplug\Notification::treat($input);

  if ($resource instanceof \Payplug\Resource\Payment
  && $resource->is_paid
  // Ensure that the payment was paid.
) {
  // Process a paid payment.
  $myfile = fopen("payment_info.txt", "w") or die("Unable to open file!");
  fwrite($myfile,"Payment id: ".$resource->id."\n");
  fwrite($myfile,"Payment object: ".$resource->object."\n");
  fwrite($myfile,"Payment amount in cents: ".$resource->amount."\n");
  fwrite($myfile,"Payment creation: ".$resource->created_at."\n");
  fwrite($myfile,"Card last 4 digits: ".$resource->card->last4);
  fclose($myfile);



} else if ($resource instanceof \Payplug\Resource\Refund) {
  // Process the refund.
  $myfile2 = fopen("handling_errors.txt", "w") or die("Unable to open file!");
  $txt2 = "I deserve a refund\n";
  fwrite($myfile2, $txt2);
  fclose($myfile2);
}
}
catch (\Payplug\Exception\PayplugException $exception) {
  // Handle errors
  echo 'Message: ' .$exception->getMessage();
}
