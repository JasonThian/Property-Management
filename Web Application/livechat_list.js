// JavaScript Document

console.log("initializing livechat script");
chat();

var resident_list = document.getElementById("livechat-resident");
var rid_list = [];
var user_element = "";


async function chat(){
	var i = 0;
	var url_list = [];
	const p1 = db.collection("landlord").orderBy("dateupdated","desc").get().then(async (querySnapshot) => {
    querySnapshot.forEach(async (doc) => {
		
		var date = doc.data().dateupdated.toDate();
		var hour = date.getUTCHours();
		var minute = date.getMinutes();
		var units = doc.data().unit.toString();

		var user =`<div class="friend-drawer" id="${doc.id}" >
				  <img id="${doc.data().imageurl}" class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
				  <div class="text">
					<h6>${doc.data().name}(${units})</h6>		
					<p class="text-muted">${doc.data().rmsg}</p>
				  </div>
				  <span class="time text-muted small">${hour +":" + minute}</span>
				</div>
				<hr>`;
		
		
		resident_list.innerHTML += user;

		});
		//console.log(resident_list.innerHTML);
	});
	
	
	p1.then(async () => {
		var profile = document.getElementsByClassName('profile-image');
		for (var i = 0; i < profile.length; i++) {
			if(profile[i].id !=""){
				var pathReference = storage.ref(profile[i].id);
				let url = await pathReference.getDownloadURL();
				profile[i].src = url
			}
		}
		
		var landlords = document.getElementsByClassName('friend-drawer');
		console.log(landlords.length);
		for (var i = 0; i < landlords.length; i++) {
			
			console.log(landlords[i]);
			landlords[i].addEventListener('click', function(e){
				console.log(this.id+" clicked");
				window.open("chatbox.php?"+this.id);
			});
		}
	})
}