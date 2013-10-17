<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>

<h3>Description:</h3>
<p>
This is the <strong>Simple Chat ;)</strong>, a simple AJAX chat application written in PHP and Javascript with jQuery. 
</p>

<p>
The <strong>Simple Chat ;)</strong> comes in two different versions. The first, is the full-page version, where the chat window is placed inside your page content. The second is the embedded version, where the chat window is placed on a position-fixed bar, on the down-right side of the browser window. In the embedded version you can hide or show the chat window. A live demo of the <strong>Simple Chat ;)</strong> in both versions is available <a href="http://magkopian.tk/simple-chat/" title="Simple Chat ;) Demo Page">here</a>.
</p>


<h3>How to Use:</h3>

<p>
To use the full page version of this chat application, please follow the steps that appear as comments inside the <strong>full_page_chat_demo.php</strong> file. To use the embedded version, follow the steps inside the <strong>embedded_chat_demo.php</strong> file.
</p>

<p>
The <strong>Simple Chat ;)</strong> includes a basic register-login system. If your website already has a register-login system you have to modify the <strong>init_chat.php</strong> file. You have to replace the line <code>header('Location: simple_chat/login_form.php');</code> with a redirect to your own login page, also after a succesful login you have to set the <code>$_SESSION['uid']</code> variable with the id of the user.
</p>

<p>
If you use the included login-register system you have to sign up for a Google's <a href="http://www.google.com/recaptcha/whyrecaptcha" target="_blank">reCAPTCHA</a> account in order to get an API key for the reCAPTCHA service and use it. After you get the API key modify the line <code>$privatekey = 'xxxxxxxxxxxxxxxxxxxx';</code> inside the function <strong>validate_recaptcha</strong> inside the file <strong>validation_func.php</strong> and the line <code>$publickey = 'xxxxxxxxxxxxxxxxxxxx'.'&amp;hl=en';</code> inside the function <strong>do_html_register_form</strong> inside the file <strong>markup_func.php</strong>. If you don&#39;t want the reCAPTCHA at all, just remove the reCAPTCHA validation check inside the <strong>register.php</strong> script and modify the function <strong>do_html_register_form</strong> inside the <strong>markup_func.php</strong> file so it wont appear in the login form. Lastly for security reasons before you register any user, replace the salt string inside the <strong>validate_password</strong> function in the <strong>validation_func.php</strong> file.
</p>


<h3>Database Setup:</h3>

<p>
First inside your database you must have two tables. One named `message` and one named `user`. 
</p>

<p>
To create the `message` table run the following query:
</p>

<pre>
CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
</pre>

<p>
To create `user` table run the following queries:
</p>

<pre>
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`),
  KEY `passwd` (`passwd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
</pre>

<p>
You can also just insert the <strong>simple_chat.sql</strong> file in your database.
</p>

<p>
If you use your own login system and you have already a table with users but not named `user` the easier way to get around this, is to modify the file <strong>chat_func.php</strong>, and replace the `user` table name, with the one that you use, on the following lines: 
</p>

<pre>
$query = 'SELECT `mid`, `uname`, `content`, `time` FROM `user` INNER JOIN `message` ON `message`.`uid` = `user`.`uid` ORDER BY `time` DESC';

$query = "SELECT `mid`, `uname`, `content`, `time` FROM `user` INNER JOIN `message` ON `message`.`uid` = `user`.`uid` WHERE `time` > '$timestamp'
</pre>
	
<p>
Also you have to make sure that the table has all the needed fields in the correct format, except the `passwd` field that is handled by your own login-register scripts. If for some reason this is impossible to do, the only way is to create a second table named `user` with all the needed fields and make a duplicate of your users there, you have also to modify your registration script in order for it to register your users on both tables.
</p>

<p>
If now your user table is named `user` you just have to make sure that it has the needed fields. If it doesn&#39;t, and also impossible to alter, the only way is ether to create a second database for the whole application and duplicate your users inside the `user` table, or create a table for the users with an other name within the same database and duplicate your user there. In the last case don&#39;t forget to modify the queries inside <strong>chat_func.php</strong>.
</p>

<p>
Lastly but not least you have to modify the line <code>$con = @mysqli_connect('hostname', 'username', 'password', 'dbname');</code> inside the dbconnect.php file to match your own database setup.
</p>

<h3>Licensing</h3>

<p>
My code is licensed under the MIT Licence, please check the LICENCE file for copying permission. Please note that I do not own any of the code inside the recaptchalib.php file, please check the LICENSE file inside the /simple_chat/recaptcha directory. Also I do not own any of the smileys inside the smileys folder. All the smileys are provided free by the <a href="http://www.freesmileys.org" target="_blank">www.freesmileys.org</a>
</p>

[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/magkopian/php-ajax-simple-chat/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

</body>
</html>