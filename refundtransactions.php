<?php
// define variables and set to empty values
$paymentid = $amountid = $commentid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $paymentid = test_input($_POST["paymentid"]);
  $amountid = test_input($_POST["amountid"]);
  $commentid = test_input($_POST["commentid"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<!DOCTYPE html>
<html>
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

                <h1>PayPlug lightbox Refund</h1>


                <p>Please enter a payment id</p>

                <br />

                <form method="post" action="refund.php" name="index" role="form" onsubmit="return checkForm(this);">

                    <div class="form-group">
                    <label for="paymentid">Payment ID:</label>
                    <input type="text" class="form-control" id="paymentid" name="paymentid" placeholder="Your payment id" required autocomplete="on">
                    </div>

                    <div class="form-group">
                      <label for="amount">Amount:</label>
                      <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount to refund" required autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="comment">Comment about this refund</label>
                      <textarea class="form-control" rows="2" id="comment" name="comment" placeholder="Please provide any comment about this refund" required autocomplete="on"></textarea>
                    </div>


                    <p class="text-align">
                    <button type="submit" class="btn btn-primary id="submit">Submit</button>
                    </p>

                    </form>



            </div>



         </div>

      </div>

   </section>

</body>
</html>
