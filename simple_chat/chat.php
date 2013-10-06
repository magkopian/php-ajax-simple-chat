<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();
define('INCLUDED',true);
require 'includes/chat_func.php';
require 'includes/markup_func.php';

if (!user_logged_in()) {
	header('Location: simple_chat/login_form.php'); //if you want to use your own login system, just replace this line with a redirect to your login page
	//and then inside your login script after you login the user, set a $_SESSION['uid'] variable with the id of the user
	die();
}

if (isset($_POST['method']) && !empty($_POST['method']) && isset($_POST['timestamp']) && !empty($_POST['timestamp'])) { //check if the method and timestamp are provided

	if ($_POST['method'] == 'get_messages') { //and get messages
	
		$timestamp = false;
		if (isset($_POST['timestamp']) && !empty($_POST['timestamp']) && $_POST['timestamp'] != -1) {
			$timestamp = validate_timestamp ($_POST['timestamp']);
		}
	
		if (($messages = get_messages($timestamp)) === false) {
		
			$response =  array(
				'status_code' => 1,
				'status_msg' => 'The messages cannot be loaded cause of an error.', //database error
			);
			
			header('Content-type: application/json');
			echo json_encode($response); //send the server responce as a json object
			die(); //messages has been loaded  successfully
			
		}
		else {
		
			$response =  array(
				'msg' => $messages['messages_content'],
				'status_code' => 0,
				'status_msg' => 'SUCCESS',
				'timestamp' => $messages['lastmsg_timestamp']
			);
			
			header('Content-type: application/json');
			echo json_encode($response); //send the server responce as a json object
			die(); //messages has been loaded  successfully
			
		}
	}
	else if ($_POST['method'] == 'push_message') { //or push a message to the database
		if (isset($_POST['msg']) && !empty($_POST['msg'])) {
			$_POST['msg'] = trim($_POST['msg']);
		
			if (validate_len($_POST['msg'], 255) === false) { //if the user submited more than 255 characters
				$response =  array(
					'status_code' => 3,
					'status_msg' => 'The message must be max 255 characters long.'
				);
				
				header('Content-type: application/json');
				echo json_encode($response); //send the server responce as a json object
				die(); //messages has been loaded  successfully
			}
			else if (push_message($_POST['msg']) === false) {
				$response =  array(
					'status_code' => 2,
					'status_msg' => 'The message cannot be submitted cause of an error.' //database error
				);
				
				header('Content-type: application/json');
				echo json_encode($response); //send the server responce as a json object
				die(); //messages has been loaded  successfully
			}
			else {
				$response =  array(
					'status_code' => 0,
					'status_msg' => 'SUCCESS'
				);
				
				header('Content-type: application/json');
				echo json_encode($response); //send the server responce as a json object
				die(); //the messages submitted successfully
			}
		}
	}
}

//if none of the above statements have been executed
header('HTTP/1.1 403 Forbidden'); //then the POST variables are not valid so throw a 403 error
do_html_403();
die(); 
?>