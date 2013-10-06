<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

session_start();
define('INCLUDED',true);
require 'includes/core_func.php';

if (user_logged_in()) {
	$old_user = $_SESSION['uid'];
	unset($_SESSION['uid']);
	session_destroy();
}

if (get_last_page() !== false) {
	header('Location: http://'.get_last_page());
}
else {
	header('Location: ../'); // or 'Location: login_form.php' if you want to redirect back to the login form after logout
}
?>