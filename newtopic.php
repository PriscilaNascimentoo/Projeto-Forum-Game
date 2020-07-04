<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<head><title>GS Fórum</title></head>
<link href="/gamerstation/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
		<div class="header"><h1><a href="/gamerstation">GamerStation Fórum</a></h1></div>
		<div class="loginpane">
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg-success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
						} else if ($_GET['status'] == 'login-fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
					}
					loginform();
				}
			?>
		</div>
		<div class="forumdesc">
			<p>Bem vindo ao Fórum! Estamos em construção...</p>
		</div>
		<div class="content">
			<?php 
				if (isset($_SESSION['username'])) {
					echo "<form action='/gamerstation/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'
						  method='POST'>
						  <p>Title: </p>
						  <input type='text' id='topic' name='topic' size='100' />
						  <p>Content: </p>
						  <textarea id='content' name='content'></textarea><br />
						  <input type='submit' value='add new post' /></form>";
				} else {
					echo "<p>Faça o login primeiro ou <a href='/gamerstation/register.html'>clique aqui</a> para se registrar.</p>";
				}
			?>
		</div>
	</div>
</body>
</html>