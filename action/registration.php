<!DOCTYPE html>
<html lang="it">
    <head>
        <?php 
            require '../components/head.php';
        ?>
        <title>Headphone Paradise - Registrazione</title>
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

            $firstname = trim($_POST['firstname']); 
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            $confirm = trim($_POST['confirm']);

            if(empty($firstname) || empty($lastname) || empty($email) || empty($pass) || empty($confirm)){
                errore("Alcuni dati non sono stati inseriti.", "../signup.php");
                exit();
            }      
            if(!preg_match("/^[A-Z][A-Za-z'èùàòéì ]*$/", $firstname) || !preg_match("/^[A-Z][A-Za-z'èùàòéì ]*$/", $lastname)) {
                errore("Nome e cognome devono iniziare con una lettera maiuscola e contenere solo lettere, apostrofi e spazi.", "../signup.php");
                exit();
            }
            if(!preg_match("/^[\w]*[@][\w]*[.][\w]*$/", $email)){
                errore("Hai inserito una mail non valida.", "../signup.php");
                exit();
            }

            $stmt = mysqli_prepare($con, "SELECT * FROM user WHERE email = ?");
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);

            if($rowcount != 0){
                errore("Hai inserito una mail gia in uso.", "../signup.php");
                exit();
            }
            if($pass != $confirm){
                errore("Le due password inserite non coincidono.", "../signup.php");
                exit();
            }
            if(strlen($pass) < 8){
                errore("Password troppo corta, devi inserire almeno 8 caratteri.", "../signup.php");
                exit();
            }

            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($con, "INSERT INTO user (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $pass);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $num = mysqli_affected_rows($con);

            if($num != 1){
                errore("Problema di inserimento, riprova più tardi.", "../signup.php");
                exit();
            }
			
			ok("Registrato! Ora puoi connetterti al sito.", "../index.php");
            
            mysqli_close($con);
            require '../components/footer.php';
        ?>
    </body>
</html>