<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
		<h1 class="page-title">Booking Setting</h1>

		
		<div class="form-group px-0 row col-sm-11 mx-auto date-range">
			<label class="col-sm-2 col-form-label" for="unitno">Date Range</label>
			<input class="form-control form-contol-sm col-sm-3" type="text" name="daterange" value=""/>
		</div>

		<div class="form-group px-0 row col-md-11 mx-auto date-range">
			<label class="col-sm-2 col-form-label" for="user_type">Targeted User</label>
			<select class="form-control form-contol-sm col-sm-3" name="user_type" id="user_type">
				<option value="landlord">Landlords</option>
				<option value="user">Tenants</option>
				<option value="all">All</option>					
			</select>
		</div>

		<div class="col-md-11 mx-auto form-group">
			<form class="needs-validation facility_selection" novalidate>
				<div class="form-row">
					<div class="col-md-4 mb-3 limit_slot">
						<label class="col-form-label choose-facility" for="facility">Facility</label>
						<select class="form-control form-contol-sm col-sm-10" name="facility" id="facility">
							<option value="BBQ Pit">Bbq Pit</option>
							<option value="Sky Lounge">Sky Lounge</option>
							<option value="Gym">Gym</option>
							<option value="AV Room">AV Room</option>
							<option value="Sauna">Sauna</option>					
						</select>
					</div>	
				
					<div class="col-md-4 limit_slot">
						<label class="col-form-label" for="unitno">Limit</label>
						<input class="form-control form-contol-sm col-sm-10" id="limit" type="number" name="limit"/>
						<p class="limit-text text-muted"><small>*The default booking limit for each timeslot is 3*</small></p>
					</div>	
				</div>
				<button class="mx-auto" id="complete-button" type="submit" name="done"><i class="fas fa-check"></i>  Done</button>
			</form>	
		</div>
		
		<table id="resident-list" class="table-sm hover order-column">
		<thead>
			<th><input type="checkbox" id="SelectAll"><br></th>
			<th>End Time</th>
			<th>Start time</th>
		</thead>
			<tbody>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time1" value="08:00">
					<!-- <label class="custom-control-label" for="customCheck1"></label> -->
					<label for="time1"></label><br>
				</td>
				
				<td>8:00 am</td>
				<td>10:00 am</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time2" value="10:00">
					<label for="time2"></label><br>	
				</td>
				<td>10:00 am</td>
				<td>12:00 pm</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time3" value="12:00">
					<label for="time3"></label><br>	
				</td>
				<td>12:00 pm</td>
				<td>2:00 pm</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time4" value="14:00">
					<label for="time4"></label><br>	
				</td>
				<td>2:00 pm</td>
				<td>4:00 pm</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time5" value="16:00">
					<label for="time5"></label><br>	
				</td>
				<td>4:00 pm</td>
				<td>6:00 pm</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time6" value="18:00">
					<label for="time6"></label><br>	
				</td>
				
				<td>6:00 pm</td>
				<td>8:00 pm</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time7" value="20:00">
					<label for="time7"></label><br>	
				</td>
				
				<td>8:00 pm</td>
				<td>10:00 pm</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" class="timeslots" name="time8" value="22:00">
					<label for="time8"></label><br>		
				</td>
				<td>10:00 pm</td>
				<td>12:00 pm</td>
			</tr>
			</tbody>
		</table>
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
<script src="booking-settings.js"></script>
</body>
</html>
