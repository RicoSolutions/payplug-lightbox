<?php

//Get the variables from file index.php thanks to super variable POST
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$savecard = $_POST['savecard'];

require_once('payplug-php/lib/init.php');
require_once('config.php');


if (isset($savecard)) {
  $payment = \Payplug\Payment::create(array(
    'amount'         => $amount*100,
    'currency'       => 'EUR',
    'save_card'      => true,
    'customer'       => array(
      'email'      => $email,
      'first_name' => $firstname,
      'last_name'  => $lastname
    ),
    "hosted_payment" => array(
      "return_url" => 'https://lightbox.rico.solutions/return.html',
      "cancel_url" => 'https://lightbox.rico.solutions/cancel.html'
    ),
    'notification_url' => 'https://lightbox.rico.solutions/notifications.php'
    ));
  } else {
    $payment = \Payplug\Payment::create(array(
      'amount'         => $amount*100,
      'currency'       => 'EUR',
      'save_card'      => false,
      'customer'       => array(
        'email'      => $email,
        'first_name' => $firstname,
        'last_name'  => $lastname
      ),
      "hosted_payment" => array(
        "return_url" => 'https://lightbox.rico.solutions/return.html',
        "cancel_url" => 'https://lightbox.rico.solutions/cancel.html'
      ),
      'notification_url' => 'https://lightbox.rico.solutions/notifications.php'
      ));
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>PayPlug lightbox example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
      <script type="text/javascript" src="https://api.payplug.com/js/1.0/form.js"></script>
      <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        [].forEach.call(document.querySelectorAll("#signupForm"), function(el) {
          el.addEventListener('submit', function(event) {
            var payplug_url = '<?= $payment->hosted_payment->payment_url ?>';
            Payplug.showPayment(payplug_url);
            event.preventDefault();
          })
        })
      })
      </script>
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h1><i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>PayPlug lightbox example</h1>
            <hr />
            <p><strong>Thank you for trying my lightbox!</strong></p>
            <p><?php echo "Dear ".$firstname." ".$lastname.","; ?></p>
            <p><?php echo "you will be charged ".$amount."€!<br />Please click on the button below." ?></p>
            <hr />
          </div>
          <div class="col-md-6 col-md-offset-3">
            <form action="" method="post" id="signupForm" class="formulaire" novalidate>
              <p>
                <button type="submit" class="btn btn-success">Try the lightbox</button>
              </p>
            </form>
            <hr />
            <p><a href="https://www.payplug.com/docs/api/apiref.html#api-testing" target="_blank">Please click here to get Test card numbers</a></p>
          </div>
        </div>
      </div>
    </body>

    <br /><br /><br /><br />

    <footer>
      <div>
        <a href="https://www.payplug.com" target="_blank">
          <!--Center the image and make it responsive by the use of class="center-block img-responsive" -->
          <img src="https://s3-eu-west-1.amazonaws.com/payplug-badges/en/badge_narrow.png" class="center-block img-responsive" width="240px" border="0"/>
        </a>
      </div>
    </footer>
    </html>
