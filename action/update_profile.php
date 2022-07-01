<!DOCTYPE html>
<html lang="it">
    <head>
        <?php 
            require '../components/head.php';
        ?>
        <title>Headphone Paradise - Il tuo account - Modifica profilo</title>
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

            $firstname = trim($_POST['firstname']); 
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
			
			$city = trim($_POST['city']); 
			$address = trim($_POST['address']);
			$credit_card = trim($_POST['credit_card']);
			$account_number = trim($_POST['account_number']);
            $about_me = trim($_POST['about_me']);
            
            
            if(empty($firstname) || empty($lastname) || empty($email)){
                errore("Alcuni dati non sono stati inseriti.", "show_profile.php");
                exit();
            }      
            if(!preg_match("/^[A-Z][A-Za-z'èùàòéì ]*$/", $firstname) || !preg_match("/^[A-Z][A-Za-z'èùàòéì ]*$/", $lastname)) {
                errore("Nome e cognome devono cominciare con una lettera maiuscola e contenere solo lettere, apostrofi e spazi.", "show_profile.php");
                exit();
            }
            if(!preg_match("/^[\w]*[@][\w]*[.][\w]*$/", $email)){
                errore("Hai inserito una mail non valida.", "show_profile.php");
                exit();
            }
			if((empty($city) && !empty($address)) || (!empty($city) && empty($address))){
				errore("Città e indirizzo devono essere inseriti insieme se specificati.", "show_profile.php");
                exit();
			}
			if($credit_card != "Mastercard" && $credit_card != "Visa" && !empty($credit_card)){
				errore("Abbiamo rilevato un metodo di pagamento non previsto.", "show_profile.php");
                exit();
			}
			if(($credit_card == "Mastercard" || $credit_card == "Visa") && empty($account_number)){
				errore("Va specificato un numero di conto corrente insieme al metodo di pagamento.", "show_profile.php");
                exit();
			}
			if(!empty($account_number)){
				if(strlen($account_number) != 16){
					errore("Il conto corrente contiene 16 caratteri.", "show_profile.php");
					exit();
				}
				if(!preg_match("/^[0-9]*$/", $account_number)){
					errore("Il conto corrente contiene solo numeri.", "show_profile.php");
					exit();
				}
				if(empty($credit_card)){
					errore("Devi selezionare un tipo di carta se vuoi inserire il conto corrente.", "show_profile.php");
					exit();
				}
			}

            $id = $_SESSION['Login'];
            $stmt = mysqli_prepare($con, "UPDATE user SET firstname = ?, lastname = ?, email = ?, city = ?, address = ?, credit_card = ?, account_number = ?, about_me = ? WHERE id = '$id'");
            mysqli_stmt_bind_param($stmt, 'ssssssss', $firstname, $lastname, $email, $city, $address, $credit_card, $account_number, $about_me);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $num = mysqli_affected_rows($con);

            if($num != 1){
                errore("Problema di aggiornamento, riprova più tardi.", "show_profile.php");
                exit();
            }
			ok("Profilo modificato con successo!", "show_profile.php");
            
            mysqli_close($con);
            require '../components/footer.php';
        ?>   
    </body>
</html>