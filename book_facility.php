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
	
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://nightly.datatables.net/js/dataTables.bootstrap4.min.js "></script>
	
	<!--datepicker js and css-->
	 <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<style type="text/css">
        #book_date{
            padding:5px;
        }

    </style>
</head>

<body>
	<?php
		include "navbar.php";
	?>
	<div class="content">
		<h1 class="page-title">Booking</h1>

		<form class="needs-validation facility_selection" novalidate>
			<div class="form-group px-0 row col-sm-11 mx-auto date-range">
				<label class="col-sm-2 col-form-label" for="unitno">Date Range</label>
				<input class="form-control form-contol-sm col-sm-3" readonly type="text" name="daterange" value="" id="book_date"/>
			</div>

			<div class="form-group px-0 row col-md-11 mx-auto date-range">
				<label class="col-sm-2 col-form-label" for="user_type">Landlord/Tenant</label>
				<select class="form-control form-contol-sm col-sm-3" name="user_type" id="book_user">
									
				</select>
			</div>
			
			<label class="col-form-label choose-facility" for="facility">Facility</label>
			<select class="form-control form-contol-sm col-sm-10" name="facility" id="book_facility">
				<!--<option value="BBQ Pit">Bbq Pit</option>
				<option value="Sky Lounge">Sky Lounge</option>
				<option value="Gym">Gym</option>
				<option value="AV Room">AV Room</option>
				<option value="Sauna">Sauna</option>-->					
			</select>
			
			<label class="col-form-label choose-facility" for="time_slots">Time Slots</label>
			<select class="form-control form-contol-sm col-sm-10" name="time_slots" id="book_time_slots">
				<option value="08:00" id="08:00" class="time_slot">08:00</option>
				<option value="08:00" id="10:00" class="time_slot">10:00</option>
				<option value="12:00" id="12:00" class="time_slot">12:00</option>
				<option value="14:00" id="14:00" class="time_slot">14:00</option>
				<option value="16:00" id="16:00" class="time_slot">16:00</option>
				<option value="18:00" id="18:00" class="time_slot">18:00</option>
				<option value="20:00" id="20:00" class="time_slot">20:00</option>
				<option value="22:00" id="22:00" class="time_slot">22:00</option>				
			</select>
			
			<input class="mx-auto" id="book_button" type="submit" name="done"></input>
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
<script src="book_facility.js"></script>
</body>
</html>
