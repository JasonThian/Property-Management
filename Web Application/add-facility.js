// JavaScript Document
var url = "";
var blob = "";
var tokens = [];

document.getElementById("img").addEventListener("change",function(){
	console.log("changed img");
	if (this.files && this.files[0]) {
		var reader = new FileReader();
		
		url = this.files[0]['name'];
		blob = this.files[0];
		console.log(url);
		
		console.log(this.files[0]['name']);
		reader.onload = function(e) {
			
			var element = "<img class='col-md-6 form-control' src='" +e.target.result +"' width='500' height='200'></img>";
			$('#image_preview').html(element);
		}
		
//		reader.readAsDataURL(this.files[0]); // convert to base64 string
	}else{
		url = "";
	}
});

document.getElementById('facility_form').addEventListener("submit", function(e){
	e.preventDefault();    //stop form from submitting
	
	var title = document.getElementById('Fname').value;

	
	//validate user input
	if(title!= ""){
		// sign up the user & add firestore data
		//by default icno will be password
	
		createfacility(title,url);
	}else{
		alert("input incorrect");
	}
	
});



async function createfacility(FTitle,FimageUrl){
	
	await db.collection("config").doc('facilities').collection('facilities_list').add({

    name: FTitle,
	img: FimageUrl,
		
	}).then(async function(docRef) {
		console.log("Document written with ID: ", docRef.id);
		console.log(blob);
		var facilityref = storage.ref().child("facilities/"+url);
		
		facilityref.put(blob).then(function(snapshot) {
			console.log('Uploaded a blob or file!');
			
			
			snapshot.ref.getDownloadURL().then(function(downloadURL) {
				console.log("File available at", downloadURL);
				var F_form = document.getElementById("facility_form");
				
				var input = document.createElement("input");
				input.type = "hidden";
				input.name = "imageurl";
				input.value = downloadURL;
				F_form.appendChild(input);
				
				F_form.submit();
			});
			
		});
		
	}).catch(function(error) {
		console.error("Error adding document: ", error);
	});

}