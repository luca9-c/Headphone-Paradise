<!DOCTYPE html>
<html lang="it">
	<head>
        <?php 
			require 'components/head.php';
		?>
		<title>Headphone Paradise - Logout</title>
	</head>
	<body>
		<?php
			session_start();
			
			require 'components/navbar.php';
			include 'display_message.php';
			
			if((!isset($_SESSION["Login"])) || (!isset($_SESSION["Firstname"])) || (!isset($_SESSION["Lastname"]))){
				errore("Non risulti connesso al sito.", "index.php");
				exit();
			}
			
			$_SESSION = [];
			
			if(isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time() - 42000, '/');
			}
			
			session_destroy();
			
			ok("Grazie per averci visitato!", "index.php");
			
			require 'components/footer.php';
		?>
	</body>
</html>