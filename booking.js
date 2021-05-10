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
	},
	"pageLength": 6
});

function getMonth(months){
	var month;
	
	switch(months){
		case "January":
		case "1":
		case "01":
			month = "01";
			break;
		case "Febuary":
		case "2":
		case "02":
			month = "02";
			break;
		case "March":
		case "3":
		case "03":
			month = "03";
			break;
		case "April":
		case "4":
		case "04":
			month = "04";
			break;
		case "May":
		case "5":
		case "05":
			month = "05";
			break;
		case "June":
		case "6":
		case "06":
			month = "06";
			break;
		case "July":
		case "7":
		case "07":
			month = "07";
			break;
		case "August":
		case "8":
		case "08":
			month = "08";
			break;
		case "September":
		case "9":
		case "09":
			month = "09";
			break;
		case "October":
		case "10":
			month = "10";
			break;
		case "November":
		case "11":
			month = "11";
			break;
		case "December":
		case "12":
			month = "12";
			break;
	}
	return month;
}

db.collection("booking").get().then((querySnapshot) => {
  querySnapshot.forEach(async (doc) => {
    var user_id = doc.data().user_id;
    var facility = doc.data().facility;
    var date = doc.data().date;
    var duration = doc.data().duration;
	var time = doc.data().time;

	//format data
	var dateData = date.split("-");
	var day = dateData[0];
	var month = getMonth(dateData[1]);
	var year = dateData[2];
	var date = year  + '-' + month  + '-' + day;
	
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
		]).node().id = doc.id;
		t.order( [ 5, 'desc' ] ).draw();
	}
	
  });

}).then(() => {
	var listening = db.collection("booking").onSnapshot(async(snapshot)=>{
	
		await snapshot.docChanges().forEach(async(change)=>{
			var user_id = change.doc.data().user_id;
			var facility = change.doc.data().facility;
			var date = change.doc.data().date;
			var duration = change.doc.data().duration;
			var time = change.doc.data().time;
			console.log(date);
			//format data
			var dateData = date.split("-");
			var day = dateData[0];
			var month = getMonth(dateData[1]);
			var year = dateData[2];
			var date = year  + '-' + month  + '-' + day;
			
			let user_doc = await db.collection("landlord").doc(user_id).get();
			
			if(user_doc.exists){
				
				var query = null;
				
				try{
					query = [user_doc.data().name,user_doc.data().email,user_doc.data().unit,user_doc.data().contact,facility,date,time,duration];
				}catch(err){
					console.log(err);
				}
				
				try{
					t.row("#"+change.doc.id).data(query).draw();
				}catch(err){
					t.row.add(query).node().id = change.doc.id;
					t.order( [ 5, 'desc' ] ).draw();
				}
			}
		});
		
	},(error)=>{
		console.log(error);
	});

	window.onbeforeunload = function(){
		listening();
	}
});

