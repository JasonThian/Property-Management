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
	
	<div class="create-admin">
		<h1>Residents</h1>
		<a id ="add-residents" href="add-residents.php" ><i class="fas fa-plus"></i>  Add Residents</a>
		<a id ="create-admin" href="create-admin.html" ><i class="fas fa-plus"></i>  Create Admin</a>
		
		<form action="" method="post" class="mt-0 col-md-10" id="add-resident-form">
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="email" >Email</label>
					<input type="text" id="email" class="form-control" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" placeholder="john@hotmail.com" required>
				</div>
			</div>

			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control" required>		
				</div>
			</div>
			
			<div id="confirm-password" class="form-row">
				<div class="col-md-4 mb-4">
					<label for="confirm-password">Confirm Password</label>
					<input type="password" name="confirmPassword" class="form-control" id="cpassword" required>		
				</div>
			</div>
				
			<button id="create-button" type="submit" name="create"><i class="fas fa-check"></i>  Create</button>					
		</form>
	</div>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-functions.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-storage.js"></script>
<script src="firebase.js"></script>
<script src="auth(logged in).js"></script>
<script src="add-admin.js"></script>
</body>
</html>
