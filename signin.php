<!DOCTYPE html> 
<html lang="it">
	<head>
		<?php 
			require 'components/head.php';
		?>
		<link rel="stylesheet" type="text/css" href="/SAW2021-22/style/form.css">
		<title>Headphone Paradise - Accedi</title>
	</head>
	<body>
		<?php
			session_start();
			require 'components/navbar.php';
			include 'display_message.php';
			
			if(isset($_SESSION['Login']) || isset($_SESSION['Firstname']) || isset($_SESSION['Lastname'])){
				errore("Non sei autorizzato a visualizzare questa pagina", "index.php");
				exit();
			}
		?>
		<div class="form mx-auto rounded-3 my-5 p-4 col-lg-3">
			<img src="images/hplogos.png" class="mx-auto d-block" alt="Headphone Master Logo">
			<form name="signin" action="action/login.php" method="POST" onsubmit="return validateLoginForm()">
			  <div class="my-2">
				<label for="email">Email</label>
				<input type="email" class="form-control my-1" id="email" name="email" onchange="checkEmailLogin()">
				<small id="emailhelp" class="error_message"></small>
			  </div>
			  <div class="my-2">
				<label for="pass">Password</label>
				<input type="password" class="form-control my-1" id="pass" name="pass">
				<small id="passhelp" class="error_message"></small>
			  </div>
			  <div class="d-grid">
				<small id="already" class="text-muted mt-1 mb-2 right">
					Non hai un account? <a href="signup.php">Registrati</a>
				</small>
				<button type="submit" class="btn btn-primary submit">Accedi</button>
			  </div>
			</form>
		</div>
		<script src="scripts/validation/validation.js"></script>
		<script src="scripts/validation/validate_login.js"></script>
		<?php
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>