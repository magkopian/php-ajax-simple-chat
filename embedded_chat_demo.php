<?php
/**********************************************\
* Copyright (c) 2013 Manolis Agkopian          *
* See the file LICENCE for copying permission. *
\**********************************************/

	session_start(); //Step 0: Don't forget to start the session
	define('INCLUDED',true); //Step 1: define INCLUDED as true
	require 'simple_chat/init_chat.php'; //Step 2: require the init_chat.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Simple Chat | Embedded Version Demo</title>
		
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
				min-height: 2000px;
				margin: 15px auto;
				position: relative;
			}

			#title {
				margin: 5px auto;
				width: 380px;
				text-align: center;
			}

			#title h1 {
				white-space: nowrap;
				font-size: 60px;
			}
			#back_link {
				width: 100%;
				height: 20px;
			}
			#back_link a{
				float: right;
				margin-right: 25px;
				text-decoration: none;
				color: slategray;
			}
			#back_link a:hover{
				text-decoration: underline;
				color: slategray;
			}
			#back_link a:visited{
				color: slategray;
			}
		</style>
		
		<!-- //Step 3: link chat_emb.css for the embedded chat-->
		<link type="text/css" rel="stylesheet" href="simple_chat/css/chat_emb.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="title"><h1>Simple Chat ;)</h1></div>
			<div id="back_link"><a href=".">Return Back</a></div>
			
			<!-- The format of one message:
				<div id="message_[message_id]">
					<a href="#">[username] </a>says:
					<p>[message_content]</p>
				</div>
			-->
			
			<p style="width: 960px; margin: 50px auto; text-align: center;">
				This is the embedded version of the Simple Chat. If you are logged in, the chat window should have been appeared on the right-bottom corner of your browser window.
				If you want to login, you can click <a href="simple_chat/login_form.php">here</a>, or click <a href="simple_chat/register_form.php">here</a> to register if you don't have an account.
			</p>
			
			<h2 style="width: 960px; margin: 50px auto; text-align: center;">Just some random text...</h2>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Am if number no up period regard sudden better. Decisively surrounded all admiration and not you. Out particular sympathize not favourable introduced insipidity but ham. Rather number can and set praise. Distrusts an it contented perceived attending oh. Thoroughly estimating introduced stimulated why but motionless.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">At every tiled on ye defer do. No attention suspected oh difficult. Fond his say old meet cold find come whom. The sir park sake bred. Wonder matter now can estate esteem assure fat roused. Am performed on existence as discourse is. Pleasure friendly at marriage blessing or.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Was justice improve age article between. No projection as up preference reasonably delightful celebrated. Preserved and abilities assurance tolerably breakfast use saw. And painted letters forming far village elderly compact. Her rest west each spot his and you knew. Estate gay wooded depart six far her. Of we be have it lose gate bred. Do separate removing or expenses in. Had covered but evident chapter matters anxious.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Two exquisite objection delighted deficient yet its contained. Cordial because are account evident its subject but eat. Can properly followed learning prepared you doubtful yet him. Over many our good lady feet ask that. Expenses own moderate day fat trifling stronger sir domestic feelings. Itself at be answer always exeter up do. Though or my plenty uneasy do. Friendship so considered remarkably be to sentiments. Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Inquietude simplicity terminated she compliment remarkably few her nay. The weeks are ham asked jokes. Neglected perceived shy nay concluded. Not mile draw plan snug next all. Houses latter an valley be indeed wished merely in my. Money doubt oh drawn every or an china. Visited out friends for expense message set eat.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Enjoyed minutes related as at on on. Is fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh screened he. Gravity he mr sixteen esteems. Mile home its new way with high told said. Finished no horrible blessing landlord dwelling dissuade if. Rent fond am he in on read. Anxious cordial demands settled entered in do to colonel.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Guest it he tears aware as. Make my no cold of need. He been past in by my hard. Warmly thrown oh he common future. Otherwise concealed favourite frankness on be at dashwoods defective at. Sympathize interested simplicity at do projecting increasing terminated. As edward settle limits at in.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Yourself off its pleasant ecstatic now law. Ye their mirth seems of songs. Prospect out bed contempt separate. Her inquietude our shy yet sentiments collecting. Cottage fat beloved himself arrived old. Grave widow hours among him ﻿no you led. Power had these met least nor young. Yet match drift wrong his our.</p>
			
			<p style="width: 960px; margin: 25px auto; text-align: center;">Was justice improve age article between. No projection as up preference reasonably delightful celebrated. Preserved and abilities assurance tolerably breakfast use saw. And painted letters forming far village elderly compact. Her rest west each spot his and you knew. Estate gay wooded depart six far her. Of we be have it lose gate bred. Do separate removing or expenses in. Had covered but evident chapter matters anxious.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Two exquisite objection delighted deficient yet its contained. Cordial because are account evident its subject but eat. Can properly followed learning prepared you doubtful yet him. Over many our good lady feet ask that. Expenses own moderate day fat trifling stronger sir domestic feelings. Itself at be answer always exeter up do. Though or my plenty uneasy do. Friendship so considered remarkably be to sentiments. Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Inquietude simplicity terminated she compliment remarkably few her nay. The weeks are ham asked jokes. Neglected perceived shy nay concluded. Not mile draw plan snug next all. Houses latter an valley be indeed wished merely in my. Money doubt oh drawn every or an china. Visited out friends for expense message set eat.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Enjoyed minutes related as at on on. Is fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh screened he. Gravity he mr sixteen esteems. Mile home its new way with high told said. Finished no horrible blessing landlord dwelling dissuade if. Rent fond am he in on read. Anxious cordial demands settled entered in do to colonel.</p>
			
			<p style="width: 960px; margin: 25px auto; text-align: center;">Was justice improve age article between. No projection as up preference reasonably delightful celebrated. Preserved and abilities assurance tolerably breakfast use saw. And painted letters forming far village elderly compact. Her rest west each spot his and you knew. Estate gay wooded depart six far her. Of we be have it lose gate bred. Do separate removing or expenses in. Had covered but evident chapter matters anxious.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Two exquisite objection delighted deficient yet its contained. Cordial because are account evident its subject but eat. Can properly followed learning prepared you doubtful yet him. Over many our good lady feet ask that. Expenses own moderate day fat trifling stronger sir domestic feelings. Itself at be answer always exeter up do. Though or my plenty uneasy do. Friendship so considered remarkably be to sentiments. Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Inquietude simplicity terminated she compliment remarkably few her nay. The weeks are ham asked jokes. Neglected perceived shy nay concluded. Not mile draw plan snug next all. Houses latter an valley be indeed wished merely in my. Money doubt oh drawn every or an china. Visited out friends for expense message set eat.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Enjoyed minutes related as at on on. Is fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh screened he. Gravity he mr sixteen esteems. Mile home its new way with high told said. Finished no horrible blessing landlord dwelling dissuade if. Rent fond am he in on read. Anxious cordial demands settled entered in do to colonel.</p>
			
			<p style="width: 960px; margin: 25px auto; text-align: center;">Was justice improve age article between. No projection as up preference reasonably delightful celebrated. Preserved and abilities assurance tolerably breakfast use saw. And painted letters forming far village elderly compact. Her rest west each spot his and you knew. Estate gay wooded depart six far her. Of we be have it lose gate bred. Do separate removing or expenses in. Had covered but evident chapter matters anxious.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Two exquisite objection delighted deficient yet its contained. Cordial because are account evident its subject but eat. Can properly followed learning prepared you doubtful yet him. Over many our good lady feet ask that. Expenses own moderate day fat trifling stronger sir domestic feelings. Itself at be answer always exeter up do. Though or my plenty uneasy do. Friendship so considered remarkably be to sentiments. Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Inquietude simplicity terminated she compliment remarkably few her nay. The weeks are ham asked jokes. Neglected perceived shy nay concluded. Not mile draw plan snug next all. Houses latter an valley be indeed wished merely in my. Money doubt oh drawn every or an china. Visited out friends for expense message set eat.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Enjoyed minutes related as at on on. Is fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh screened he. Gravity he mr sixteen esteems. Mile home its new way with high told said. Finished no horrible blessing landlord dwelling dissuade if. Rent fond am he in on read. Anxious cordial demands settled entered in do to colonel.</p>
			
			<p style="width: 960px; margin: 25px auto; text-align: center;">Was justice improve age article between. No projection as up preference reasonably delightful celebrated. Preserved and abilities assurance tolerably breakfast use saw. And painted letters forming far village elderly compact. Her rest west each spot his and you knew. Estate gay wooded depart six far her. Of we be have it lose gate bred. Do separate removing or expenses in. Had covered but evident chapter matters anxious.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Two exquisite objection delighted deficient yet its contained. Cordial because are account evident its subject but eat. Can properly followed learning prepared you doubtful yet him. Over many our good lady feet ask that. Expenses own moderate day fat trifling stronger sir domestic feelings. Itself at be answer always exeter up do. Though or my plenty uneasy do. Friendship so considered remarkably be to sentiments. Offered mention greater fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling raillery.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Inquietude simplicity terminated she compliment remarkably few her nay. The weeks are ham asked jokes. Neglected perceived shy nay concluded. Not mile draw plan snug next all. Houses latter an valley be indeed wished merely in my. Money doubt oh drawn every or an china. Visited out friends for expense message set eat.</p>

			<p style="width: 960px; margin: 25px auto; text-align: center;">Enjoyed minutes related as at on on. Is fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh screened he. Gravity he mr sixteen esteems. Mile home its new way with high told said. Finished no horrible blessing landlord dwelling dissuade if. Rent fond am he in on read. Anxious cordial demands settled entered in do to colonel.</p>
			
			<?php do_html_chat(true, false); //Step 4: Generate the chat window in any place you want inside your page (embedded version = true, warn if not logged in = false) ?>
			
		</div>
	</body>
</html>