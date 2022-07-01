<!DOCTYPE html>
<html lang="it">
    <head>
        <?php 
            require '../components/head.php';
        ?>
        <title>Headphone Paradise - Login</title>
    </head>
    <body>
        <?php 
            session_start();

			require '../components/navbar.php';
            require '../../connessione.php';
            include '../display_message.php';
			
			if(isset($_SESSION['Login']) || isset($_SESSION['Firstname']) || isset($_SESSION['Lastname'])){
				errore("Non sei autorizzato a visualizzare questa pagina", "../index.php");
				exit();
			}

            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            
            if(empty($email) || empty($pass)){
                errore("Alcuni dati non sono stati inseriti.", "../signin.php");
                exit();
            }      
            if(!preg_match("/^[\w]*[@][\w]*[.][\w]*$/", $email)){
                errore("Hai inserito una mail non valida.", "../signin.php");
                exit();
            }

            $stmt = mysqli_prepare($con, "SELECT id, firstname, lastname, email, pass FROM user WHERE email = ?");
			mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);

            if($rowcount != 1){
                errore("L'utente che hai inserito non esiste.", "../signin.php");
                exit();
            }
            if(strlen($pass) < 8){
                errore("Password troppo corta, devi inserire almeno 8 caratteri.", "../signin.php");
                exit();
            }

            $row = mysqli_fetch_array($res);
            if($row['email'] != $email OR !password_verify($pass, $row['pass'])){
                errore("La password inserita è errata.", "../signin.php");
                exit();
            }
			
            $_SESSION["Login"] = $row['id'];
			$_SESSION["Firstname"] = $row['firstname'];
			$_SESSION["Lastname"] = $row['lastname'];
			
			ok("Connesso! Ora verrai reindirizzato alla home page.", "../index.php");
			
            mysqli_free_result($res);
            mysqli_close($con);
			require '../components/footer.php';
        ?> 
    </body>
</html>