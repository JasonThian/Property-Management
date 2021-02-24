// JavaScript Document
auth.onAuthStateChanged(user => {
  if (user) {
	  	
	  	user.getIdTokenResult().then(idTokenResult => {
		user.master = idTokenResult.claims.master;
			if (user.master) {
				document.getElementById("create-admin").style.display = "block";
			}
    	});
  }
});

function addTenants(){
	var residentType = document.getElementById('resident-type');
	var haveTenant = document.getElementById('have-tenant');
	console.log(residentType.value);
	if(residentType.value == "landlord"){
		haveTenant.style.display = "none";
	}
	else if(residentType.value == "tenant"){
		haveTenant.style.display = "block";
	}
}
document.getElementById('add-resident-form').addEventListener("submit", function(e){
	e.preventDefault();    //stop form from submitting
	
	var name = document.getElementById('name').value;
	var idno = document.getElementById('idno').value;
	var contact = document.getElementById('contact').value;
	var email = document.getElementById('email').value;
	var unitno = document.getElementById('unitno').value;
	var restype = document.getElementById('resident-type').value;
	
	var carplates_element = document.getElementById('carplates').getElementsByTagName("input");
	var carplates = new Array();
	for(i=0;i<carplates_element.length;i++)
	{
		carplates[i]=carplates_element[i].value;
	}
	
	//disable fields
	updatefields(true);
	
	// sign up the user & add firestore data
	//by default icno will be password
	if(name == "" ||idno == "" ||contact == "" ||email == "" ||unitno == "" ||restype == "" ){
		
	}else{
		if(restype == "tenant"){
			var id = document.getElementById('id').value;
			
			console.log(ref);
			createresident(name,idno,contact,email,unitno,restype,carplates,id);
		}else{
			createresident(name,idno,contact,email,unitno,restype,carplates,"");
		}
		//
	}
	
});

async function createresident(username,idno,contacts,emails,units,role,carplates,landlordref){
	
	const createUser = functions.httpsCallable('createUser');
	createUser({ email: emails,pass:idno }).then(result => {
		console.log(result);
		if(result.data.message == "Success"){
			db.collection('landlord').doc(result.data.uid).set({
			
		  	name: username,
			ic: idno,
			contact: contacts,
			email: emails,
			unit: firebase.firestore.FieldValue.arrayUnion(units), 
			role: role,
			carplate: carplates,
			landlords: landlordref,
			dateupdated: new Date(),
			rmsg: ""
			
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
	var idno = document.getElementById('idno').value;
	var contact = document.getElementById('contact').value;
	var email = document.getElementById('email').value;
	var unitno = document.getElementById('unitno').value;
	var restype = document.getElementById('resident-type').value;

	//disable fields
	name.disabled = status;
	idno.disabled = status;
	contact.disabled = status;
	email.disabled = status;
	unitno.disabled = status;
	restype.disabled = status;
}