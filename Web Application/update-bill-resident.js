// JavaScript Document


document.getElementById('generate_inv').addEventListener ('click',(e) => {
	e.preventDefault();
	
	var prices = document.getElementById('prices').getElementsByTagName('input');
	var descriptions = document.getElementById('descriptions').getElementsByTagName('input');
	var check = true;
	
	
	//check inputs
	console.log(prices[0].value);
	console.log(descriptions[0].value);
	for (i = 0; i < descriptions.length; i++) {
		if(prices[i].value.trim() == "" && descriptions[i].value.trim() == ""){
			//display preview
			check == false;
			
		}
	}
	
	
	if(check){
		preview_invoice(true);
	}else{
		alert("please fill out the form");
	}
		
});


function preview_invoice(show){
	var prices = document.getElementById('prices').getElementsByTagName('input');
	var descriptions = document.getElementById('descriptions').getElementsByTagName('input');
	
	var inv_box = document.getElementById('inv_box');
	var inv = document.getElementById('inv_items');
	
	var items = document.getElementsByClassName('item');
	var total_amount = document.getElementById('total_amount');
	var confirm_bill = document.getElementById('confirm_bill');
	
	var sidebar = document.getElementById('sidebar_opac');
	var form = document.getElementById('form_opac');
	inv.innerHTML = "";
	
	var total = 0;
	
	/*<div style="position:absolute;left:48.19px;top:334.52px" class="cls_009"><span class="cls_009">Test</span></div>
	<div style="position:absolute;left:242.46px;top:334.52px" class="cls_010"><span class="cls_010">1</span></div>
	<div style="position:absolute;left:303.67px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div>
	<div style="position:absolute;left:368.22px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div>
	<div style="position:absolute;left:441.66px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div>
	<div style="position:absolute;left:506.21px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div>*/
	
	if(show){
		//updateui
		inv_box.style.display = "block";
		sidebar.style.opacity = "0.5";
		form.style.opacity = "0.5";
		
		
		//count total amount
		for (i = 0; i < descriptions.length; i++) {
		  	total = total + parseFloat(prices[i].value.replace("RM ", ""));
			inv.innerHTML += '<div style="position:absolute;left:48.19px;top:334.52px" class="cls_009"><span class="cls_009">'+descriptions[i].value+'</span></div><div style="position:absolute;left:242.46px;top:334.52px" class="cls_010"><span class="cls_010">1</span></div><div style="position:absolute;left:303.67px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div><div style="position:absolute;left:368.22px;top:334.52px" class="cls_010"><span class="cls_010">'+prices[i].value+'</span></div><div style="position:absolute;left:441.66px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div><div style="position:absolute;left:506.21px;top:334.52px" class="cls_010"><span class="cls_010">$0.00</span></div>';
			
			confirm_bill.innerHTML += '<input type="hidden" id="ip'+i+'" name="ip'+i+'" value="'+prices[i].value+'">';
			confirm_bill.innerHTML += '<input type="hidden" id="item'+i+'" name="item'+i+'" value="'+descriptions[i].value+'">';
		}
		
		inv.innerHTML += '<div style="position:absolute;left:423.27px;top:406.80px" class="cls_009"><span class="cls_009">Total</span></div><div style="position:absolute;left:502.88px;top:406.80px" class="cls_009"><span class="cls_009">'+total.toFixed(2)+'</span></div><div style="position:absolute;left:45.35px;top:807.05px" class="cls_010"><span class="cls_010">Dryx Residence</span></div><div style="position:absolute;left:499.21px;top:807.05px" class="cls_010"><span class="cls_010">Page 1 of 1</span></div>';
		
		confirm_bill.innerHTML += '<input type="hidden" id="total_p" name="total_p" value="'+total+'"> <input type="submit" id="send"></input><button id="cancel">Cancel</button>';
		
		document.getElementById('cancel').addEventListener ('click',(e) => {
			console.log('click cancel');
			e.preventDefault();
			preview_invoice(false);
		});
		
		document.getElementById('send').addEventListener ('click',(e) => {
			console.log('click send');
			e.preventDefault();
			
			/* Save Into FireBase */
			var id = document.getElementById("user_id").value;
			var price = parseInt(parseFloat(document.getElementById("price").value)*100);
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
				var myForm = document.getElementById("confirm_bill");
				myForm.submit();
			  }).catch(function (error) {
				console.log("Error adding document: ", error);
			  });
			}
			/* End Save Into FireBase */
			
		});
		
	}else{
		document.getElementById('cancel').style.display = "none";
		document.getElementById('send').style.display = "none";
		inv_box.style.display = "none";
		sidebar.style.opacity = "1";
		form.style.opacity = "1";
	}
	
}