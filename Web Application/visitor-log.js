// JavaScript Document
var t = $('#visitor-log').DataTable({
  "pagingType": "simple_numbers",
  info: false,
  "sDom": '<"top"i>rt<"bottom"flp><"clear">'
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
        checkin_time,
		checkout_time,
		doc.data().status,
		expire_time
      ]).draw();
  });
});