<?php

if(isset($_REQUEST['title'])){
	$title = $_REQUEST['title'];
	
	$url = "https://fcm.googleapis.com/fcm/send";

	$fields=array(
		"to"=> $_REQUEST['users'],
		"notification" => array(
			"body" => $_REQUEST['body'],
			"title" => $_REQUEST['title'],
			"click_action" => "FCM_PLUGIN_ACTIVITY"
		),
		"data"=>array(
			"body"=> $_REQUEST['body'],
			"title"=>$_REQUEST['title'],
			"type"=>$_REQUEST['type']
			
		)
	);
	
	$header=array(
		'Authorization: key=AAAAZA6ZULE:APA91bH8eD1hLLglnMxc68jmu2ynNyDvnVoNRCh5MfDwQB70WZZjzHOz3iCu8A69b4P7X_YbEu2LTGn4npcE1zyHaUMWW2rhdRoGmcuBMVbQdgXRDgf-8_h0grN8wKNS3Lx_IDzzaTZR',
		'Content-Type:application/json'
	);
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
	$result = curl_exec($ch);

	
	if (curl_errno($ch)) {
		// this would be your first hint that something went wrong
		
		$result = array(
			"errcode" => 1,
			"err" => curl_error($ch)
		);
		
		echo json_encode($result);
	} else {
		// check the HTTP status code of the request
		$resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($resultStatus == 200) {
			// everything went better than expected
			$result = array(
				"errcode" => 0,
				"status" => "success"
			);
			
			echo json_encode($result);
		} else {
			// the request did not complete as expected. common errors are 4xx
			// (not found, bad request, etc.) and 5xx (usually concerning
			// errors/exceptions in the remote script execution)
			
			
			$result = array(
				"errcode" => 1,
				"http err code" => $resultStatus
			);
			
			echo json_encode($result);

		}
	}
	curl_error($ch);
}

?>