<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Issue Report - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.bottom{
			display: none;
		}
	</style>
</head>

<body>
	<?php
		include "navbar.php";
	?>
	<div class="content">
		<h1 class="page-title">Facility</h1>
		
		<table id="resident-list" class="table table-sm hover order-column dt-responsive nowrap">
		<div  style="margin:0 auto; width:580px; height: 290px;">
			<canvas id="myChart" width="580" height="290"></canvas>
		</div>	
			<thead>
				<tr>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>		
		</table>			
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
<script src="facility.js"></script>
</html>
