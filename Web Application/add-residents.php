<?php
$name = "";
$id = "";

$element = "";
$selected = "";
$disabled = "disabled";
if(isset($_POST['id']) && isset($_POST['name'])){
	$name = $_POST['name'];
	$id = $_POST['id'];
		
	$element = "<input type='hidden' value='$id' id='id'></input>";
		
	$selected = "selected";
//	echo "<script>console.log('isset')</script>";
	$disabled = "";
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Project Management System</title>
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
		<h1 id="test">Residents</h1>
		<a id ="add-residents" href="add-residents.html" ><i class="fas fa-plus"></i>  Add Residents</a>
		<a id ="create-admin" href="create-admin.html" ><i class="fas fa-plus"></i>  Create Admin</a>
		
		<form action="" method="post" class="mt-0 col-md-10" id="add-resident-form">
			<?php echo $element;?>
			
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="resident-type">Resident Type</label>
					<select onChange="addTenants()" class="form-control" id="resident-type">
						<option value="landlord">Landlord</option>
						<option value="tenant" <?php echo $selected; echo $disabled;?>>Tenant</option>
						<option value="household">HouseHold</option>
					</select>
				</div>
				
				<div class="col-md-4 mb-4 px-4">
					<label for="unitno">Unit no.</label>
					<input type="text" id="unitno" class="form-control" placeholder="e.g. B-8-1" required>		
				</div>				
			</div>
		
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="name" >Name</label>
					<input type="text" name="name" id="name" class="form-control" placeholder="Full name (e.g. John Doe)" required>
				</div>
				
				<div id="have-tenant" class="col-md-4 mb-4 px-4" style="display:none;">
					<label for="tenant">landlord</label	>
					<div class="tenant">							
						<input id="yes-button" type="text" name="radAnswer" class="gender" <?php echo "value='$name'"?> disabled>		
					</div>
				</div>
				<div id="have-household" class="col-md-4 mb-4 px-4" style="display:none;">
					<label for="household">landlord/Tenant</label	>
					<div class="household">							
						<input id="yes-button" type="text" name="radAnswer" class="gender" <?php echo "value='$name'"?> disabled>		
					</div>
				</div>
			</div>
			
			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="icnumber">Identificaton No.</label>
					<input type="text" id="idno" class="form-control" placeholder="e.g. XXXXX-XX-XXXX" required>
				</div>
			
				<div class="col-md-4 mb-4 px-4">
					<label for="cntno">Contact no.</label>
					<input type="tel" id="contact" class="form-control" placeholder="e.g. 012-3456789" required>		
				</div>
			</div>

			<div class="form-row">
				<div class="col-md-4 mb-4">
					<label for="email">Email</label>
					<input type="text" id="email" class="form-control" placeholder="eg. example@gmail.com" required>		


				</div>
				
				<div class="col-md-4 mb-4 px-4" id="carplates">
					<label for="carplate-no">Carplate No.</label>		


					<div class="form-inline">
						<input type="text" id="carplate-number" class="form-control mr-1" placeholder="QAA123" required>
						<button id="add" class='btn btn-primary' type="button">Add</i></button>
					</div>

					
					<div class="form-inline">
						<div id="new_carplate_no">
						
						</div>				
					</div>
				</div>
			</div>
			
			
							
			<button id="done-button" type="submit" name="done"><i class="fas fa-check"></i>  Done</button>					
		</form>
	</div>
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


<script>
	var new_carplate_no = 0;

		document.getElementById('add').addEventListener("click", function(e){
		e.preventDefault();
		add(new_carplate_no++);
		});	
													

	function add() { 	
		
	  	var new_input = "<input type='text' id='carplate"+new_carplate_no+"' id='carplate-number' class='form-control mr-1' class='carplates' placeholder='QAA123' required'><button name='remove-carplate' class='btn btn-primary' id='"+new_carplate_no+"' type='button'>Remove</button>";

	  	$('#new_carplate_no').append(new_input);
				
		var button_list = document.getElementsByName("remove-carplate");
		for (var i=0; i< button_list.length; i++ ) {

			button_list[i].addEventListener("click", function(){
				remove(this.id);
				this.remove();
			});
			
			//Got bug
			if(button_list.length > 3){		
				document.getElementById('add').disabled = true;
				alert("You can only add up to 5 carplates.");
				alert = false;
			}

		}
		
	}

	function remove(elementno) {
	  	var carplates = document.getElementById("carplate"+elementno);
		carplates.remove();
	}
</script>

<script src="add-residents.js"></script>
</body>
</html>
