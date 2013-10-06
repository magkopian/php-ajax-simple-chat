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
		if (($uname = validate_username(mb_strtolower($_POST['uname'], 'UTF-8'))) === false) { //we want the login to be case insensitive
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
	
	//check for form field errors
	if (!empty($errors)) { //if there are any errors
		$_SESSION['login_errors'] = $errors; //set a session variable to pass them to the login form page
	}
	else { //if no errors try to login
		if (($res = login($uname, $passwd)) === false) { //if database error
			$errors['uname'] = 'An error has been occurred'; //we want it to appear above username field
			$_SESSION['login_errors'] = $errors; //set a session variable to pass them to the login form page
		}
		else if ($res === -1) { //if invalid username or password		
			$errors['uname'] = 'Invalid Username or Password'; //we want it to appear above username field
			$_SESSION['login_errors'] = $errors; //set a session variable to pass them to the login form page
		}
		else {
			if (get_last_page() !== false) {
				header('Location: http://'.get_last_page()); //after sucessful login return to the previous page
			}
			else {
				header('Location: ../'); //you can replace this redirect with one to the chat page of your site if you want
				die();
			}
		}
	}
	
	//else redirect to the loggin form of the site
	header('Location: login_form.php'); //you can replace this redirect with one to the chat page of your site
	die();
?>