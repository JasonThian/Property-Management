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
	<div id="card-element"><!--Stripe.js injects the Card Element--></div>
	<button id="submit">
		<div class="spinner hidden" id="spinner"></div>
		<span id="button-text">Pay</span>
	</button>
	<button id="credit-payment-cancel-button" style="margin-top:10px;">
		Cancel
	</button>
	<p id="card-error" role="alert"></p>
	<p class="result-message hidden">
		Payment succeeded, see the result in your
		<a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
	</p>
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
<script type="text/javascript" src="credit_payment.js"></script>
</html>