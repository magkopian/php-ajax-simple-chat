/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

var chat = {}

chat.get_messages = function () {
	$.ajax({
		url: 'simple_chat/chat.php',
		type: 'post',
		dataType: 'json',
		data: {method: 'get_messages', timestamp: chat.lastmsg_timestamp},
		success: function (data) {
			if (data.status_code != 0) { //if there was an error
				$('#errors_box .error').html(data.status_msg); //set the errors_box
			}
			else {
				$('#messages').prepend(data.msg); //else print the messages
				chat.lastmsg_timestamp = data.timestamp; //update the last message timestamp, so the next time we will ask only for the new messages
			}
		}
	});
}

$('#msg').keypress(function(event) {
    //check if user have press enter without shift 
    if (event.keyCode == 13 && event.shiftKey == false) {
		chat.msg_contents = $('#msg').val(); //get the value of the textarea

        $.ajax({ //push the message using ajax to the server
			url: 'simple_chat/chat.php',
			type: 'post',
			dataType: 'json',
			data: {method: 'push_message', msg: chat.msg_contents, timestamp: chat.lastmsg_timestamp},
			success: function (data) {
				if (data.status_code != 0) { //if there was an error
					$('#errors_box .error').html(data.status_msg); //set the errors_box
				}
				else {
					chat.get_messages(); //else, after the push immediately refresh the messages
					$('#errors_box .error').html(''); //clear last error message
				}
			}
		});
		
		
		$('#msg').val(''); //clear the form
		return false; //and don't allow the new line to be printed
	}
});

//this is for the embedded chat version only
var chat_state = 0;
$('#toggle_chat').click(function () {
	$('#chat').slideToggle(function () {
		if (chat_state == 1) {
			$('#toggle_chat p').html('Click to Hide');
			chat_state = 0;
		}
		else {
			$('#toggle_chat p').html('Click to Unhide');
			chat_state = 1;
		}
	});
});

chat.interval = setInterval(chat.get_messages, 5000); //the chat will be updated every 5 seconds
chat.lastmsg_timestamp = '-1'; //if the page is reloaded fetch all the messages at once, to do that we set timestamp to -1
chat.get_messages(); //when page is loaded get the messages immediately