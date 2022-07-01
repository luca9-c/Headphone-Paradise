<!DOCTYPE html>
<html lang="it">
	<head>
        <?php 
            require '../components/head.php';
        ?>
		<title>Headphone Paradise - Il tuo account - Modifica profilo</title>
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

			$id = $_SESSION['Login'];
            $stmt = mysqli_prepare($con, "SELECT firstname, lastname, email, city, address, credit_card, account_number, about_me FROM user WHERE id = '$id'");
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);

            if($rowcount != 1){
                errore("Non siamo riusciti a recuperare i tuoi dati, riprova più tardi.", "../index.php");
                exit();
            }
			else{
                $row = mysqli_fetch_array($res);
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
				$city = $row['city'];
				$address = $row['address'];
				$credit_card = $row['credit_card'];
                $account_number = $row['account_number'];
                $about_me = $row['about_me'];
			}
		?>
		<div class="my-5">
			<div class="edit col-lg-11 mx-auto rounded-3 my-3 p-4">
				<p>Account utente / <a href="edit_password.php">Modifica password</a></p>
			</div>
			<div class="edit col-lg-11 mx-auto rounded-3 my-3 p-4">
				<form name="show_profile" action="update_profile.php" method="POST" onsubmit="return validateUpdateProfile()"> 
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="firstname">Nome <small class="text-danger">(*)</small></label>
						</div>
						<div class="edit_value">
							<input type="text" class="edit_input form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
							<small id="firstnamehelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="lastname">Cognome <small class="text-danger">(*)</small></label>
						</div>
						<div class="edit_value">
							<input type="text" class="edit_input form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
							<small id="lastnamehelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="email">Email <small class="text-danger">(*)</small></label>
						</div>
						<div class="edit_value">
							<input type="email" class="edit_input form-control" id="email" name="email" onchange="checkEmailUpdate()" value="<?php echo $email; ?>">
							<small id="emailhelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="city">Città di residenza <small class="text-warning">(**)</small></label>
						</div>
						<div class="edit_value">
							<input type="text" class="edit_input form-control" id="city" name="city" value="<?php echo $city; ?>">
							<small id="cityhelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="address">Indirizzo di spedizione<small class="text-warning">(**)</small></label>
						</div>
						<div class="edit_value">
							<input type="text" class="edit_input form-control" id="address" name="address" value="<?php echo $address; ?>">
							<small id="addresshelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label>Metodo di pagamento <small class="text-warning">(**)</small></label>
						</div>
						<div class="edit_value">
							<input type="radio" id="mastercard" name="credit_card" value="Mastercard" <?php if($credit_card == "Mastercard") echo "checked" ?> >
							<label for="mastercard">Mastercard</label>
							<br>
							<input type="radio" id="visa" name="credit_card" value="Visa" <?php if($credit_card == "Visa") echo "checked" ?>>
							<label for="visa">Visa</label>
							<br>
							<input type="radio" id="nessuno" name="credit_card" value="" <?php if(empty($credit_card)) echo "checked" ?>>
							<label for="nessuno">Nessuno</label>
							<br>
							<small id="creditcardhelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="account_number">Numero conto corrente (16 cifre) <small class="text-warning">(**)</small></label>
						</div>
						<div class="edit_value">
							<input type="text" class="edit_input form-control" id="account_number" name="account_number" value="<?php echo $account_number; ?>">
							<small id="accountnumberhelp" class="error_message"></small>
						</div>
					</div>
					<div class="my-3">
						<div class="edit_key mb-1">
							<label for="about_me">Mia descrizione</label>
						</div>
						<div class="edit_value">
							<textarea class="edit_input form-control" id="about_me" name="about_me"><?php echo $about_me; ?></textarea>
						</div>
					</div>
					<input type="submit" class="btn btn-primary my-3" value="Modifica profilo">
			   </form>
			   <small class="text-danger">(*) Campi a compilazione obbligatoria</small><br>
			   <small class="text-warning">(**) Campi necessari per effettuare acquisti</small>
			</div>
		</div>
		<script src="/SAW2021-22/scripts/validation/validation.js"></script>
		<script src="/SAW2021-22/scripts/validation/validate_updateprofile.js"></script>
		<?php
			require '../components/popup-box.php';
			require '../components/footer.php';
		?>
	</body>
</html>