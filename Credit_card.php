<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Credit card</title>
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#00b4d8;">

      
  <form class="form" action="Send_card.php" method="post">
    <div class="container-fluid grid">
      <div class="row pull-center">

        <div class="row card">
        </div>
        <br />

        <div class="Credit-card-number">
          <label style="display: block;text-align: center;" >Credit Card Number </label>
          <input type="text" name="number" required autocomplete="off">
        </div>


        <div class="Expiration">
          <label style="display: block;text-align: center;">Expiration</label>

          <input type="text" placeholder="MM/YY" name="expiry" class="form-control" required autocomplete="off">

        </div>

        <div class="name">
          <label style="display: block;text-align: center;">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Full Name" required autocomplete="off">
        </div>

        <div class="cvv">

          <label style="display: block;text-align: center;">CVV </label>

          <input type="text" name="cvv" class="form-control" required autocomplete="off">
        </div>

        <div class="col-md-12 text-right">
          <input type="submit" class="btn" value="Submit" name="invio" >
        </div>
      </div>

    </div>
  </form>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/card/1.3.1/js/card.min.js'></script>
  <script src="js/script.js"></script>



</body>

</html>