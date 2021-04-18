// JavaScript Document
/*var booking_log = document.getElementById("list");
var list = "";
db.collection("booking").get().then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
		console.log(doc.data().facility);
		var user =`<tr><td>${doc.data().contact}</td>
				<td>${doc.data().contact}</td>
				<td>${doc.data().contact}</td>
				<td>${doc.data().contact}</td>
				<td>${doc.data().facility}</td>
				<td>${doc.data().date}</td>
				<td>${doc.data().duration}</td>
				<td><button>Approve</button></td>
				<td><button>Reject</button></td>
				
		</tr>`
		
		list = list.concat(user);
		
    });
	
	booking_log.innerHTML = list;
});*/
var t = $('#bookings').DataTable({
	"pagingType": "simple_numbers",
	"info": false,
	"dom": '<"top"fp>',
	"language": {
		search: "_INPUT_",
		searchPlaceholder: "Search..."
	}
});

 const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];

db.collection("booking").get().then((querySnapshot) => {
  querySnapshot.forEach(async (doc) => {
    var user_id = doc.data().user_id;
    var facility = doc.data().facility;
    var date = doc.data().date;
    var duration = doc.data().duration;
	var time = doc.data().time;
	
	//format data
	var dateObj = new Date(date);
	var month = monthNames[dateObj.getMonth()];
	var day = String(dateObj.getDate()).padStart(2, '0');
	var year = dateObj.getFullYear();
	var date = day  + '-'+ month  + '-' + year;
	
    let user_doc = await db.collection("landlord").doc(user_id).get();
	
	if(user_doc.exists){
		console.log(user_doc.data().name);
		
		t.row.add([
			user_doc.data().name,
			user_doc.data().email,
			user_doc.data().unit,
			user_doc.data().contact,
			facility,
			date,
			time,
			duration
		  ]).draw();
	}
	
  });

});
