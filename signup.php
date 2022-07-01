<!DOCTYPE html> 
<html lang="it">
	<head>
		<?php 
			require 'components/head.php';
		?>
		<link rel="stylesheet" type="text/css" href="/SAW2021-22/style/form.css">
		<title>Headphone Paradise - Registrati</title>
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
			<form name="signup" action="action/registration.php" method="POST" onsubmit="return validateRegistrationForm()">
			  <div class="my-2">
				<label for="firstname">Nome</label>
				<input type="text" class="form-control my-1" id="firstname" name="firstname">
				<small id="firstnamehelp" class="error_message"></small>
			  </div>
			  <div class="my-2">
				<label for="lastname">Cognome</label>
				<input type="text" class="form-control my-1" id="lastname" name="lastname">
				<small id="lastnamehelp" class="error_message"></small>
			  </div>
			  <div class="my-2">
				<label for="email">Email</label>
				<input type="email" class="form-control my-1" id="email" name="email" onchange="checkEmailRegistration()">
				<small id="emailhelp" class="error_message"></small>
			  </div>
			  <div class="my-2">
				<label for="pass">Password</label>
				<input type="password" class="form-control my-1" id="pass" name="pass">
				<small id="passhelp" class="error_message"></small>
			  </div>
			  <div class="my-2">
				<label for="confirm">Conferma password</label>
				<input type="password" class="form-control my-1" id="confirm" name="confirm">
				<small id="confirmhelp" class="error_message"></small>
			  </div>
			  <div class="d-grid">
				<small id="already" class="text-muted mt-1 mb-2 right">
					Hai già un account? <a href="signin.php">Accedi</a>
				</small>
				<button type="submit" class="btn btn-primary submit">Registrati</button>
			  </div>
			</form>
		</div>
		<script src="scripts/validation/validation.js"></script>
		<script src="scripts/validation/validate_registration.js"></script>
		<?php
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>