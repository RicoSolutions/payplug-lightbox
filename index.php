<?php

// define variables and set to empty values
$firstname = $lastname = $email = $amount = "";


/* The $_SERVER["PHP_SELF"] is a super global variable that returns
the filename of the currently executing script.*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $email = test_input($_POST["email"]);
  $amount = test_input($_POST["amount"]);

}

/*The next step is to create a function that will do all the checking for us
(which is much more convenient than writing the same code over and over again).
We will name the function test_input().*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>PayPlug lightbox example</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="styles.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <h1>PayPlug lightbox example</h1>


          <p>Send payment details via the Form below</p>

          <br />

          <form method="post" action="payment.php" name="index" role="form" onsubmit="return checkForm(this);">

            <div class="form-group">
              <label for="firstname">Firstname:</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Your firstname" required autocomplete="on">
            </div>

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Your lastname" required autocomplete="on">
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Your email" required autocomplete="on">
            </div>

            <div class="form-group">
              <label for="amount">Amount:</label>
              <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount to pay" required autocomplete="on">
            </div>

            <div class="checkbox">
              <label for="checkbox">
                <input type="checkbox" name="savecard" id="savecard" autocomplete="off"><strong>Save my card (optional)</strong>
              </label>
              <br /> If you check this box, this means you allow the merchant to store a token
              (<a href="https://en.wikipedia.org/wiki/Tokenization_(data_security)" target="_blank">more information</a>) of your card details for future
              payments.
              <br />
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="check" required autocomplete="off">I am human
              </label>
            </div>

            <p class="text-align">
              <button type="submit" class="btn btn-primary id=" submit ">Submit</button>
            </p>

          </form>



        </div>



      </div>

    </div>

  </section>

</body>

<br /><br /><br /><br />

<footer>
  <div>
    <a href="https://www.payplug.com " target="_blank ">
      <!--Center the image and make it responsive by the use of class="center-block img-responsive" -->
      <img src="https://s3-eu-west-1.amazonaws.com/payplug-badges/en/badge_wide.png " class="center-block img-responsive " width="500px " border="0 "/>
    </a>
  </div>
</footer>
</html>
