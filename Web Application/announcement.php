<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Visitor Log - Project Management System</title>
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
	
	<div class="content">
		<h1>Announcements</h1>		
		<div class="col-md-6">
			<form action="Cannouncement.php" method="post" class="form-horizontal" enctype="multipart/form-data" id="annc-form">

				<div class="form-group">
					<label class="col-md-3 control-label">Announcement Name</label>	
					<div class="col-md-6">
						<input name="annc_name" type="text" required class="form-control"  id="form_title"> 
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label"> Announcement Message </label> 
					<div class="col-md-6"> 
						<textarea name="annc_msg" class="form-control" required id="form_msg" cols="50" rows="5">
  						</textarea>
					</div>
					
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label"> Announcement Image </label> 
					<div class="col-md-6"> 
						<input name="annc_image" type="file" class="form-control" required id="image_url" >  
					</div>
					
				</div>
				
<!--
				<div class="form-group" >
					<div class="col-md-6" id="image_preview"> 
  
					</div>
				</div>
-->
				
				<div>
					<label class="col-md-3 control-label"></label> 
					<div class="col-md-6">
						<input name="post" value="Post" type="submit" class="btn form-control" id="submit_btn"> 
					</div>   
				</div>
				
			</form>  
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
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-storage.js"></script>
<script src="firebase.js"></script>
<script src="auth(logged in).js"></script>
<script src="announcement.js"></script>
</body>
</html>
