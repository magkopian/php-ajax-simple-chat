## Description:</h3>
This is the **Simple Chat ;)**, a simple AJAX chat application written in PHP and Javascript with jQuery.

The **Simple Chat ;)** comes in two different versions. The first, is the full-page version, where the chat window is placed inside your page content. The second is the embedded version, where the chat window is placed on a position-fixed bar, on the down-right side of the browser window. In the embedded version you can hide or show the chat window. A live demo of the **Simple Chat ;)** in both versions is available [here](http://magkopian.tk/simple-chat/).

## How to Use:
To use the full page version of this chat application, please follow the steps that appear as comments inside the **full_page_chat_demo.php** file. To use the embedded version, follow the steps inside the **embedded_chat_demo.php** file.

The **Simple Chat ;)** includes a basic register-login system. If your website already has a register-login system you have to modify the **init_chat.php** file. You have to replace the line `header('Location: simple_chat/login_form.php');` with a redirect to your own login page, also after a succesful login you have to set the `$_SESSION['uid']` variable with the id of the user.

If you use the included login-register system you have to sign up for a Google's <a href="http://www.google.com/recaptcha/whyrecaptcha" target="_blank">reCAPTCHA</a> account in order to get an API key for the reCAPTCHA service and use it. After you get the API key modify the line `$privatekey = 'xxxxxxxxxxxxxxxxxxxx';` inside the function **validate_recaptcha** inside the file **validation_func.php** and the line `$publickey = 'xxxxxxxxxxxxxxxxxxxx'.'&amp;hl=en';` inside the function **do_html_register_form** inside the file **markup_func.php**. If you don't want the reCAPTCHA at all, just remove the reCAPTCHA validation check inside the **register.php** script and modify the function **do_html_register_form** inside the **markup_func.php** file so it wont appear in the login form. Lastly for security reasons before you register any user, replace the salt string inside the **validate_password** function in the **validation_func.php** file.

## Database Setup:

First inside your database you must have two tables. One named `message` and one named `user`. 

To create the `message` table run the following query:

```MYSQL
CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
```

To create `user` table run the following queries:

```MYSQL
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
```

You can also just insert the **simple_chat.sql** file in your database.

If you use your own login system and you have already a table with users but not named `user` the easier way to get around this, is to modify the file **chat_func.php**, and replace the `user` table name, with the one that you use, on the following lines: 

```PHP
$query = 'SELECT `mid`, `uname`, `content`, `time` FROM `user` INNER JOIN `message` ON `message`.`uid` = `user`.`uid` ORDER BY `time` DESC';

$query = "SELECT `mid`, `uname`, `content`, `time` FROM `user` INNER JOIN `message` ON `message`.`uid` = `user`.`uid` WHERE `time` > '$timestamp'";
```
	
Also you have to make sure that the table has all the needed fields in the correct format, except the `passwd` field that is handled by your own login-register scripts. If for some reason this is impossible to do, the only way is to create a second table named `user` with all the needed fields and make a duplicate of your users there, you have also to modify your registration script in order for it to register your users on both tables.

If now your user table is named `user` you just have to make sure that it has the needed fields. If it doesn't, and also impossible to alter, the only way is ether to create a second database for the whole application and duplicate your users inside the `user` table, or create a table for the users with an other name within the same database and duplicate your user there. In the last case don't forget to modify the queries inside **chat_func.php**.

Lastly but not least you have to modify the line `$con = @mysqli_connect('hostname', 'username', 'password', 'dbname');` inside the dbconnect.php file to match your own database setup.

## Licensing

My code is licensed under the MIT Licence, please check the LICENCE file for copying permission. Please note that I do not own any of the code inside the recaptchalib.php file, please check the LICENSE file inside the /simple_chat/recaptcha directory. Also I do not own any of the smileys inside the smileys folder. All the smileys are provided free by [freesmileys.org](http://www.freesmileys.org).
