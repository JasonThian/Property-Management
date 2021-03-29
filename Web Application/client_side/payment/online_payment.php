<?php
?>
<!DOCTYPE html>
<html lang="en">
<body>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.24/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="global.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.24/datatables.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
</head>
<form id="payment-form">
  <div class="form-row">
    <div>
      <label for="fpx-bank-element">
        FPX Bank
      </label>
      <div id="fpx-bank-element">
        <!-- A Stripe Element will be inserted here. -->
      </div>
    </div>
  </div>

  <button id="fpx-button">
    Submit Payment
  </button>
  <button id="online-payment-cancel-button" style="margin-top:10px;background:#990000;">
	Cancel
  </button>
  <!-- Used to display form errors. -->
  <div id="error-message" role="alert"></div>
</form>
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-functions.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-storage.js"></script>
<script type="text/javascript" src="online_payment.js"></script>
</html>