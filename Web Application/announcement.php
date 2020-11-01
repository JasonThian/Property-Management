<?php
$img = "";
if(isset($_FILES['annc_image']['name'])){
	$img = $_FILES['annc_image']['name'];
	echo $img;
	
	$url = "https://fcm.googleapis.com/fcm/send";

	$fields=array(
		"to" => "/topics/announcement",
		"notification" => array(
			"body" => $_REQUEST['annc_msg'],
			"title" => $_REQUEST['annc_name'],
			"image" => $img
		)
	);
	
	$header=array(
		'Authorization: key=AAAAZA6ZULE:APA91bH8eD1hLLglnMxc68jmu2ynNyDvnVoNRCh5MfDwQB70WZZjzHOz3iCu8A69b4P7X_YbEu2LTGn4npcE1zyHaUMWW2rhdRoGmcuBMVbQdgXRDgf-8_h0grN8wKNS3Lx_IDzzaTZR',
		'Content-Type:application/json'
	);
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
	$result = curl_exec($ch);
	curl_close($ch);
}

?>
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
	<div class="sidebar">
		<header><img src="images/dryx-black.png" alt="dryx-logo" width="50%"></header>
		<ul>
			<li><a href="residents.html"><i class="fas fa-user-friends"></i>Residents</a></li>
			<li><a href="livechat.html"><i class="fas fa-comment-dots"></i>Live Chat</a></li>
			<li><a href="payment-log.html"><i class="fas fa-money-bill-alt"></i>Payment Log</a></li>
			<li><a href="visitor-log.html"><i class="fas fa-address-card"></i>Visitor Log</a></li>
			<li><a href="announcement.html"><i class="fas fa-bell"></i>Announcements</a></li>
			<li><a href="bookings.html"><i class="fas fa-building"></i>Facility bookings</a></li>
			<li><a href="login.html" id="logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
		</ul>
	</div>
	
	<div class="content">
		<p style="color:green">Announcement Sent</p>
	</div>
</body>
</html>
