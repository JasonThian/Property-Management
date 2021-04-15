<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Issue Report - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<?php
		include "navbar.php";
	?>
	
	<!-- Image Pop Up Container -->
	<div id="img-container" onclick="hide();" style="display:none; position:absolute; text-align:center; z-index:1000; background: rgba(0, 0, 0, 0.7); height:100%; width:100%">
		<img id="img-holder" style="height:auto;width:75%;max-height:540px; max-width:960px; z-index:2000; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"/>
	</div>
	
	<div class="content">
		<h1 class="page-title">Issue Report</h1>
		
		<table id="issue-report" class="table hover order-column">
			<thead>
				<tr>
					<th>Date</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Email</th>
					<th>Block Number</th>
					<th>Image</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			
			<tbody id="list">
			
			</tbody>
		</table>
		
		<div class="pagination-container">
			<nav>
				<ul class="pagination"></ul>
			</nav>
		</div>
			
	</div>
</body>
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
<script src="date.format.js"></script>
<script src="issue-report.js"></script>
</html>
