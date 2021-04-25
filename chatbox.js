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
		
		db.collection("landlord").doc(userid).update({
			rmsg: msg
		})
	}

}

var text_input = document.getElementById("message");
var send_icon = document.getElementById("send-message");
text_input.addEventListener("keyup", function(e) {
// Number 13 is the "Enter" key on the keyboard
	if (e.keyCode === 13) {
		// Cancel the default action, if needed
		e.preventDefault();
		// Trigger the button element with a click
		send_icon.click();
		e.currentTarget.value = "";
	}
});

//listen to changes
docref.orderBy("time","desc").limit(10)
    .onSnapshot(function(querySnapshot) {
		chats = "";

		//loop through collection
        querySnapshot.forEach(function(doc) {

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

			chat_list.innerHTML = chats;
			//add on click event on the icon
			chat_list.scrollTop = chat_list.scrollHeight;
			
			
			var icon = document.getElementById("send-message");
			

			//send message on clicking "send" button
			icon.addEventListener("click", sendmessage);

			//send message on tapping enter
			
			
    });