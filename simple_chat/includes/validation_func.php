<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

if (!defined('INCLUDED')){
	define('INCLUDED',true);
	require 'includes/markup_func.php';
	header('HTTP/1.1 403 Forbidden');
	do_html_403();
	die();
}

function validate_username ($uname) {
	$uname = trim($uname); //ignore white-space on start or the end of the username
	$regex = '/^([\p{Greek}a-zA-Z0-9]*[\p{Greek}a-zA-Z][\p{Greek}a-zA-Z0-9]*)$/'; //allow usernames that use letters (Latin or Greek) and or digits but have at least one letter inside
	if (validate_len($uname, 20, 3) === false || preg_match($regex, $uname) === 0) {
		return false;
	}
	return $uname; //on success return the trimmed username
}

function validate_password ($passwd) {
	$passwd = trim($passwd); //ignore white-space on start or the end of the password
	if (validate_len($passwd, 'inf', 8) === false) {
		return false;
	}
	
	$salt = '8h@tr-waswe_aT#9TaCHuPhU'; //for security reasons please replace this string with your own random string (before attempt to register any user)
	return hash('sha256', $passwd.$salt); //return sha256 hash of the salted password
	return $passwd;
}

function validate_recaptcha ($recaptcha_challenge_field, $recaptcha_response_field) {
	require 'recaptcha/recaptchalib.php';
	$privatekey = 'xxxxxxxxxxxxxxxxxxxx';
	$res = recaptcha_check_answer($privatekey, $_SERVER['REMOTE_ADDR'], $recaptcha_challenge_field, $recaptcha_response_field);

	if (!$res->is_valid) {
		return false;
	}
	return true;
}

function validate_timestamp ($timestamp) {
	//check the format of the mysql timestamp with a regex
	$regex = '/^([1-9][0-9]*)-(([0][1-9])|([1][0-2]))-(([0][1-9])|([12][0-9])|([3][01]))[\s](([01][0-9])|([2][0-3]))[:](([0-5][0-9]))[:](([0-5][0-9]))$/';
	if (preg_match($regex, $timestamp, $matches) === false) {
		return false;
	}
	
	//check if the numbers are represent a valid date
	return date('Y-m-d H:i:s', mktime($matches[9], $matches[12], $matches[14], $matches[2], $matches[5], $matches[1]));
}

function validate_len ($str, $max_len, $min_len = 1) {
	if ($max_len !== 'inf') {
		if (mb_strlen($str, 'UTF-8') > $max_len || mb_strlen($str, 'UTF-8') < $min_len) {
			return false;
		}
	}
	else {
		if (mb_strlen($str, 'UTF-8') < $min_len) {
			return false;
		}
	}
	return true;
}
?>