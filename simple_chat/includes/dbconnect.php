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

function db_connect() {
	$con = @mysqli_connect('host', 'username', 'password', 'dbname');
	if ($con === false) {
		return false;
	}
	
	mysqli_set_charset ($con , 'UTF-8');
	return $con;
}
?>