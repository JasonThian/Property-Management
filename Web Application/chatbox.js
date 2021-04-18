// JavaScript Document
var userid = location.search.substring(1);
var chat_list = document.getElementById("chat-messages");

var chats = "";
var docref = db.collection("landlord").doc(userid).collection("chatroom");
console.log(userid);

//set user profile img
db.collection("landlord").doc(userid).get().then(function(doc) {
		
	if (doc.exists) {
		var username = document.getElementById("username");
		var units = doc.data().unit.toString();
		
		username.innerHTML = `<h6>${doc.data().name}(${units})</h6>`;
		if(doc.data().imageurl != null){
			var pathReference = storage.ref(doc.data().imageurl);
			
			pathReference.getDownloadURL().then(function(url) {

				var imgset = document.getElementById('profile-image');
				imgset.src = url;

			}).catch(function(error) {
				console.log(error);
			});
		}
		
	} else {
		// doc.data() will be undefined in this case
		
		console.log("No such document!");
	}
}).catch(function(error) {
	console.log("Error getting document:", error);
});

//send message
function sendmessage(){
	var msg = document.getElementById("message").value;
	//get firebase server timestamp
	var myTimestamp = firebase.firestore.Timestamp.fromDate(new Date());
	if(message != null || message != ""){
		docref.add({
			imageurl: "dryx.png",
			message: msg,
			user: "admin",
			time: myTimestamp
		});
	}

}
//listen to changes
docref.orderBy("time","desc").limit(5)
    .onSnapshot(function(querySnapshot) {
		var i = 0;
		chats = "";
		var querysize = querySnapshot.size;
		//loop through collection
        querySnapshot.forEach(function(doc) {
			i++;
            console.log(doc.data().message);
			
			var docdata =  doc.data();
			if(docdata.user == "user"){
				chats = `
				<div class="row no-gutters">
					<div class="col-md-3">
					<div class="chat-bubble chat-bubble-left">
						${docdata.message}
					</div>
					</div>
				</div>
				`+ chats;
			}else{
				chats = `
				<div class="row no-gutters">
					<div class="col-md-3 offset-md-9"">
					<div class="chat-bubble chat-bubble-right bg-primary text-white">
						${docdata.message}
					</div>
					</div>
				</div>
				`+ chats;
			}
        });
	//insert send message box
			// chats = chats + `
			// <div class="row">
			// 	<div class="col-md-12">
			// 		<div class="chat-box-tray">
			// 		<input id="message" type="text" placeholder="Type your message here...">
			// 		<i id="send-message" class="material-icons">send</i>
			// 		</div>
			// 	</div>
			// </div>
			// `;

			chat_list.innerHTML = chats;
			//add on click event on the icon
			var icon = document.getElementById("send-message");
			text_input = document.getElementById("message");

			//send message on clicking "send" button
			icon.addEventListener("click", sendmessage);


			//send message on tapping enter
			
			text_input.addEventListener("keyup", function(e) {
			// Number 13 is the "Enter" key on the keyboard
				if (e.keyCode === 13) {
					// Cancel the default action, if needed
					e.preventDefault();
					// Trigger the button element with a click
					icon.click(sendmessage);
					// e.currentTarget.value = "";
				}
			});
			
    });