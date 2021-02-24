// listen for auth status changes
auth.onAuthStateChanged(user => {
  if (user) {
	  console.log(user, " logged in.");
	  //window.location.replace("residents.html");
  }else{
	  console.log("user not logged in.");
  }
});

//login
document.getElementById ('login-form').addEventListener ('submit',(e) => {
	const email = document.getElementById('login').value;
    const password = document.getElementById('password').value;
	var err = document.getElementById('error');
	
	e.preventDefault();
	
    auth.signInWithEmailAndPassword(email, password).then((cred) => {
		console.log("user logged in");
		//location.replace("residents.html");
		err.innerHTML = '';
  	}).catch(err => {
		console.log(err.message);
		err.innerHTML = 'password incorrect or user does not exist';
  	});
	
});


//utilities
//function to show error
function errormsg(err){
	//const error = document.getElementById("error");
	error.innerHTML = err;
}