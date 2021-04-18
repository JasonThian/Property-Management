<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<!-- Place required backend part is fill with #-->
	<?php
		include "navbar.php";
	?>
	
	<div class="content">
		<h1 class="page-title">Add Tenants</h1>		
		
		<form action="add-tenant.php" method="post" class="mt-0 col-md-10" id="add-resident-form">
		
			<div class="form-row">				
				<div class="col-md-4 mb-4">
					<label for="unitno">Unit no.</label>
					<input type="text" id="unitno" class="form-control" placeholder="e.g. B-8-1" required>					
				</div>
				
				<div class="col-md-4 mb-4 px-4">
				<label for="carplate-no">Carplate No.</label>
				<input type="text" id="carplate-number" class="form-control" placeholder="QAA123" required>
				
					<button class="add">Add carplate</button>
					<!--button class="remove">Remove carplate</button-->
				
				<div id="new_carplate_no"></div>
				<input type="hidden" value="1" id="total_carplate_no">
			</div>
			</div>
		
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="name" >Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Full name (e.g. John Doe)" required>
				</div>
			</div>
			
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="icnumber">Identificaton No.</label>
					<input type="text" id="idno" class="form-control" placeholder="e.g. XXXXX-XX-XXXX" required>		
				</div>
			</div>
			
			

			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="cntno">Contact no.</label>
					<input type="tel" id="contact" class="form-control" placeholder="e.g. 012-3456789" required>		
				</div>
			</div>
			
			<div class="col-md-4 mb-4 px-0">
				<label for="email">Email</label>
				<input type="text" id="email" class="form-control" placeholder="e.g. johndoe@hotmail.com" required>		
			</div>
					
							
			<button id="done-button" type="submit" name="done"><i class="fas fa-check"></i>  Done</button>					
		</form>
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
</body>
</html>
