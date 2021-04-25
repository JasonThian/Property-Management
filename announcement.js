var url = "";
var blob = "";
var tokens = [];

document.getElementById("image_url").addEventListener("change",function(){
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

$("#annc-form").submit(function(event){
	event.preventDefault();
	
	var title = document.getElementById("form_title").value;
	var msg = document.getElementById("form_msg").value;
	var date = new Date();
	console.log(title+" "+msg);
	if(title.trim()=="" || msg.trim() =="" || title== null||msg== null){
	   	
		event.preventDefault();
		alert("title and description cannot be empty");
	}else{
		firebasedb(title,msg,url,date);
	}
	
	
});
//insert to db function
async function firebasedb(ann_title,ann_description,ann_imageurl,ann_date){
	
	
	await db.collection("announcement").add({

    title: ann_title,
    description: ann_description,
	imageurl: ann_imageurl,
	date: ann_date
		
	}).then(async function(docRef) {
		console.log("Document written with ID: ", docRef.id);
		console.log(blob);
		var announceref = storage.ref().child("announcement/"+url);
		
		announceref.put(blob).then(function(snapshot) {
			console.log('Uploaded a blob or file!');
			
			
			snapshot.ref.getDownloadURL().then(function(downloadURL) {
				console.log("File available at", downloadURL);
				var annc_form = document.getElementById("annc-form");
				
				var input = document.createElement("input");
				input.type = "hidden";
				input.name = "imageurl";
				input.value = downloadURL;
				annc_form.appendChild(input);
				
				annc_form.submit();
			});
			
		});
		
	}).catch(function(error) {
		console.error("Error adding document: ", error);
	});
}
