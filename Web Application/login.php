<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login - Project Management System</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>	
</head>

<body class="loginpage">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images/dryx-logo.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
	<form action="" method="POST" id="login-form" name="loginform">
		<input type="text" id="login" class="fadeIn second" name="login" placeholder="Username">
		<input type="password" id="password" class="fadeIn third" name="login" placeholder="Password">
		<input type="checkbox" onclick="showPassword()">
		<label>Show Password</label>
		<input type="submit" class="fadeIn fourth" value="Log In" id="login-button">
		<p id="error"></p>
	</form>

    <!-- Remind Passowrd 
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>-->

  </div>
</div>
	
<script>
	function showPassword() {
	  var x = document.getElementById("password");
	  if (x.type === "password") {
		x.type = "text";
	  } else {
		x.type = "password";
	  }
	}
</script>

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
<script src="auth.js"></script>	

</body>
</html>
