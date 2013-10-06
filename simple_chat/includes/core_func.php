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

function user_logged_in () {
	if (isset($_SESSION['uid']) && !empty($_SESSION['uid']) && ((int) $_SESSION['uid']) != 0) {
		return true;
	}
	return false;
}

function get_user_id () {
	return $_SESSION['uid'];
}

function login ($uname, $passwd) {
	require 'includes/dbconnect.php';
	
	//connect to the database
	$con = db_connect();
	if ($con === false) {
		return false;
	}
	
	//escape username strings
	$uname = mysqli_real_escape_string($con, $uname);
	
	//query the database
	$query = "SELECT `uid` FROM `user` WHERE LOWER(`uname`) = LOWER('$uname') AND `passwd` = '$passwd'";
	
	$res = mysqli_query($con, $query);
	
	if ($res === false) {
		mysqli_close($con);
		return false;
	}
	else if (mysqli_affected_rows($con) != 1) {
		mysqli_close($con);
		return -1;
	}
	else {
		$res = mysqli_fetch_assoc($res);
		$_SESSION['uid'] = (int) $res['uid'];
		mysqli_close($con);
		return true;
	}
}

function register($uname, $passwd) {
	require 'includes/dbconnect.php';
	
	//connect to the database
	$con = db_connect();
	if ($con === false) {
		return false;
	}
	
	//escape username strings
	$uname = mysqli_real_escape_string($con, $uname);
	
	//check if username exists
	
	//query the database
	$query = "SELECT `uid` FROM `user` WHERE LOWER(`uname`) = LOWER('$uname')";
	
	$res = mysqli_query($con, $query);
	
	if ($res === false) {
		mysqli_close($con);
		return false;
	}
	else if (mysqli_affected_rows($con) == 1) { //then the user exist
		mysqli_close($con);
		return -1;
	}
	
	//if username is available then register the user
	
	//query the database
	$query = "INSERT INTO `user` (`uname`, `passwd`) VALUES('$uname', '$passwd')";
	
	$res = mysqli_query($con, $query);
	
	if ($res === false) {
		mysqli_close($con);
		return false;
	}
	else if (mysqli_affected_rows($con) != 1) {
		mysqli_close($con);
		return false;
	}
	else {
		mysqli_close($con);
		return true;
	}
}

function set_last_page ($last_page) {
	$_SESSION['last_page'] = $last_page;
}

function get_last_page () {
	if (isset($_SESSION['last_page']) && !empty($_SESSION['last_page'])) {
		return $_SESSION['last_page'];
	}
	else {
		return false;
	}
}
?>