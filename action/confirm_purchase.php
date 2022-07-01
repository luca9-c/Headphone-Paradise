<!DOCTYPE html>
<html lang="it">
    <head>
        <?php 
            require '../components/head.php';
        ?>
        <title>Headphone Paradise - Conferma acquisto</title>
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
			
			$id_utente = $_SESSION['Login'];
			$stmt = mysqli_prepare($con, "SELECT city, address, credit_card, account_number FROM user WHERE id = '$id_utente'");
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);
			if($rowcount != 1){
                errore("Non siamo riusciti a recuperare i tuoi dati, riprova più tardi.", "../index.php");
                exit();
            }
			
			$row = mysqli_fetch_array($res);
			$city = $row['city'];
			$address = $row['address'];
			$credit_card = $row['credit_card'];
			$account_number = $row['account_number'];
			if(empty($city) || empty($address) || empty($credit_card) || empty($account_number)){
				errore("Devi inserire le informazioni di località e pagamento prima di procedere all'acquisto.", "show_profile.php");
				exit();
			}
			
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			mysqli_query($con, "LOCK TABLES headphone WRITE;");
			mysqli_autocommit($con, false);
			
			try {
				$stmt = mysqli_prepare($con, "SELECT * FROM buy JOIN headphone ON 
						buy.prodotto = headphone.id WHERE utente = '$id_utente'");
				mysqli_stmt_execute($stmt);
				$res = mysqli_stmt_get_result($stmt);
				$rowcount = mysqli_num_rows($res);
				
				if($rowcount == 0){
					mysqli_rollback($con);
					errore("Il carrello risulta vuoto.", "../manage_cart.php");
					exit();
				}
				
				for($i = 0; $i < $rowcount; $i++){
					$row = mysqli_fetch_array($res);
					$prodotto = $row['prodotto'];
					$quantita = $row['quantita'];
					$disponibilita = $row['disponibilita'];
					
					if($quantita > $disponibilita){
						mysqli_rollback($con);
						errore("Alcuni prodotti o quantità desiderate non sono più disponibili.", "../manage_cart.php");
						exit();
					}
					
					$stmt = mysqli_prepare($con, "UPDATE headphone SET disponibilita = disponibilita - ? WHERE id = ?");
					mysqli_stmt_bind_param($stmt, 'ii', $quantita, $prodotto);
					mysqli_stmt_execute($stmt);
					$res_aux = mysqli_stmt_get_result($stmt);
					$num_aux = mysqli_affected_rows($con);

					if($num_aux != 1){
						mysqli_rollback($con);
						errore("Si è verificato un problema, riprova più tardi.", "../manage_cart.php");
						exit();
					}
				}
				mysqli_autocommit($con, true);

			} 
			catch (mysqli_sql_exception $exception){
				mysqli_rollback($con);
				errore("Si è verificato un problema, riprova più tardi.", "../manage_cart.php");
				throw $exception;
			}
			mysqli_query($con, "UNLOCK TABLES;");
			
			$stmt = mysqli_prepare($con, "DELETE FROM buy WHERE utente = ?");
			mysqli_stmt_bind_param($stmt, 'i', $id_utente);
			mysqli_stmt_execute($stmt);
			$res = mysqli_stmt_get_result($stmt);
			$num = mysqli_affected_rows($con);

			if($num == 0){
				errore("Si è verificato un problema, riprova più tardi.", "../manage_cart.php");
				exit();
			}
			ok("Grazie per aver acquistato!", "../index.php");
			
			mysqli_close($con);
			require '../components/footer.php';
		?>
    </body>
</html>