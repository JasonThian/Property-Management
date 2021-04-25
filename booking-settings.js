$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	
	var submit_btn = document.getElementById("complete-button");

	submit_btn.addEventListener("click",async function(e){
		e.preventDefault();
		
		var limit = document.getElementById("limit").value;
		var user_type = document.getElementById("user_type").value;
		var facility = document.getElementById("facility").value;
		
		var timeslots = document.getElementsByClassName("timeslots");
		var timeslot_checked = [];
		
		for(var i = 0; i<timeslots.length; i++){
			if(timeslots[i].checked == true){
				timeslot_checked.push(timeslots[i].value);
			}
		}
		
		
		var start_date = start.format('MM-DD-YYYY');
		var end_date = end.format('MM-DD-YYYY');
		
		
		var now = new Date();
		var daysOfYear = [];
		var batch = db.batch();
		var disabled_dateRef = db.collection("disabled_dates");
		
		
		for (var d = new Date(start_date); d <= new Date(end_date); d.setDate(d.getDate() + 1)) {
			
			var month = d.getMonth();
			var day = String(d.getDate()).padStart(2, '0');
			var year = d.getFullYear();
			var date =  month + '-'+ day  + '-' + year;
			console.log("preparing docs");
			doc = {
				date: date,
				disabled_time: timeslot_checked,
				facility:"AV Room",
				limit: limit,
				users: user_type
			}
				
			await disabled_dateRef.add(doc);
			
			console.log("doc added");
		}
	})
	
  });
});

var selectall = document.getElementById("SelectAll");

selectall.addEventListener("click",function(e){
	e.preventDefault();
	
	var timeslots = document.getElementsByClassName("timeslots");
	
	for(var i = 0; i<timeslots.length; i++){
		timeslots[i].checked = true;
	}
});

