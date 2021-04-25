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
  margin: 10vh auto;
  background: #fff;
  padding: 0;
  border-radius: 7px;
}

.profile-image {
  width: 50px;
  height: 50px;
  border-radius: 40px;
}

.settings-tray {
	background: #eee;
    padding: 1% 5%;
    border-radius: 8px;
}

.no-gutters {
   padding: 0;
}

.chat-bubble-right{
    float: right;
    
}
   
i{
	font-size: 25px;
    color: #6c757d;
    transition: 0.3s;
}
  
i:hover {
  color: #007bff;
  cursor: pointer;
}

input {
  border: none;
  border-radius: 8px;
  width: 90%;
}

.friend-drawer {
  display: flex;
  vertical-align: baseline;
  transition: 0.3s ease;
}

.text {
    margin: 9px;
    width: 70%;
}
 
h6 {
  margin-top: 6px;
  margin-bottom: 0;
}

p {
  margin: 0;
}

p:hover {
    background: $blue;
    cursor: pointer;
}

p, h6, .time {
  color: #007bff !important;
}

hr {
  margin: 5px auto;
  width: 60%;
}

.chat-bubble{
  padding: 10px 14px;
  background: #eee;
  margin: 10px 30px;
  border-radius: 9px;
  position: relative;
}

.chat-bubble:after {
    content: "";
    position: absolute;
    top: 50%;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
  }

.chat-bubble-left:after {
      left: 0;
      border-right-color: #eee;
      border-left: 0;
      margin-left: -20px;
  }

.chat-bubble-right:after {
      right: 0;
      border-left-color: #007bff;
      border-right: 0;
      margin-right: -20px;
    }
  }
}

.offset-md-9 .chat-bubble{
    background-color: #007bff;
    color: #fff;
}

.chat-box-tray {
	background: #eee;
    display: flex;
    padding: 10px 15px;
    align-items: center;
    bottom: 0;
}

 input {
   margin: 0 10px;
   padding: 6px 2px;
 }

 #chat-panel
{
	overflow:   none;
	position:   relative;
	width:      100%;
	height:     330px;
}

#chat-messages
{
	overflow-x: hidden;
    bottom: 0;
    max-height: 330px;
}

</style>
</head>

<body>
	<div class="container">
		<div class="col-md-12">
			<div class="settings-tray">
				<div class="friend-drawer no-gutters">
					<img class="profile-image" id="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="profile-pic">
					<div class="text" id="username">
			  
					</div>
				</div>
			</div>

			<div class="chat-panel" id="chat-panel">
				<div id="chat-messages">
						<!-- Generate chats here -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="chat-box-tray">
					<input id="message" type="text" placeholder="Type your message here...">
					<i id="send-message" class="material-icons">Send</i>
					</div>
				</div>
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
