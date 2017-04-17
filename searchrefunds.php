<?php
// define variables and set to empty values
$paymentid = "";
$refundid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $paymentid = test_input($_POST["paymentid"]);
  $refundid = test_input($_POST["refundid"]);

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

                <h1>PayPlug lightbox Retrieve a refund</h1>


                <p>Please enter a payment id and a refund id</p>

                <br />

                <form method="post" action="retrieverefunds.php" name="index" role="form" onsubmit="return checkForm(this);">

                    <div class="form-group">
                    <label for="paymentid">Payment ID:</label>
                    <input type="text" class="form-control" id="paymentid" name="paymentid" placeholder="Your payment id" required autocomplete="on">
                    </div>

                    <div class="form-group">
                    <label for="refundid">Refund ID:</label>
                    <input type="text" class="form-control" id="refundid" name="refundid" placeholder="Your refund id" required autocomplete="on">
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
