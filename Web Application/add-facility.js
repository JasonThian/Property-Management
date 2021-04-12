// JavaScript Document

document.getElementById('add-facility-form').addEventListener("submit", function(e){
	e.preventDefault();    //stop form from submitting
	
	var name = document.getElementById('Fname').value;

	
	//validate user input
	if(name != "" ){
		// sign up the user & add firestore data
		//by default icno will be password
		updatefields(true);
		createresident(name,img);
	}else{
		alert("input incorrect");
	}
});

async function createfacility(username){
	
	const createUser = functions.httpsCallable('createUser');
	createUser({ name:username}).then(result => {
		console.log(result);
		if(result.data.message == "Success"){
			db.collection('Facility').doc(result.data.uid).set({
		  	name: username,
		
			
			}).then(()=>{
				console.log("user created successfully");
				//re-enable fields
				updatefields(false);
				alert("user created successfully");
			}).catch(err => {
				console.error("Error adding document: ", err);
				alert(err);
				//re-enable fields
				updatefields(false);
			});
		}else{
			console.log(result);
			alert("User creation failed");
			updatefields(false);
		}
		
	});

}

function updatefields(status){
	var name = document.getElementById('name').value;
	

	//disable fields
	name.disabled = status;
	
}