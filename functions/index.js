const functions = require('firebase-functions');
const admin = require("firebase-admin");

admin.initializeApp();

exports.addAdminRole = functions.https.onCall((data,context)=>{
	//get user and add custom claim
	return admin.auth().getUserByEmail(data.email).then(user=>{
		return admin.auth().setCustomUserClaims(user.uid,{
			admin: true
		})
	}).then(()=>{
		return {
			message: `Success! ${data.email} has been made a admin`
		}
	}).catch(err =>{
		return err;
	});
});

exports.addMasterRole = functions.https.onCall((data,context)=>{
	//get user and add custom claim
	return admin.auth().getUserByEmail(data.email).then(user=>{
		return admin.auth().setCustomUserClaims(user.uid,{
			master: true
		})
	}).then(()=>{
		return {
			message: `Success! ${data.email} has been made a master`
		}
	}).catch(err =>{
		return err;
	});
});

exports.createUser = functions.https.onCall((data,context)=>{
	return admin.auth().createUser({
		email: data.email,
		password: data.pass,
		disabled: false
	}).then(function(userRecord) {
		// See the UserRecord reference doc for the contents of userRecord.
		console.log('Successfully created new user:', userRecord.uid);
		return {
			message: `Success`,
			uid: `${userRecord.uid}`
		};
	}).catch(function(err) {
		console.log('Error creating new user:', err);
		return {
			message: err
		};
	});
});

exports.deleteUser = functions.https.onCall((data,context)=>{
	return admin.auth().deleteUser(data.uid)
	.then((userRecord) => {
		console.log('Successfully deleted user');
		return {
				message: `Success`
		};
	}).catch(function(error) {
		console.log('Error deleting user:', error);
		return {
			message: error
		};
	});
});

exports.checkclaims = functions.https.onCall((data,context)=>{
	return admin.auth().getUser(data.uid).
	.then(function() {
		console.log('Successfully deleted user');
		return {
				message: `Success`
		};
	}).catch(function(error) {
		console.log('Error deleting user:', error);
		return {
			message: error
		};
	});
});
