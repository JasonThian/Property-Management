<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat - Project Management system</title>
<link rel="stylesheet" href="style/style.css"/>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.message-holder{
	min-height: 80vh;
	/* overflow-y: scroll; */
}

.profile-image{
	width: 45px;
	height: 45px;
	margin: 8px;
}
</style>
</head>

<body>
	<div class="col-md-12">
	  <div class="col-md-12">
		<div class="user-info">
			<img class="profile-image" id="profile-image" src="https://saiuniversity.edu.in/wp-content/uploads/2021/02/default-img.jpg" alt="profile-pic">
			<div class="text" id="username">
			<!-- User name -->
			</div>
		</div>
		
		<div class="chat-panel" id="chat-panel">
			<div class="message-holder" id="message-holder">
				<!--Generate chats here-->
			</div>
		</div>

		<div class="col-md-12 chat-box-tray">
			<input type="text" placeholder="Type your message here..." id="message">
			<i class="far fa-paper-plane" id="send-message"></i>
		</div>
	  </div>
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
<script src="chatbox.js"></script>
</body>
</html>
