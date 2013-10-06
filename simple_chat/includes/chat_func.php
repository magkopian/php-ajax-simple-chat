<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

if (!defined('INCLUDED')){
	define('INCLUDED',true);
	require 'markup_func.php';
	header('HTTP/1.1 403 Forbidden');
	do_html_403();
	die();
}

require 'includes/dbconnect.php';
require 'includes/validation_func.php';
require 'includes/core_func.php';

//fetches all messages from the database
function get_messages ($timestamp) {
	//connect to the database
	$con = db_connect();
	if ($con === false) {
		return false;
	}

	//query the database to get the messages
	if ($timestamp === false) {
		//get all the messages
		$query = 'SELECT `mid`, `uname`, `content`, `time` FROM `user` INNER JOIN `message` ON `message`.`uid` = `user`.`uid` ORDER BY `time` DESC';
	}
	else {
		//get all the messages that are newer than the timestamp
		$timestamp = mysqli_real_escape_string($con, $timestamp);
		$query = "SELECT `mid`, `uname`, `content`, `time` FROM `user` INNER JOIN `message` ON `message`.`uid` = `user`.`uid` WHERE `time` > '$timestamp' ORDER BY `time` DESC";
	}
	
	$res = mysqli_query($con, $query);
	
	if ($res === false) {
		mysqli_close($con); //close the database
		return false;
	}
	else if (($msg_num = mysqli_affected_rows($con)) === 0) { //if nothing is returned
		mysqli_close($con); //close the database
		
		if ($timestamp === false) {
			$timestamp = '-1'; //if the database is empty, return -1 as a timestamp to the client
			$lastmsg_timestamp = '-1';
		}
		else {
			$lastmsg_timestamp = $timestamp; //else if there are no new messages, return the last requested timestamp back
		}
		return array('messages_content' => '', 'lastmsg_timestamp' => $lastmsg_timestamp); //no messages to display, so return ''
	}
	mysqli_close($con); //close the database
	
	//if there are new messages available
	
	//format the messages
	$messages = '';
	
	for ($i = 0; $i < $msg_num; ++$i) {
		$msg = mysqli_fetch_assoc($res);
		
		$messages .= 
			'<div class="message" id="message_'.htmlentities($msg['mid'], ENT_QUOTES, 'UTF-8').'">
				<span class="time">('.$msg['time'].')</span> <a href="#">'.htmlentities($msg['uname'], ENT_QUOTES, 'UTF-8').' </a>says:
				<p>'.add_smileys(nl2br(htmlentities($msg['content'], ENT_QUOTES, 'UTF-8'))).'</p>
			</div>';
		
		if ($i == 0) { //get the timestamp of the last message
			$lastmsg_timestamp = $msg['time'];
		}
	}
	
	return array('messages_content' => $messages, 'lastmsg_timestamp' => $lastmsg_timestamp); //return the messages formated + the timestamp of the last one
}

//pushes one message into the database
function push_message ($msg) {
	$uid = get_user_id();

	//connect to the database
	$con = db_connect();
	if ($con === false) {
		return false;
	}
	
	//sanitize the message
	$msg = mysqli_real_escape_string($con, $msg);

	//push a message into the database
	$query = "INSERT INTO `message` (`content`, `uid`) VALUES('$msg', $uid)";
	$res = mysqli_query($con, $query);
	
	if ($res === false || mysqli_affected_rows($con) != 1) {
		mysqli_close($con); //close the database
		return false;
	}
	mysqli_close($con); //close the database
	
	return true;
}

function add_smileys ($msg) {
	/*
	* Please note that I am not the owner of any of the smilie icons that I use in this project.
	* All the smilie icons that I use, are provided free by www.freesmileys.org.
	* If you don't like the icons that I included or you want to add more, 
	* you can use your own or download more from www.freesmileys.org.
	*/

	//To add an new smilie, first register it in the following array
	//and then put an 20px X 20px image of it in the media/smilies directory.
	//The image type must be GIF and the name must be the same with its value 
	//in the following array, e.g. 'cool.gif'.
	$smilies = array(
		':|'  => 'mellow',
		':-|' => 'mellow',
		':-o' => 'ohmy',
		':-O' => 'ohmy',
		':o'  => 'ohmy',
		':O'  => 'ohmy',
		';)'  => 'wink',
		';-)' => 'wink',
		':p'  => 'tongue',
		':-p' => 'tongue',
		':P'  => 'tongue',
		':-P' => 'tongue',
		':D'  => 'biggrin',
		':-D' => 'biggrin',
		'8)'  => 'cool',
		'8-)' => 'cool',
		':)'  => 'smile',
		':-)' => 'smile',
		':('  => 'sad',
		':-(' => 'sad'
	);

	//search and replace any ascii smilie with an image tag
	foreach ($smilies as $smilie => $image) {
		$regex = preg_quote("/$smilie/");
		$image_tag = '<img class="smilie" src="simple_chat/media/smilies/'.$image.'.gif" title="'.$smilie.'" alt="'.$smilie.'">';
		
		$msg = preg_replace($regex, $image_tag, $msg);
	}

	return $msg;
}
?>