<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

use Konekt\PdfInvoice\InvoicePrinter;
$message = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$timestamp = strtotime("now");

if(isset($_POST['item0'])){
	$item1=$_POST['item0'];
}else
	$item1="";
	
if(isset($_POST['item1'])){
	$item2=$_POST['item1'];
}else
	$item2="";

if(isset($_POST['item2'])){
	$item3=$_POST['item2'];
}else
	$item3="";
	
if(isset($_POST['item3'])){
	$item4=$_POST['item3'];
}else
	$item4="";
	
if(isset($_POST['item4'])){
	$item5=$_POST['item4'];
}else
	$item5="";
	
	
if(isset($_POST['ip0'])){
	$price1=$_POST['ip0'];
}else
	$price1="";
	
if(isset($_POST['ip1'])){
	$price2=$_POST['ip1'];
}else
	$price2="";
	
if(isset($_POST['ip2'])){
	$price3=$_POST['ip2'];
}else
	$price3="";
	
if(isset($_POST['ip3'])){
	$price4=$_POST['ip3'];
}else
	$price4="";
	
if(isset($_POST['ip4'])){
	$price5=$_POST['ip4'];
}else
	$price5="";

if(empty($_POST['user_id']) || empty($_POST['name']) || empty($_POST['unit_no']) || empty($_POST['contact']) || empty($_POST['email'])){
	
	function setData($data){}

}
else
{
	function setData($data)
	{
		$value = $_POST["$data"];
		echo "<input type='hidden' value='$value' id='$data' name='$data' />";
		echo $value;
	}
	
	$oldmask = umask(0);
    mkdir("bills", 0777);
    umask($oldmask);
	
	//initialize variables
	$name = $_POST['name'];

	$unitno = $_POST['unit_no'];
	$email = $_POST['email'];
//	$contact = $_POST['contact'];
	getinv($item1,$price1,$item2,$price2,$item3,$price3,$item4,$price4,$item5,$price5,$timestamp);
	
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
		$mail->AddAttachment(getcwd()."/bills/$timestamp.pdf", $name = "$timestamp",  $encoding = 'base64', $type = 'application/pdf');
		if(!$mail->send()) {
			$message = "Message could not be sent.<br>Mailer Error: " . $mail->ErrorInfo;
		} else {
			$message = 'Message has been sent';
		}
	}
	
	
	//send notification to fcm
	$url = "https://fcm.googleapis.com/fcm/send";

	$id = $_POST['user_id'];
	$fields=array(
		"to" => "/topics/$id",
		"priority" => "high",
		"notification" => array(
			"body" => "Your bill is ready. Click here for more info.",
			"title" => "Your bill is ready",
			'click_action' => 'FCM_PLUGIN_ACTIVITY'
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
function getinv($desc1,$price1,$desc2,$price2,$desc3,$price3,$desc4,$price4,$desc5,$price5,$timestamp){
	

  $invoice = new InvoicePrinter();
  
  /* Header settings */
  $invoice->setLogo("images/dryx-logo.png");   //logo image path
  $invoice->setColor("#007fff");      // pdf color scheme
  $invoice->setType("Monthly Bill");    // Invoice Type
  $invoice->setReference("INV-0000001");   // Reference
  $invoice->setDate(date('M dS ,Y',time()));   //Billing Date
  $invoice->setTime(date('h:i:s A',time()));   //Billing Time
  $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
  $invoice->setFrom(array("D'ryx Management Office","D'ryx Resident","Sunny Hill Garden","Kuching Sabah, 93250"));
  $invoice->setTo(array("name","D'ryx Resident","Sunny Hill Garden","Kuching Sabah, 93250"));
  
  $invoice->addItem($desc1,"",1,0,floatval($price1),0,floatval($price1));
  if(floatval($price2) > 0){
	  $invoice->addItem($desc2,"",1,0,floatval($price2),0,floatval($price2));
  }
  if(floatval($price3) > 0){
	 $invoice->addItem($desc3,"",1,0,floatval($price3),0,floatval($price3));
  }
  if(floatval($price4) > 0){
	  $invoice->addItem($desc4,"",1,0,floatval($price4),0,floatval($price4));
  }
  if(floatval($price5) > 0){
	  $invoice->addItem($desc5,"",1,0,floatval($price5),0,floatval($price5));
  }
  
  
  
  $total = floatval($price1) + floatval($price2)+ floatval($price3)+ floatval($price4);
  $invoice->addTotal("Total",$total);
  
  //$invoice->addBadge("Payment Paid");
  
  //$invoice->addTitle("Important Notice");
  
  //$invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");
  
  $invoice->setFooternote("D'ryx Residence");
  
  $invoice->render("bills/".$timestamp.".pdf","F");
  
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
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://nightly.datatables.net/js/dataTables.bootstrap4.min.js "></script>
	<script src="confirm-bill.js"></script>
</head>
	<body>
		<?php
			include "navbar.php";
		?>
		
		<div class="content">	
		<img src="images/success.png" class="announcement-success" alt="success-icon" style="width:50px; margin: 2% auto;"/>
		<h1 class="announcement-sent">Bill Updated</h1>
		<h1 class="announcement-text">Updated bill will be sent to user shortly!</h1>
		<h1 class="redirect">Please wait, you will be redirected to the homepage shortly....</h1>

			<table id="update-bill-table" class="table bordered hover order-column">  
			  <tbody>
				<tr>
					<td class="table-head">User ID</td>
					<td><?php setData('user_id');?></td>
				</tr>

				<tr>
					<td class="table-head">Unit no</td>
					<td><?php setData('unit_no');?></td>
				</tr>
				
				<tr>
					<td class="table-head">Name</td>
					<td><?php setData('name');?></td>
				</tr>

				<tr>
					<td class="table-head">Contact</td>
					<td><?php setData('contact');?></td>
				</tr>
				
				<tr>
					<td class="table-head">Email</td>
					<td><?php setData('email');?></td>
				</tr>

				<tr>
					<td class="table-head">Price</td>
					<td><?php setData('total_p');?></td>
				</tr>
				<tr>
					<td class="table-head">Description</td>
					<td><?php setData('item0');?></td>
				</tr>
			  </tbody>
			</table>
		
		<!--?php setData('user_id'); setData('price'); setData('payment-desc'); setData('name'); setData('contact'); setData('unit_no'); setData('email'); ?>-->
		<p style="position:absolute; left: 20%;"><?php echo $message; ?></p>
	</div>
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