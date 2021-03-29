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
const cloud = firebase.functions();
const storage = firebase.storage();

function credit_payment_function(){
	var stripe = Stripe("pk_test_51HmpphAKsIRleTRbL8qxNUc97rkqnpYJRMpJ8JBry543rJ7PEXsv9vkr0JlqnjIK442Hb6c5IY7lcw7dall9vHs600xi3UqAyZ");
	
	var jsonString = {
	  data: {
		  currency: "myr",
		  amount: 1000
	  }
	};
	
	fetch("https://us-central1-propertymanagement-88d03.cloudfunctions.net/Credit", {
	  method: "POST",
	  headers: {
		"Content-Type": "application/json"
	  },
	  body: JSON.stringify(jsonString)
	})
	  .then((result) => {
		return result.json();
	  })
	  .then(function(data) {
		var elements = stripe.elements();

		var style = {
		  base: {
			color: "#32325d",
			fontFamily: 'Arial, sans-serif',
			fontSmoothing: "antialiased",
			fontSize: "16px",
			"::placeholder": {
			  color: "#32325d"
			}
		  },
		  invalid: {
			fontFamily: 'Arial, sans-serif',
			color: "#fa755a",
			iconColor: "#fa755a"
		  }
		};

		var card = elements.create("card", { style: style });
		card.mount("#card-element");

		card.on("change", function (event) {
		  document.querySelector("button").disabled = event.empty;
		  document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
		});

		var form = document.getElementById("payment-form");
		form.addEventListener("submit", function(event) {
		  event.preventDefault();
		  payWithCard(stripe, card, data.data);
		});
	  });

	var payWithCard = function(stripe, card, clientSecret) {
	  loading(true);
	  
	  stripe
		.confirmCardPayment(clientSecret, {
		  payment_method: {
			card: card
		  }
		})
		.then(function(result) {
		  if (result.error) {
			showError(result.error.message);
		  } else {
			  alert("Complete");
			orderComplete(result.paymentIntent.id);
		  }
		});
	};

	var orderComplete = function(paymentIntentId) {
	  loading(false);
	  document
		.querySelector(".result-message a")
		.setAttribute(
		  "href",
		  "https://dashboard.stripe.com/test/payments/" + paymentIntentId
		);
	  document.querySelector(".result-message").classList.remove("hidden");
	  document.querySelector("button").disabled = true;
	};

	var showError = function(errorMsgText) {
	  loading(false);
	  var errorMsg = document.querySelector("#card-error");
	  errorMsg.textContent = errorMsgText;
	  setTimeout(function() {
		errorMsg.textContent = "";
	  }, 4000);
	};

	var loading = function(isLoading) {
	  if (isLoading) {
		document.querySelector("button").disabled = true;
		document.querySelector("#spinner").classList.remove("hidden");
		document.querySelector("#button-text").classList.add("hidden");
	  } else {
		document.querySelector("button").disabled = false;
		document.querySelector("#spinner").classList.add("hidden");
		document.querySelector("#button-text").classList.remove("hidden");
	  }
	};
	
	$("#credit-payment-cancel-button").click(()=>{
		window.location.href = "/home/";
	});
}

document.querySelector("button").disabled = true;
credit_payment_function();