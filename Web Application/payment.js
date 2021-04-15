// JavaScript Document
var t = $('#payment-log').DataTable({
  "pagingType": "simple_numbers",
  "info": false,
  "dom": '<"top"fp>',
  "language": {search : "", searchPlaceholder: "Search..."}
});

db.collection("billing").get().then((querySnapshot) => {
  querySnapshot.forEach((doc) => {
    var user_id = doc.data().user_id;
    var amount = parseFloat(doc.data().amount)/100;
	var status = doc.data().status;
    db.collection("landlord").doc(user_id).get().then(function (doc) {
      t.row.add([
        doc.data().name,
		    doc.data().email,
        doc.data().contact,
        doc.data().unit,
        "RM "+amount.toFixed(2),
        status
      ]).draw();
		
    });
  });

});

