var firebaseConfig = {
  apiKey: "AIzaSyA57cBRSvRm3U-9mi5aHRts3Z15LslfkPo",
  authDomain: "propertymanagement-88d03.firebaseapp.com",
  databaseURL: "https://propertymanagement-88d03.firebaseio.com",
  projectId: "propertymanagement-88d03",
  storageBucket: "propertymanagement-88d03.appspot.com",
  messagingSenderId: "429741658289",
  appId: "1:429741658289:web:4d2f4f490fac045e8e5290",
  measurementId: "G-6PBDHNV9RS"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

//make auth and firestore references
const auth = firebase.auth();
const db = firebase.firestore();
const functions = firebase.functions();
const storage = firebase.storage();

function online_payment_function(){
	var stripe = Stripe('pk_test_51HmpphAKsIRleTRbL8qxNUc97rkqnpYJRMpJ8JBry543rJ7PEXsv9vkr0JlqnjIK442Hb6c5IY7lcw7dall9vHs600xi3UqAyZ');
	var jsonString = { "amount": 8000 };
	var clientSecret = "";
	console.log(JSON.stringify(jsonString));
	var form = document.getElementById('payment-form');
	var online = firebase.functions().httpsCallable('Online');
	var elements = stripe.elements();
	var fpxButton = document.getElementById('fpx-button');
	var style = {
		base: {
			padding: '10px 12px',
			color: '#32325d',
			fontSize: '16px',
		},
	};

	var fpxBank = elements.create(
		'fpxBank',
		{
			style: style,
			accountHolderType: 'individual',
		}
	);
	
	fpxBank.mount('#fpx-bank-element');
	
	try{
		let stripe_data = sessionStorage.getItem('stripe_client_secret');
		
		stripe.retrievePaymentIntent(stripe_data).then(function(result) {
			// Handle result.error or result.paymentIntent
			console.log("Result",result);
			console.log("Error",result.error);
			console.log("PaymentIntent",result.paymentIntent);
		});
	}catch(err){
		console.log(err);
		online(JSON.stringify(jsonString)).then((result) => {
			// Read result of the Cloud Function.
			clientSecret = result.data;
			fpxButton.disabled = false;
			fpxButton.setAttribute("data-secret",clientSecret);
			sessionStorage.setItem('stripe_client_secret', clientSecret);
		}).catch((error) => {
			// Getting the Error details.
			var code = error.code;
			var message = error.message;
			var details = error.details;
			// ...
		});
	}
	
	$("#online-payment-cancel-button").click(()=>{
		window.location.href = "/home/";
	});

	form.addEventListener('submit', function(event) {
	  event.preventDefault();
	  
	  stripe.confirmFpxPayment(clientSecret, {
		payment_method: {
		  fpx: fpxBank,
		},
		return_url: "/online-payment-callback/",
	  }).then((result) => {
		if (result.error) {
		  var errorElement = document.getElementById('error-message');
		  errorElement.textContent = result.error.message;
		}
	  });
	});
}

document.querySelector("button").disabled = true;
online_payment_function();