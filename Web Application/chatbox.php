<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat - Project Management system</title>
<link rel="stylesheet" href="style/style.css"/>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="https://nightly.datatables.net/js/dataTables.bootstrap4.min.js "></script>

<style>
.container {
  margin: 60px auto;
  background: #fff;
  padding: 0;
  border-radius: 7px;
}

.profile-image {
  width: 50px;
  height: 50px;
  border-radius: 40px;
}

hr {
  margin: 5px auto;
  width: 60%;
}

.chat-bubble {
  padding: 10px 14px;
  background: #eee;
  margin: 10px 30px;
  border-radius: 9px;
  position: relative;
  animation: fadeIn 1s ease-in;
}
	
.round{
	border-radius: 30px;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
}

/*Right triangle, placed bottom left side slightly in*/
.tri-right.border.btm-left-in:before {
	content: ' ';
	position: absolute;
	width: 0;
	height: 0;
	left: 30px;
  right: auto;
  top: auto;
	bottom: -40px;
	border: 20px solid;
	border-color: #666 transparent transparent #666;
}
.tri-right.btm-left-in:after{
	content: ' ';
	position: absolute;
	width: 0;
	height: 0;
	left: 38px;
  right: auto;
  top: auto;
	bottom: -20px;
	border: 12px solid;
	border-color: lightyellow transparent transparent lightyellow;
}

/* talk bubble contents */
.talktext{
  padding: 1em;
	text-align: left;
  line-height: 1.5em;
}
.talktext p{
  /* remove webkit p margins */
  -webkit-margin-before: 0em;
  -webkit-margin-after: 0em;
}
	
</style>
</head>

<body>
	<div class="container">
	  <div class="col-md-12">
		<div class="settings-tray">
			<div class="friend-drawer no-gutters friend-drawer--grey">
			<img class="profile-image" id="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="profile-pice">
			<div class="text" id="username">
			  
			</div>
		  </div>
		</div>
		 
		  <div class="talk-bubble tri-right round btm-left">
		</div>
		
		<div class="chat-panel" id="chat-panel">
		  
		  <!--Generate chats here-->
		  
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
