<!DOCTYPE html>
<html lang="it">
	<head>
        <?php 
            require '../components/head.php';
        ?>
		<title>Headphone Paradise - Il tuo account - Modifica password</title>
		<link rel="stylesheet" type="text/css" href="/SAW2021-22/style/form.css">
	</head>
	<body>
		<?php 
			session_start();

			require '../components/navbar.php';
            require '../../connessione.php';
            include '../display_message.php';

			if((!isset($_SESSION["Login"])) || (!isset($_SESSION["Firstname"])) || (!isset($_SESSION["Lastname"]))){
                errore("Non sei autorizzato a visualizzare questa pagina.", "../index.php");
                exit();
			}
		?>
		<div class="my-5">
			<div class="edit col-lg-11 mx-auto rounded-3 my-3 p-4">
				<p><a href="show_profile.php">Account utente</a> / Modifica password</p>
			</div>
			<div class="edit col-lg-11 mx-auto rounded-3 my-3 p-4">
			   <form name="edit_password" action="update_password.php" method="POST" onsubmit="return validateUpdatePassword()"> 
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="old_pass">Inserisci la tua password attuale</label>
						</div>
						<div class="edit_value">
							<input type="password" class="edit_input form-control" id="old_pass" name="old_pass">
							<small id="oldpasshelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="new_pass">Inserisci la nuova password</label>
						</div>
						<div class="edit_value">
							<input type="password" class="edit_input form-control" id="new_pass" name="new_pass">
							<small id="passhelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="confirm_new">Conferma la nuova password</label>
						</div>
						<div class="edit_value">
							<input type="password" class="edit_input form-control" id="confirm_new" name="confirm_new">
							<small id="confirmhelp" class="error_message"></small>
						</div>
					</div>
					<input type="submit" class="btn btn-primary my-3" value="Modifica password">   
			   </form>
			</div>
		</div>
		<script src="/SAW2021-22/scripts/validation/validation.js"></script>
		<script src="/SAW2021-22/scripts/validation/validate_updatepass.js"></script>
		<?php
			require '../components/popup-box.php';
			require '../components/footer.php';
		?>
	</body>
</html>