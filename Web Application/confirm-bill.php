<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

if(empty($_POST['price']) || empty($_POST['payment-desc']) || empty($_POST['user_id']) || empty($_POST['name']) || empty($_POST['unit_no']) || empty($_POST['contact']) || empty($_POST['email'])){
	print_r($_POST);
	function setData($data){}
}
else
{
	//initialize variables
	$name = $_POST['name'];
	$price = $_POST['price'];
	$payment = $_POST['payment-desc'];
	$unitno = $_POST['unit_no'];
	$email = $_POST['email'];
//	$contact = $_POST['contact'];
	
	function setData($data)
	{
		$value = $_POST["$data"];
		echo "<input type='hidden' value='$value' id='$data' name='$data' />";
	}
	
	if(isset($_POST['user_id'])){
		$msg = "Hi $name, your bills for unit $unitno is now ready for payment";
		
		
		$mail = new PHPMailer;

		$mail->isSMTP();                            // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                     // Enable SMTP authentication
		$mail->Username = 'jtang0308@gmail.com';          // SMTP username
		$mail->Password = 'Avenger 123'; // SMTP password
		$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                          // TCP port to connect to

		$mail->setFrom('jtang0308@gmail.com', "Dry'x Residence");
		//$mail->addAddress('jtang0308@gmail.com');   // Add a recipient
		$mail->addAddress($email); 
//		$mail->addCC('cc@example.com');
//		$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);  // Set email format to HTML

		$bodyContent = '<h1>Reminder for Bill</h1>';
		$bodyContent .= '<p>'.$msg.'</p>';

		$mail->Subject = 'Reminder for Bill';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}
	
	
	//send notification to fcm
//	$url = "https://fcm.googleapis.com/fcm/send";
//
//	$id = $_POST['user_id'];
//	$fields=array(
//		"to" => "/topics/$id",
//		"notification" => array(
//			"body" => "Your bill is ready. Click here for more info.",
//			"title" => "Your bill is ready"
//		)
//	);
//	
//	$header=array(
//		'Authorization: key=AAAAZA6ZULE:APA91bH8eD1hLLglnMxc68jmu2ynNyDvnVoNRCh5MfDwQB70WZZjzHOz3iCu8A69b4P7X_YbEu2LTGn4npcE1zyHaUMWW2rhdRoGmcuBMVbQdgXRDgf-8_h0grN8wKNS3Lx_IDzzaTZR',
//		'Content-Type:application/json'
//	);
//	$ch = curl_init();
//	curl_setopt($ch,CURLOPT_URL,$url);
//	curl_setopt($ch,CURLOPT_POST,true);
//	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//	curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
//	$result = curl_exec($ch);
//	curl_close($ch);
	
	
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Bill - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="confirm-bill.js"></script>
</head>
	<body>
		<div class="sidebar">
			<header><img src="images/dryx-black.png" alt="dryx-logo" width="50%"></header>
			<ul>
				<li><a href="residents.html"><i class="fas fa-user-friends"></i>Residents</a></li>
				<li><a href="livechat.html"><i class="fas fa-comment-dots"></i>Live Chat</a></li>
				<li><a href="update-bill.html"><i class="fas fa-bolt"></i>Update bill</a></li>
				<li><a href="payment-log.html"><i class="fas fa-money-bill-alt"></i>Payment Log</a></li>
				<li><a href="visitor-log.html"><i class="fas fa-address-card"></i>Visitor Log</a></li>
				<li><a href="announcement.html"><i class="fas fa-bell"></i>Announcements</a></li>
				<li><a href="bookings.html"><i class="fas fa-building"></i>Facility bookings</a></li>
				<li><a href="login.html" id="logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
			</ul>
		</div>
		<?php setData('user_id'); setData('price'); setData('payment-desc'); setData('name'); setData('contact'); setData('unit_no'); setData('email'); ?>
	</body>
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
<?php echo "<script src='confirm-bill.js'></script>"; ?>
</html>