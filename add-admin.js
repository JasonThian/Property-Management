// JavaScript Document
document.getElementById('add-resident-form').addEventListener("submit", function(e){
	e.preventDefault();    //stop form from submitting
	
	var password = document.getElementById('password').value;
	var cpassword = document.getElementById('cpassword').value;
	var email = document.getElementById('email').value;

	
	//validate user input
	if(password == cpassword && password != "" && cpassword != "" && email != "" ){
		// sign up the user & add firestore data
		//by default icno will be password
		updatefields(true);
		createadmin(email,password);
	}else{
		alert("input incorrect");
	}
	
});

async function createadmin(emails,password){
	
//	await auth.createUserWithEmailAndPassword(emails, password).then(cred => {
		const createUser = functions.httpsCallable('createUser');
		createUser({ email: emails,pass:password }).then(result => {
//			console.log(result);
//			console.log(result.data.message);
			if(result.data.message == "Success"){
				console.log("user has been created");
				const addAdminRole = functions.httpsCallable('addAdminRole');
				addAdminRole({ email: emails }).then(result => {
					console.log(result);
					alert("Admin creation successfull");
					updatefields(false);
				});
			}else{
				console.log(result);
				alert(result.data.message);
				updatefields(false);
			}
		});

}

function updatefields(status){
	var password = document.getElementById('password').value;
	var cpassword = document.getElementById('cpassword').value;
	var email = document.getElementById('email').value;


	//disable fields
	password.disabled = status;
	cpassword.disabled = status;
	email.disabled = status;
}