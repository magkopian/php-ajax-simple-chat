<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

if (!defined('INCLUDED')){
	header('HTTP/1.1 403 Forbidden');
	do_html_403();
	die();
}

function do_html_chat($emb = false, $warn = true) {
	if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) { 
		if ($warn === true) { ?>
		<p style="width: 960px; margin: 50px auto; text-align: center;" id="not_logged_in">
			To view the chat window on this page you have to be logged in, please click <a href="simple_chat/login_form.php">here</a> to login.
		</p>
	<?php
		}
		return;
	}

	if ($emb === true) { ?>
		<div id="bar"><div id="toggle_chat" unselectable="on"><p><span>Click to Hide</span></p></div><a href="simple_chat/logout.php" id="logout"><span>Logout</span></a></div>
	<?php
	}
	?>
		<div id="chat">
			<div id="errors_box">
				<p class="error" style="padding: 0"></p>
			</div>
			
			<?php 
			if ($emb === false) { ?>
				<div id="logout"><a href="simple_chat/logout.php"><span>Logout</span></a></div>
				<div class="clear"></div>
			<?php
			}
			?>
			
			<div id="msg_cont">
				<div id="messages">
				
				</div>
			</div>
			
			<div id="input_msg">
				<textarea id="msg" name="msg" autofocus="autofocus" placeholder="To add a new line press shift + enter."></textarea>
			</div>
		</div>

		<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="simple_chat/js/chat.js"></script>
<?php
}

function do_html_403() { ?>
<!DOCTYPE html">
<html>
	<head>
		<title>403 Forbidden</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>403 Forbidden</h1>
		<p>You don&#39;t have permission to access <strong><?=$_SERVER['SCRIPT_NAME']?></strong> on this server.</p>
	</body>
</html>
<?php
}

function do_html_login_form($errors) { ?>
<script type="text/javascript">
	var RecaptchaOptions = {
	   theme : 'white'
	};
</script>
<form action="login.php" method="POST">
	<?=(isset($errors['uname']) && !empty($errors['uname'])) ? '<p class="error">'.$errors['uname'].'</p>' : ''?>
	<input type="text" name="uname" id="uname" placeholder="Username">
	
	<?=(isset($errors['passwd']) && !empty($errors['passwd'])) ? '<p class="error">'.$errors['passwd'].'</p>' : ''?>
	<input type="password" name="passwd" id="passwd" placeholder="Password">
	
	<input type="submit" name="submit" id="submit_login" value="Login">
	<div id="register_link"><p>Don't have a user account? <a href="register_form.php" title="Click to Register">Register here!</a></p></div>
</form>
<?php
}

function do_html_register_form($errors) { ?>
<script type="text/javascript">
	var RecaptchaOptions = {
	   theme : 'white'
	};
</script>
<form action="register.php" method="POST">
	<?=(isset($errors['uname']) && !empty($errors['uname'])) ? '<p class="error">'.$errors['uname'].'</p>' : ''?>
	<input type="text" name="uname" id="uname" placeholder="Username">
	
	<?=(isset($errors['passwd']) && !empty($errors['passwd'])) ? '<p class="error">'.$errors['passwd'].'</p>' : ''?>
	<input type="password" name="passwd" id="passwd" placeholder="Password">
	
	<?php
		if (isset($errors['recaptcha']) && !empty($errors['recaptcha'])) { 
			echo '<p class="error">', $errors['recaptcha'], '</p>';
		}
		
		require 'recaptcha/recaptchalib.php';
		$publickey = 'xxxxxxxxxxxxxxxxxxxx'.'&amp;hl=en';
		echo recaptcha_get_html($publickey);
	?>
	
	<input type="submit" name="submit" id="submit_register" value="Register">
	<div id="login_link"><p>Already have an account? <a href="login_form.php" title="Click to Login">Login here!</a></p></div>
</form>
<?php
}
?>


