<?php

require_once('payplug-php/lib/init.php');
require_once('config.php');

$payments = \Payplug\Payment::listPayments();

foreach ($payments as $value) {
    echo $value->id . "<br>";
}
