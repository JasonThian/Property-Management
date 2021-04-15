// JavaScript Document
var t = $('#resident-list').DataTable({
  "pagingType": "simple_numbers",
  "info": false,
  "dom": '<"top"fp>',
  "language": {search : "", searchPlaceholder: "Search..."}
});	

db.collection("landlord").where("role","==","landlord").get().then((querySnapshot) => {
	var i = 0;
    querySnapshot.forEach((doc) => {
		t.row.add( [
            doc.data().name,
            doc.data().email,
            doc.data().contact,
            doc.data().ic,
            doc.data().unit,
			"<form style='position:relative;' id='row"+i+"' class='form_row' action='update-bill-resident.php' method='POST'><input type='hidden' name='name' value='"+doc.data().name+"'/><input type='hidden' name='user_id' value='"+doc.id+"'/><input type='hidden' name='email' value='"+doc.data().email+"'/><input type='hidden' name='contact' value='"+doc.data().contact+"'/><input type='hidden' name='ic' value='"+doc.data().ic+"'/><input type='hidden' name='unit' value='"+doc.data().unit+"'/><input type='submit' value='Select'/></form>"
        ] ).draw( );
		i++;
    });
});