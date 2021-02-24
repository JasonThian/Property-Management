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
  "sDom": '<"top"i>rt<"bottom"flp><"clear">'
});

db.collection("booking").get().then((querySnapshot) => {
  querySnapshot.forEach((doc) => {
    var user_id = doc.data().user_id;
    var facility = doc.data().facility;
    var date = doc.data().date;
    var duration = doc.data().duration;
    db.collection("landlord").doc(user_id).get().then(function (doc) {
      t.row.add([
        doc.data().name,
        doc.data().email,
        doc.data().unit,
        doc.data().contact,
        facility,
        date,
        duration
      ]).draw();
    });
  });

});
