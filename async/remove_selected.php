<?php
	session_start();
	
	require '../../connessione.php';
	include 'message_box.php';
	
	if(!isset($_SESSION['Login'])){
		echo "Devi autenticarti se vuoi utilizzare questa funzionalità!";
		exit();
	}
	
	$prodotto = trim($_GET['prod']);
	$utente = $_SESSION['Login'];
			
	$stmt = mysqli_prepare($con, "DELETE FROM buy WHERE utente = ? AND prodotto = ?");
	mysqli_stmt_bind_param($stmt, 'ii', $utente, $prodotto);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$num = mysqli_affected_rows($con);
	
	if($num != 1){
		echo "Problema di rimozione, riprova più tardi.";
		exit();
	}
	echo "Elemento rimosso con successo!";	
	exit();
?>