// JavaScript Document

console.log("initializing livechat script");
chat();

var resident_list = document.getElementById("livechat-resident");
var rid_list = [];
var user_element = "";

//db.collection("landlord").orderBy("Date Updated","desc").get().then((querySnapshot) => {
//    querySnapshot.forEach((doc) => {
//		console.log("User ID: "+doc.id);
//		rid_list.push(doc.id);
//    });
//});

//onclick
//var elements = document.getElementsByClassName ("friend-drawer");
//for (var i=0; i < elements.length; i++) {
//     elements[i].onclick = function() {
//			
//     }
//}


function chat(){
	var i = 0;
	var url_list = [];
	const p1 = db.collection("landlord").orderBy("dateupdated","desc").get().then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
		
		
		
		var date = doc.data().dateupdated.toDate();
		var hour = date.getUTCHours();
		var minute = date.getMinutes();
		
		var user =`<div onClick="window.location='chatbox.html';" class="friend-drawer" id="user${i}" >
				  <img id="user0img" class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
				  <div class="text">
					<h6>${doc.data().name}</h6>		
					<p class="text-muted">${doc.data().rmsg}</p>
				  </div>
				  <span class="time text-muted small">${hour +":" + minute}</span>
				</div>
				<hr>`
		
		url_list.push(doc.data().imageurl);
		user_element = user_element.concat(user);
		resident_list.innerHTML = user_element;


		i++;

		
		});
		
		return url_list;
	});
	
	
	p1.then((url_list) => {
	
		var img = document.getElementsByClassName('profile-image');
		var urls = [];
		var d = 0;
		for(i = 0; i < url_list.length; i++){
			const storage = firebase.storage();
			var pathReference = storage.ref(url_list[i]);
			
			pathReference.getDownloadURL().then(function(url) {
				
				var imgset = document.getElementsByClassName('profile-image');
				imgset[d].src = url;
				d++;
				
			}).catch(function(error) {
				console.log(error);
			});
		}
	})
}