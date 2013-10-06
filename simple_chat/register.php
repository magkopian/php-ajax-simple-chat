<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();
define('INCLUDED',true);
require 'includes/core_func.php';
require 'includes/validation_func.php';

if (user_logged_in()) {
	header('Location: ../');
	die();
}

$errors = array();

//check if username is provided
if (!isset($_POST['uname']) || empty($_POST['uname'])) {
	$errors['uname'] = 'The Username is required';
} else {
	//validate username
	if (($uname = validate_username($_POST['uname'])) === false) {
		$errors['uname'] = 'The Username is invalid';
	}
}

//check if password is provided
if (!isset($_POST['passwd']) || empty($_POST['passwd'])) {
	$errors['passwd'] = 'The Password is required';
} else {
	//validate password
	
	if (($passwd = validate_password($_POST['passwd'])) === false) {
		$errors['passwd'] = 'The Password must be at least 8 characters';
	}
}

//check if recaptcha is provided
if (!isset($_POST['recaptcha_challenge_field']) || empty($_POST['recaptcha_challenge_field']) || 
	!isset($_POST['recaptcha_response_field']) || empty($_POST['recaptcha_response_field'])) {
	$errors['recaptcha'] = 'The reCAPTCHA is required';
}
else {
	//validate recaptcha
	if (validate_recaptcha($_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']) === false) {
		$errors['recaptcha'] = 'The reCAPTCHA wasn\'t entered correctly.';
	}		
}


//check for form field errors
if (!empty($errors)) { //if there are any errors
	$_SESSION['reg_errors'] = $errors; //set a session variable to pass them to the registration form page
}
else { //if no errors try to register
	if (($res = register($uname, $passwd)) === false) { //if database error
		$errors['uname'] = 'An error has been occurred'; //we want it to appear above username field
		$_SESSION['reg_errors'] = $errors; //set a session variable to pass them to the registration form page
	}
	else if ($res === -1) { //if user already exists	
		$errors['uname'] = 'Username already exists'; //we want it to appear above username field
		$_SESSION['reg_errors'] = $errors; //set a session variable to pass them to the registration form page
	}
	else {
		if (get_last_page() !== false) {
			header('Location: login_form.php?ref=reg'); //after sucessful register goto the login page
			die();
		}
		else {
			header('Location: ../'); //you can replace this redirect with one to the chat page of your site if you want
			die();
		}
	}
}

//else redirect to the registration form of the site
header('Location: register_form.php'); //you can replace this redirect with one to the chat page of your site
die();
?>