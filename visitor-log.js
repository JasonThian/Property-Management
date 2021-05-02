// JavaScript Document
var t = $('#visitor-log').DataTable({
	"pagingType": "simple_numbers",
	"info": false,
	"dom": '<"top"fp>',
	"language": {
		search: "_INPUT_",
		searchPlaceholder: "Search..."
	}
});

db.collection("visitor").get().then((querySnapshot) => {
  querySnapshot.forEach((doc) => {
	  var checkin_time;
	  var checkout_time;
	  if(doc.data().checkin_time == null)
		  checkin_time = null;
	  else
	  	checkin_time = doc.data().checkin_time.toDate().toLocaleString();
	  if(doc.data().checkout_time == null)
		  checkout_time = null;
	  else
		  checkout_time= doc.data().checkout_time.toDate().toLocaleString();
      t.row.add([
        doc.data().username,
		doc.data().ic,
        doc.data().contact,
		doc.data().carplate,
        checkin_time,
		checkout_time,
		doc.data().status
      ]).node().id = doc.id;
	  t.draw();
  });
}).then(() => {
	var listening = db.collection("visitor").onSnapshot(async(snapshot)=>{
		
		await snapshot.docChanges().forEach(async(change)=>{
			var checkin_time;
			var checkout_time;
			
			if(change.doc.data().checkin_time == null)
				checkin_time = null;
			else
				checkin_time = change.doc.data().checkin_time.toDate().toLocaleString();
			if(change.doc.data().checkout_time == null)
				checkout_time = null;
			else
				checkout_time= change.doc.data().checkout_time.toDate().toLocaleString();
			
			var query = null;
			
			try{
				query = [change.doc.data().username,change.doc.data().ic,change.doc.data().contact,change.doc.data().carplate,checkin_time,checkout_time,change.doc.data().status];
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
		
	},(error)=>{
		console.log(error);
	});

	window.onbeforeunload = function(){
		listening();
	}
}).catch((err) => {
	console.log(err);
});

