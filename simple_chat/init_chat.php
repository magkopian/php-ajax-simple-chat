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
	
	require 'simple_chat/includes/markup_func.php';
	require 'simple_chat/includes/core_func.php';
	set_last_page($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);

	function redirect_if_not_logged_in() {
		if (!user_logged_in()) {
			header('Location: simple_chat/login_form.php'); //if you want to use your own login system, just replace this line with a redirect to your login page
			//and then inside your login script after you login the user, set a $_SESSION['uid'] variable with the id of the user
			die();
		}
	}
?>