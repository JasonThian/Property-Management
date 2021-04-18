<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Residents - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://nightly.datatables.net/js/dataTables.bootstrap4.min.js "></script>
</head>

<body>
	<?php
		include "navbar.php";
	?>
	
	<div class="content">
		<h1 class="page-title">Residents</h1>
		
		<a id ="add-residents" href="add-residents.php" ><i class="fas fa-plus"></i>  Add Residents</a>
		<a id ="create-admin" href="create-admin.php" ><i class="fas fa-plus"></i>  Create Admin</a>
		
		<table id="resident-list" class="table hover order-column">
			<thead>
				<tr>
					<!-- <th>Name</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Identification No.</th>
					<th>Unit number</th>
					<th>Resident type</th>
					<th>Action</th>
					<th>Priviledged Action</th> -->
				</tr>
			</thead>		

			
		</table>
		
		<div class="pagination-container">
			<nav>
				<ul class="pagination"></ul>
			</nav>
		</div>
			
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
<script src="residents.js"></script>
</body>
</html>
