$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
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