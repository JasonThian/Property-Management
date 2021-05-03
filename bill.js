// JavaScript Document
var t = $('#payment-log').DataTable({
  "pagingType": "simple_numbers",
  "info": false,
  "dom": '<"top"fp>',
  "language": {
      search: "_INPUT_",
      searchPlaceholder: "Search..."
  }
});
var issuesDoc = db.collection("billing");
function get_data(){
	db.collection("billing").get().then((querySnapshot) => {
	  querySnapshot.forEach((doc) => {
		var user_id = doc.data().user_id;
		var amount = parseFloat(doc.data().amount)/100;
		var issue_status = "Unpaid"; 
		var status = doc.data().status;
		var action_button = '<button type="button" onclick="solve(\''+doc.id+'\');">Mark as Paid</button>';
		if(doc.data().status == "Paid")
				action_button = '<button type="button" onclick="unsolve(\''+doc.id+'\');">Mark as Unpaid</button>';
		db.collection("landlord").doc(user_id).get().then(function (doc) {
		  t.row.add([
			doc.data().name,
			doc.data().email,
			doc.data().contact,
			doc.data().unit,
			"RM "+amount.toFixed(2),
			status,
			`<button id='${doc.id}'type="button" class='deleteuser'>Delete</button>`,
			action_button
		  ]).draw();
		
	}).then(()=>{
		var button_list = document.getElementsByClassName("deleteuser");
		for (var i=0; i< button_list.length; i++ ) {
			
			button_list[i].addEventListener("click", async function(){
				deleteUser(this.id)

			});
		}
	})
	  })
		
	});
}

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
	var p1 = db.collection("billing").doc(id).delete().then(function() {
		console.log("Document successfully deleted!");
	}).catch(function(error) {
		console.error("Error removing document: ", error);
	});
}

/* Mark Current Row as Solved */
function solve(id){
	issuesDoc.doc(id).update({ status: "Paid" }).then(() => {
		t.clear();
		get_data();
	});
}

/* Mark Current Row as Unsolved */
function unsolve(id){
	issuesDoc.doc(id).update({ status: "Unpaid" }).then(() => {
		t.clear();
		get_data();
	});
}
get_data();