<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Appointment Payment</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add your custom styles here -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .payment-container {
      max-width: 400px;
      margin: 50px auto;
    }

    .card {
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .btn-pay {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="payment-container">
    <div class="card">
      <h3 class="text-center mb-4">Payment Details</h3>

      <!-- Payment Form -->
      <form id="payment-form" action="process_payment.php" method="post">
  <div class="form-group">
    <label for="card-element">Credit or Debit Card</label>
    <div id="card-element">
      <!-- Card number -->
      <input type="text" id="card-number" class="form-control" placeholder="Card Number" />

      <!-- Expiration Date -->
      <div class="form-row">
        <div class="col">
          <input type="text" id="card-expiry-month" class="form-control" placeholder="MM" />
        </div>
        <div class="col">
          <input type="text" id="card-expiry-year" class="form-control" placeholder="YYYY" />
        </div>
      </div>

      <!-- CVC -->
      <input type="text" id="card-cvc" class="form-control" placeholder="CVC" />
    </div>
    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>
  <button type="submit" class="btn btn-pay btn-block">Pay Appointment Fee</button>
</form>


    </div>
  </div>
</div>

<!-- Stripe.js library -->
<script src="https://js.stripe.com/v3/"></script>

<!-- Add this script after the Stripe.js library -->
<script>
  // Your 2Checkout account credentials
  const sellerId = '254752433879';
  const publishableKey = '57EE5A5E-CCFA-41B1-BD32-5492753A7D39';

  // Set your 2Checkout publishable key
  TCO_PUBLIC_KEY = publishableKey;

  // Create an event listener for form submission
  document.getElementById('payment-form').addEventListener('submit', function (event) {
    event.preventDefault();

    // Use 2Checkout library to create a token
    TCO.requestToken(handleToken, handleError);
  });

  // Handle the token received from 2Checkout
  function handleToken(token) {
    // You can add additional logic here to handle the token, such as sending it to your server.
    console.log(token);
    alert('Payment successful!');
  }

  // Handle errors during token creation
  function handleError(error) {
    // Inform the user if there was an error
    const errorElement = document.getElementById('card-errors');
    errorElement.textContent = error.msg;
  }
</script>


<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>





</body>
</html>
