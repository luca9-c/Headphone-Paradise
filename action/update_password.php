<!DOCTYPE html>
<html lang="it">
    <head>
        <?php 
            require '../components/head.php';
        ?>
        <title>Headphone Paradise - Il tuo account - Modifica password</title>
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
			
			$old_pass = trim($_POST['old_pass']); 
            $new_pass = trim($_POST['new_pass']);
            $confirm_new = trim($_POST['confirm_new']);
			
            if(empty($old_pass) || empty($new_pass) || empty($confirm_new)){
                errore("Alcuni dati non sono stati inseriti.", "edit_password.php");
                exit();
            } 
			
			$id = $_SESSION['Login'];
            $stmt = mysqli_prepare($con, "SELECT pass FROM user WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);
			
			if($rowcount != 1){
                errore("C'è stato un problema nel recuperare i tuoi dati, riprova più tardi.", "edit_password.php");
                exit();
            }
			
			$row = mysqli_fetch_array($res);
            if(!password_verify($old_pass, $row['pass'])){
                errore("La password inserita è errata.", "edit_password.php");
                exit();
            }
			if($new_pass != $confirm_new){
                errore("Le due password inserite come nuova non coincidono.", "edit_password.php");
                exit();
            }
            if(strlen($new_pass) < 8){
                errore("Nuova password troppo corta, devi inserire almeno 8 caratteri.", "edit_password.php");
                exit();
            }

            $stmt = mysqli_prepare($con, "UPDATE user SET pass = ? WHERE id = ?");
			$new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 'si', $new_pass, $id);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $num = mysqli_affected_rows($con);

            if($num != 1){
                errore("Problema di aggiornamento, riprova più tardi.", "edit_password.php");
                exit();
            }
			ok("Password modificata con successo!", "edit_password.php");
            
            mysqli_close($con);
            require '../components/footer.php';
        ?> 
    </body>
</html>