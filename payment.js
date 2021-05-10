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

db.collection("billing").get().then((querySnapshot) => {
  querySnapshot.forEach((doc) => {
	var doc_id = doc.id;
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
      ]).node().id = doc_id;
	  t.draw();
		
    });
  });

}).then(() => {
	var listening = db.collection("billing").onSnapshot(async(snapshot)=>{
		
		await snapshot.docChanges().forEach(async(change)=>{
			var user_id = change.doc.data().user_id;
			var amount = parseFloat(change.doc.data().amount)/100;
			var status = change.doc.data().status;
			db.collection("landlord").doc(user_id).get().then(function (doc) {
				
				var query = null;
				
				try{
					query = [doc.data().name,doc.data().email,doc.data().contact,doc.data().unit,"RM "+amount.toFixed(2),status];
				}catch(err){
					console.log(err);
				}
				
				try{
					t.row("#"+change.doc.id).data(query).draw();
				}catch(err){
					t.row.add(query).node().id = change.doc.id;
					t.draw();
				}
			});
		});
		
	},(error)=>{
		console.log(error);
	});

	window.onbeforeunload = function(){
		listening();
	}
}).catch((err) => {
	console.log(err);
});