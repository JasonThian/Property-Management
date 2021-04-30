var array = ["06-11-2021","02-06-2020","03-06-2020","15-06-2020"]


var now = new Date();
var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());

var facility_price = {};
var booking_list = {};
var booking_type = {};
var users = {};
var payment_cleared = {};
var user_ids = {};

var DEFAULT_LIMIT = 3;

//refs
var facilityRef = db.collection("config").doc("facilities").collection("facilities_list");

//promises
var facilities_list = facilityRef.orderBy("name", "asc").get();
var bookings = db.collection("booking").get();
var disable_dates = db.collection("disabled_dates").get();
var landlords = db.collection("landlord").get();
var payment = db.collection("payment").get();

Promise.all([facilities_list, bookings, disable_dates,landlords,payment]).then((values) => {
	
	
	var facility_field = document.getElementById('book_facility');
	
	var facility_list = values[0];
	var bookings_collec = values[1];
	var disable_dates_collec = values[2];
	var landlords_collec = values[3];
	var payment_collec = values[4];
	
	var first_facility = true;
	
	//create facilities array
	facility_list.forEach(async (doc) => {
		//init vars
		var name = doc.data().name;
		var booking_payment_type = doc.data().payment;
		var price = doc.data().price;
		
		//setup obj
		booking_list[name] = {};
		booking_type[name] = booking_payment_type;
		
		if(first_facility){
			facility_field.innerHTML += `<option value="${name}" selected class="facilities">${name}</option>`;
			first_facility = false;
		}else{
			facility_field.innerHTML += `<option value="${name}">${name}</option>`;
		}
		
		facility_price[name] = price;
		
	})
	
	//populate bookings
	bookings_collec.forEach((doc) => {
		var status = doc.data().status;
		if(status != "rejected"){
			var booked_date = new Date(doc.data().date);
			var facility_type = doc.data().facility;
			
			var bookings = booking_list[facility_type];
			
			//if date is in the future or today
			if(booked_date >= today){
				
				var booking_time = doc.data().time;
				
				var facility_bookings = bookings[booked_date];
				//console.log(facility_bookings);

				//create object with date as key and initialize time slots
				if(facility_bookings == null){
					bookings[booked_date] = {};
					bookings[booked_date]['08:00'] = 0;
					bookings[booked_date]['10:00'] = 0;
					bookings[booked_date]['12:00'] = 0;
					bookings[booked_date]['14:00'] = 0;
					bookings[booked_date]['16:00'] = 0;
					bookings[booked_date]['18:00'] = 0;
					bookings[booked_date]['20:00'] = 0;
					bookings[booked_date]['22:00'] = 0;
					
					bookings[booked_date]['restriction'] = {};
					bookings[booked_date]['restriction']['landlord'] = {};
					bookings[booked_date]['restriction']['user'] = {};
					
					bookings[booked_date]['restriction']['landlord'][3] = [];
					bookings[booked_date]['restriction']['user'][3] = [];
				}
				
				//increment time slot booking counter
				if(bookings[booked_date][booking_time] == null){
					bookings[booked_date][booking_time] = 1;
				}else{
					//append time to the booked date
					bookings[booked_date][booking_time] += 1;
				}
					
			}
		}
	});
	
	//populate disabled_dates field
	disable_dates_collec.forEach((doc) => {
		//console.log(doc.data());
		var restricted_date = new Date(doc.data().date);
		var restricted_time = doc.data().disabled_time;
		var limit = doc.data().limit;
		var facility_type = doc.data().facility;
		var limited_type = doc.data().users;
		
		var bookings = booking_list[facility_type];
		
		if(bookings[restricted_date] == null){
			bookings[restricted_date] = {};
			bookings[restricted_date]['08:00'] = 0;
			bookings[restricted_date]['10:00'] = 0;
			bookings[restricted_date]['12:00'] = 0;
			bookings[restricted_date]['14:00'] = 0;
			bookings[restricted_date]['16:00'] = 0;
			bookings[restricted_date]['18:00'] = 0;
			bookings[restricted_date]['20:00'] = 0;
			bookings[restricted_date]['22:00'] = 0;
			
			bookings[restricted_date]['restriction'] = {};
		}
		
		if(bookings[restricted_date]['restriction'] == null){
			bookings[restricted_date]['restriction'] = {};
		}
		
		if(bookings[restricted_date]['restriction']['landlord'] == null){
			bookings[restricted_date]['restriction']['landlord'] = {};
			bookings[restricted_date]['restriction']['user'] = {};
		}
		
		
		if(limited_type == "all"){
			if(bookings[restricted_date]['restriction']['landlord'][limit] == null){
				bookings[restricted_date]['restriction']['landlord'][limit] = [];
			}
			
			if(bookings[restricted_date]['restriction']['user'][limit] == null){
				bookings[restricted_date]['restriction']['user'][limit] = [];
			}
			
			bookings[restricted_date]['restriction']['landlord'][limit] = restricted_time.concat(bookings[restricted_date]['restriction']['landlord'][limit]);
			bookings[restricted_date]['restriction']['user'][limit] = restricted_time.concat(bookings[restricted_date]['restriction']['user'][limit]);
		}else{
			if(bookings[restricted_date]['restriction'][limited_type][limit] == null){
				bookings[restricted_date]['restriction'][limited_type][limit] = [];
			}
			bookings[restricted_date]['restriction'][limited_type][limit] = restricted_time.concat(bookings[restricted_date]['restriction'][limited_type][limit]);
		}
	});
	payment_cleared = {};
	landlords_collec.forEach((doc) => {
		
		var name = doc.data().name;
		var unit = doc.data().unit;
		var role = doc.data().role;
		
		var users_field = document.getElementById('book_user');
		if(role == 'tenant'){
			users[name] = 'user';
		}else{
			users[name] = role;
		}
		
		payment_cleared[doc.id] = true;
		user_ids[name] = doc.id;
		
		users_field.innerHTML += `<option class="users_list" id="${doc.id}" value="${name}">${name} (${unit})</option>`;
	})
	console.log(payment_cleared);
	//populate payment_clearance
	payment_collec.forEach((doc) => {
		
		var payment_status = doc.data().status;
		var user_id = doc.data().user_id;
		
		if(payment_status != 'Successful'){
			if(payment_cleared[user_id] != null){
				payment_cleared[user_id] = false;
			}
		}
		
		
	})
	var default_user = document.getElementById('book_user').value;
	var users_list =  document.getElementsByClassName('users_list');
	for(var index = 0; index < users_list.length; index++){
		var user = users_list[index];
		var id = user.id;
		
		if(!payment_cleared[id]){
			users_list[index].disabled = true;
			
			if(users_list[index].value == default_user){
				users_list[index+1].selected = true;
			}
		}
		
	}
	console.log(payment_cleared);
	
	
	var choose_facility_field =  document.getElementById('book_facility');
	var choose_date_field = document.getElementById('book_date');
	
	choose_facility_field.addEventListener('change',function(e){
		calendar_init();
		disableTimeSlots()
	});
	
	console.log(booking_list);
	calendar_init();
	disableTimeSlots();
	
	var book_button = document.getElementById('book_button');
	book_button.addEventListener('click', function(e){
		e.preventDefault();
		
		var user_id = auth.currentUser.uid;
		//var facility_chosen = document.getElementById('facility').value;
		var time_chosen = document.getElementById('book_time_slots').value;
		var date_chosen = document.getElementById('book_date').value;
		var facility_chosen = document.getElementById('book_facility').value;
		var user_chosen = document.getElementById('book_user').value;
		var user_id = user_ids[user_chosen];
		console.log(user_ids);
		console.log(user_chosen);
		//format date
		var dateObj = new Date(date_chosen);
		var month = dateObj.getMonth()+1;
		var day = String(dateObj.getDate()).padStart(2, '0');
		var year = dateObj.getFullYear();
		var date = day  + '-'+ month  + '-' + year;
		
		//if facility is free
		if(booking_type[facility_chosen] != "Charge" && facility_chosen != "" && time_chosen != "" && date_chosen != ""){
			db.collection("booking").add({
				date: date,
				duration: "2 hours",
				facility: facility_chosen,
				status: "pending",
				time: time_chosen,
				user_id: user_id
			}).then(()=>{
				alert('booking has been made successfully');
			})
		//if facility is pay to use
		}else if(booking_type[facility_chosen] == "Charge" && time_chosen != "" && date_chosen != ""){
			
			var today = new Date();
			var nxtmonth = today.getMonth+1;
			
			var due_date = new Date().setMonth(nxtmonth);
		
			db.collection('landlord').doc(user_id).get().then(function(doc){
				var user_data = doc.data();
				console.log(doc.data());
				user_data['amount'] = facility_price[facility_chosen];
				user_data['date'] = today;
				user_data['description'] = 'paid facility';
				user_data['due_date'] = due_date;
				user_data['user_id'] = user_id;
				user_data['status'] = 'unpaid';
				
				db.collection("billing").add(user_data).then(()=>{
					alert('booking has been made successfully \n Please request payment from customer now');
				})
			})
			
			
			
			
		}else{
			alert('Please fill in the tables');
		}
		
	})
	
});

function calendar_init(){
	
	//get today
	var now = new Date();
    var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
	
	//initialize var for checking disabled dates
	var disabledDates = [];
	var facility_chosen =  document.getElementById('book_facility').value;
	var user = document.getElementById('book_user').value;
	var user_type = users[user];
	
	console.log(facility_chosen);
	var booked_dates = booking_list[facility_chosen];
	
	//initialize var for time slots
	var time_slots = document.getElementsByClassName("time_slot");
	for(var t = 0; t<time_slots.length;t++){
		time_slots[0].disabled = false;
	}
	//disable dates
	
	for(var date in booked_dates){
		var disable = true;
		
		for(var timeslots in booked_dates[date]){
			var restricted = booked_dates[date]['restriction'][user_type];
			
			if(timeslots != "restriction"){
				for(var restricted_limit in restricted){
					var restricted_list = restricted[restricted_limit];
					var restriction = false;
					
					for(var index = 0; index < restricted_list.length; index++){
						//if exist in restricted time, compare with limit
						if(restricted_list[index] === timeslots){
							
							restriction = true;
							if(booked_dates[date][timeslots] < restricted_limit){
								disable = false;
							}
							
						}
					}
					
					// else, compare with default limit (3)
					if(!restriction && booked_dates[date][timeslots] < DEFAULT_LIMIT){
						
						disable = false;
					}
				}
			}
		}
		//disable still true, add into array
		if(disable){
			//format date
			var dateObj = new Date(date);
			var month = dateObj.getMonth()+1;
			var day = String(dateObj.getDate()).padStart(2, '0');
			var year = dateObj.getFullYear();
			var farmatted_date = day  + '-'+ month  + '-' + year;
			disabledDates.push(farmatted_date);
		}
	}
	
	$('#book_date').datepicker({
		beforeShowDay: function(date){
			var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
			return [ disabledDates.indexOf(string) == -1 ]
		},
		onSelect:function(date){
			calendar_init();
			disableTimeSlots()
		}
	});
	
}

function disableTimeSlots(){
	//disable time
	
	var time_slots = document.getElementsByClassName("time_slot");
	var indexes = {
		'08:00': time_slots[0],
		'10:00': time_slots[1],
		'12:00': time_slots[2],
		'14:00': time_slots[3],
		'16:00': time_slots[4],
		'18:00': time_slots[5],
		'20:00': time_slots[6],
		'22:00': time_slots[7]
	}
	var user = document.getElementById('book_user').value;
	var user_type = users[user];
	var facility_chosen =  document.getElementById('book_facility').value;
	var booked_dates = booking_list[facility_chosen];

	var date_chosen = document.getElementById('book_date').value;
	
	console.log(booked_dates);
	
	
	if(date_chosen.trim() != ""){
		var date = new Date(date_chosen);
		console.log(booked_dates[date]);
		console.log(user_type);
		if(booked_dates[date] != undefined){
			for(var timeslots in booked_dates[date]){
				var restricted = booked_dates[date]['restriction'][user_type];
				if(timeslots != "restriction"){
					for(var restricted_limit in restricted){
						var restricted_list = restricted[restricted_limit];
						var restriction = false;
						
						for(var index = 0; index < restricted_list.length; index++){
							//if exist in restricted time, compare with limit
							if(restricted_list[index] === timeslots){
								restriction = true;
								if(booked_dates[date][timeslots] >= restricted_limit){
									indexes[timeslots].disabled = true;
								}
								
							}
						}
						
						// else, compare with default limit (3)
						if(!restriction && booked_dates[date][timeslots] >= DEFAULT_LIMIT){
							console.log(indexes[timeslots]);
							indexes[timeslots].disabled = true;
						}
					}
					
				}
			}
		}
	}
}