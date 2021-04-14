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

var t = $('#resident-list').DataTable({
					"pagingType": "simple_numbers",
					info: false,
					"sDom": '<"top"i>rt<"bottom"flp><"clear">'
				});	
db.collection("landlord").get().then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
		
		if(doc.data().role == 'landlord')
			var button = `<form style="position:relative; " method="post" action="add-residents.php">
<input type="hidden" value="${doc.id}" name="id"></input>
<input type="hidden" value="${doc.data().name}" name="name"></input>
<input type="submit" value="Add tenant"></input>
<input style="margin-top:10px;" type="submit" value="Add household"></input>
</form>`
		else if(doc.data().role == 'tenant')
			var button = `<form style="position:relative;" method="post" action="add-residents.php">
				<input type="hidden" value="${doc.id}" name="id"></input>
				<input type="hidden" value="${doc.data().name}" name="name"></input>
				<input  type="submit" value="Add household"></input>
				</form>`
		else
			var button = '';
		console.log(button);
		t.row.add( [
            doc.data().name,
            doc.data().email,
            doc.data().contact,
            doc.data().ic,
            doc.data().unit,
			doc.data().role,
			`<button id='${doc.id}'type="button" class='deleteuser'>Delete</button>`,
			button,
			button
        ] ).draw( );
    });
	
}).then(()=>{
	var button_list = document.getElementsByClassName("deleteuser");
	for (var i=0; i< button_list.length; i++ ) {
		
	 	button_list[i].addEventListener("click", async function(){
			deleteUser(this.id)

		});
	}
	
});

async function deleteUser(ele_id){
	console.log(ele_id);
	const deleteUser = functions.httpsCallable('deleteUser');
	await deleteUser({ uid: ele_id }).then(result => {

		if(result.data.message == "Success"){
			console.log("user has been deleted");
			deleteRecords(ele_id)
		}else{
			console.log(result);
			alert(result);
		}
	});
}

async function deleteRecords(id){
	var p1 = db.collection("landlord").doc(id).delete().then(function() {
		console.log("Document successfully deleted!");
	}).catch(function(error) {
		console.error("Error removing document: ", error);
	});
	
	await p1.then(()=>{
		var storageRef = storage.ref();
		var imageRef = storageRef.child(id+'.png');

		// Delete the file
		imageRef.delete().then(function() {
		  console.log("image successfully deleted!");
		}).catch(function(error) {
		  console.error("Error removing document: ", error);
		});
	}).then(()=>{
		location.reload();
	});
}
