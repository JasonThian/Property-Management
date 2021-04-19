<?php
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['ic']) || empty($_POST['unit'])){
	function disable(){}
	function setValue($value){}
}
else{
	function disable()
	{
		echo "readonly='readonly'";
	}
	
	function setValue($value)
	{
		echo "value='$value'";
	}
	
	function getMonth()
	{
		echo date("F",mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")));
	}
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
	<style type="text/css">

span.cls_002{font-family:Arial,serif;font-size:20.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_002{font-family:Arial,serif;font-size:20.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_003{font-family:Arial,serif;font-size:9.1px;color:rgb(0,126,255);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_003{font-family:Arial,serif;font-size:9.1px;color:rgb(0,126,255);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_004{font-family:Arial,serif;font-size:9.1px;color:rgb(49,49,49);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_004{font-family:Arial,serif;font-size:9.1px;color:rgb(49,49,49);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_005{font-family:Arial,serif;font-size:10.1px;color:rgb(0,126,255);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_005{font-family:Arial,serif;font-size:10.1px;color:rgb(0,126,255);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_006{font-family:Arial,serif;font-size:10.1px;color:rgb(49,49,49);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_006{font-family:Arial,serif;font-size:10.1px;color:rgb(49,49,49);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_007{font-family:Arial,serif;font-size:8.1px;color:rgb(99,99,99);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_007{font-family:Arial,serif;font-size:8.1px;color:rgb(99,99,99);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_008{font-family:Arial,serif;font-size:9.1px;color:rgb(49,49,49);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_008{font-family:Arial,serif;font-size:9.1px;color:rgb(49,49,49);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_009{font-family:Arial,serif;font-size:8.1px;color:rgb(49,49,49);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_009{font-family:Arial,serif;font-size:8.1px;color:rgb(49,49,49);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_010{font-family:Arial,serif;font-size:8.1px;color:rgb(49,49,49);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_010{font-family:Arial,serif;font-size:8.1px;color:rgb(49,49,49);font-weight:normal;font-style:normal;text-decoration: none}

</style>
<script type="text/javascript" src="inv_files/wz_jsgraphics.js"></script>
</head>

<body>
	<!-- Place required backend part is fill with #-->
	<?php
		include "navbar.php";
	?>
	
	<div class="content" id="form_opac">
		<h1 class="page-title">Update bill</h1>
		
		<form action="" id="update-bill-form" method="post" class="mt-0 ml-5 col-md-11" class="update-bill-form">
			<input type="hidden" name="user_id" id="user_id" <?php setValue($_POST['user_id']); ?> />
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" <?php setValue($_POST['name']); ?> placeholder="John Doe" required <?php disable(); ?> />
				</div>	
				<div class="col-md-4 mb-4">
					<label for="ic">IC</label>
					<input type="text" name="ic" id="ic" class="form-control" <?php setValue($_POST['ic']); ?> placeholder="012345131234" required <?php disable(); ?> />
				</div>	
			</div>
		
			
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="form-control" <?php setValue($_POST['email']); ?> placeholder="johndoe@gmail.com" required <?php disable(); ?> />
				</div>	
				<div class="col-md-4 mb-4">
					<label for="contact">Contact</label>
					<input type="text" name="contact" id="contact" class="form-control" <?php setValue($_POST['contact']); ?> placeholder="0123456789" required <?php disable(); ?> />
				</div>	
			</div>
		
		
			<div class="form-row">
				<div class="col-md-4 mb-4" id="prices">
					<label for="price" >Price</label>
					<input type="digit" name="price" id="price" class="form-control" placeholder="89.95" pattern="^[1-9][0-9]+[.]?[0-9]{0,2}$" required />
				</div>
				<div class="col-md-4 mb-4" id="descriptions">
					<label for="payment-desc">Payment Description</label>
					<input type="text" name="payment-desc" id="payment-desc" class="form-control" placeholder="<?php getMonth(); ?> Bill" required />		
				</div>		
			</div>
			
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="unit_no">Unit No.</label>
					<input type="text" name="unit_no" id="unit_no" class="form-control" <?php setValue($_POST['unit']); ?> placeholder="B-8-1" required <?php disable(); ?> />
				</div>	
			</div> 
			<input type="submit" class="form-control col-8" value="Generate Invoice" id="generate_inv"/>
				
			
			<!--<button action="confirm_bill.php" id="update-button" type="submit" value="Update" name="update"><i class="fas fa-check"></i> Update</button>-->				
		</form>
	</div>
	<!--preview invoice-->
	<div style="position:absolute;left:50%;margin-left:-297px;top:0px;width:595px;height:841px;border-style:outset;overflow:hidden; display:none; z-index:1000" id="inv_box">
		<div style="position:absolute;left:0px;top:0px">
			<img src="inv_files/background1.jpg" width=595 height=841>
		</div>
		<div style="position:absolute;left:401.04px;top:34.72px" class="cls_002"><span class="cls_002">MONTHLY BILL</span></div>
		<div style="position:absolute;left:424.06px;top:70.76px" class="cls_003">
			<span class="cls_003">REFERENCE:</span>
			<span class="cls_004">    INV-0000001</span>
		</div>
		<div style="position:absolute;left:424.06px;top:84.94px" class="cls_003">
			<span class="cls_003">BILLING DATE:</span>
			<span class="cls_004">Dec 08th ,2020</span>
		</div>
		<div style="position:absolute;left:424.06px;top:99.11px" class="cls_003">
			<span class="cls_003">BILLING TIME:</span>
		</div>
		<div style="position:absolute;left:498.89px;top:99.11px" class="cls_004">
			<span class="cls_004">01:02:53 PM</span>
		</div>
		<div style="position:absolute;left:424.06px;top:113.28px" class="cls_003">
			<span class="cls_003">DUE DATE:</span>
			<span class="cls_004">    Mar 08th ,2021</span>
		</div>
		<div style="position:absolute;left:45.35px;top:166.44px" class="cls_005">
			<span class="cls_005">BILLING FROM</span>
		</div>
		<div style="position:absolute;left:300.47px;top:166.44px" class="cls_005">
			<span class="cls_005">BILLING TO</span>
		</div>
		<div style="position:absolute;left:45.35px;top:200.46px" class="cls_006">
			<span class="cls_006">D'ryx Management Office</span>
		</div>
		<div style="position:absolute;left:300.47px;top:200.46px" class="cls_006">
			<span class="cls_006">name</span>
		</div>
		<div style="position:absolute;left:45.35px;top:221.70px" class="cls_007">
			<span class="cls_007">D'ryx Resident</span>
		</div>
		<div style="position:absolute;left:300.47px;top:221.70px" class="cls_007">
			<span class="cls_007">D'ryx Resident</span>
		</div>
		<div style="position:absolute;left:45.35px;top:235.87px" class="cls_007">
			<span class="cls_007">Sunny Hill Garden</span>
		</div>
		<div style="position:absolute;left:300.47px;top:235.87px" class="cls_007">
			<span class="cls_007">Sunny Hill Garden</span>
		</div>
		<div style="position:absolute;left:45.35px;top:250.05px" class="cls_007">
			<span class="cls_007">Kuching Sabah, 93250</span>
		</div>
		<div style="position:absolute;left:300.47px;top:250.05px" class="cls_007">
			<span class="cls_007">Kuching Sabah, 93250</span>
		</div>
		<!--table headers-->
		<div style="position:absolute;left:48.19px;top:301.79px" class="cls_008"><span class="cls_008">PRODUCT</span></div>
		<div style="position:absolute;left:235.43px;top:301.79px" class="cls_008"><span class="cls_008">QTY</span></div>
		<div style="position:absolute;left:304.43px;top:301.79px" class="cls_008"><span class="cls_008">GST</span></div>
		<div style="position:absolute;left:368.93px;top:301.79px" class="cls_008"><span class="cls_008">PRICE</span></div>
		<div style="position:absolute;left:428.17px;top:301.79px" class="cls_008"><span class="cls_008">DISCOUNT</span></div>
		<div style="position:absolute;left:505.67px;top:301.79px" class="cls_008"><span class="cls_008">TOTAL</span></div>
		<!--row of items-->
		<div id="inv_items">
		</div>
	</div>
	<form action="confirm-bill.php" method="post" id="confirm_bill">
		<input type="hidden" name="name" id="name" <?php setValue($_POST['name']); ?> ></input>
		<input type="hidden" name="contact" id="contact" <?php setValue($_POST['contact']); ?> ></input>
		<input type="hidden" name="email" id="email" <?php setValue($_POST['email']); ?> ></input>
		<input type="hidden" name="unit_no" id="unit_no" <?php setValue($_POST['unit']); ?> ></input>
		<input type="hidden" name="user_id" id="user_id" <?php setValue($_POST['user_id']); ?> />
		
	</form>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js"></script>
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
<script src="update-bill-resident.js"></script>
</body>
</html>