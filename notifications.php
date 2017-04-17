<?php

require_once('payplug-php/lib/init.php');
require_once('config.php');

$input = file_get_contents('php://input');

try {
  $resource = \Payplug\Notification::treat($input);

  if ($resource instanceof \Payplug\Resource\Payment
  && $resource->is_paid
  // Ensure that the payment was paid
) {
  // Process a paid payment.
  $myfile = fopen("payment_info.html", "w") or die("Unable to open file!");
  echo fwrite($myfile,"Payment id: ".$resource->id."\n");
  echo fwrite($myfile,"Payment object: ".$resource->object."\n");
  echo fwrite($myfile,"Payment amount in cents: ".$resource->amount."\n");
  echo fwrite($myfile,"Payment creation: ".$resource->created_at."\n");
  echo fwrite($myfile,"Card last 4 digits: ".$resource->card);
  fclose($myfile);



} else if ($resource instanceof \Payplug\Resource\Refund) {
  // Process the refund.
  $myfile2 = fopen("handling_errors.txt", "w") or die("Unable to open file!");
  $txt2 = "I deserve a refund\n";
  echo fwrite($myfile2, $txt2);
  fclose($myfile2);
}
}
catch (\Payplug\Exception\PayplugException $exception) {
  // Handle errors
  echo 'Message: ' .$exception->getMessage();
}
