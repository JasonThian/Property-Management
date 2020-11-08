// JavaScript Document
var id = document.getElementById("user_id").value;
var price = parseFloat(document.getElementById("price").value)*100;
var desc = document.getElementById("payment-desc").value;
var username = document.getElementById("name").value;
var contact = document.getElementById("contact").value;
var unit_no = document.getElementById("unit_no").value;
var email = document.getElementById("email").value;
var ndate = new Date();
var due = new Date();
due.setMonth(due.getMonth() + 1);
if (user_id == null || price == null || desc == null || username == null || contact == null || unit_no == null || email == null) {
  event.preventDefault();
  alert("price and description cannot be empty");
} else {
  console.log("hello");
	var unit;
	if(unit_no.includes(","))
		unit = unit_no.split(",");
	else
		unit = unit_no;
  db.collection("billing").add({
    user_id: id,
	name: username,
	contact: contact,
	unit: unit,
	email: email,
    amount: price,
    status: "unpaid",
    description: desc,
    date: ndate,
    due_date: due
  }).then(function (docRef) {
    console.log("Document written with ID: ", docRef.id);
  }).catch(function (error) {
    console.log("Error adding document: ", error);
  });
}
