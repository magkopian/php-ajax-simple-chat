<!--
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/
-->
<!DOCTYPE html>
<html>
	<head>
		<title>Simple Chat</title>
		
		<!-- Note: the charset must be UTF-8 -->
		<meta charset="UTF-8">
		
		<style type="text/css">
			body , div, img, p, h1{
				font-family: arial;
				margin: 0;
				padding: 0;
				font-weight: normal;
			}

			#wrapper {
				width: 100%;
				max-width: 960px;
				margin: 15px auto;
			}

			#title {
				margin: 5px auto 100px auto;
				width: 380px;
				text-align: center;
			}

			#title h1 {
				white-space: nowrap;
				font-size: 60px;
			}
			
			#contents p {
				font-size: 20px;
				margin-bottom: 25px;
			}
			
			#contents a {
				display: block;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="title"><h1>Simple Chat ;)</h1></div>
			
			<div id="contents">
				<p>This a Simple Chat System using PHP & Ajax. Please choose a demo page from below to try it: </p>
				<a href="embedded_chat_demo.php">Embedded Chat Version - Demo</a>
				<a href="full_page_chat_demo.php">Full Page Chat  Version - Demo</a>
			</div>
		</div>
	</body>
</html>