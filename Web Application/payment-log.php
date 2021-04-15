<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment Log - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<?php
		include "navbar.php";
	?>
	
	<div class="content">
		<h1 class="page-title">Payment Log</h1>
		
		<table id="payment-log" class="table table-sm hover order-column dt-responsive nowrap">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Unit number</th>
					<th>Amount</th>		
					<th>Status</th>
				</tr>
			</thead>
			
			<tbody id="list">
			</tbody>	
		</table>

		<div class="pagination-container">
			<nav>
				<ul class="pagination">
				</ul>
			</nav>	
		</div>
	</div>
	<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-functions.js"></script>
<script src="firebase.js"></script>
<script src="auth(logged in).js"></script>
<script src="payment.js"></script>
</body>
</html>
