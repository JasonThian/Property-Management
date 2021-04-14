<?php
$img = "";
if(isset($_FILES['annc_image']['name'])){
	$img = $_REQUEST['imageurl'];
	
	$url = "https://fcm.googleapis.com/fcm/send";

	$fields=array(
		"to"=>"/topics/announcement",
		"notification" => array(
			"body" => $_REQUEST['annc_msg'],
			"title" => $_REQUEST['annc_name'],
			"image" => $img,
			"click_action" => "FCM_PLUGIN_ACTIVITY"
		),
		"data"=>array(
			"body"=> $_REQUEST['annc_msg'],
			"title"=>$_REQUEST['annc_name'],
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
	
	
	header( "refresh:5; url=residents.html" ); 
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
	<?php
		include "navbar.php";
	?>
	
	<div class="content">	
		<img src="images/success.png" alt="success-icon" style="width:5%"/>
		<h1 class="announcement-sent">Announcement Sent</h1>
		<h1 class="announcement-text">Your announcement was posted successfully!</h1>
		<h1 class="redirect">Please wait, you will be redirected to homepage shortly....</h1>
	</div>
</body>
</html>