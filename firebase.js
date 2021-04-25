// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is  optional
    var firebaseConfig = {
      apiKey: "AIzaSyA57cBRSvRm3U-9mi5aHRts3Z15LslfkPo",
      authDomain: "propertymanagement-88d03.firebaseapp.com",
      databaseURL: "https://propertymanagement-  88d03.firebaseio.com",
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