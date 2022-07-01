<?php
	session_start();
	
	require '../../connessione.php';
	include 'message_box.php';
	
	if(!isset($_SESSION['Login'])){
		echo "Devi autenticarti se vuoi utilizzare questa funzionalità!";
		exit();
	}
	
	$prodotto = trim($_GET['prod']);
	$quantita = trim($_GET['quantity']);
	$utente = $_SESSION['Login'];
	
	if($quantita <= 0){
		echo "Non puoi inserire una quantità nulla o negativa.";
		exit();
	}
			
	$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE id = ?");
	mysqli_stmt_bind_param($stmt, 'i', $prodotto);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$rowcount = mysqli_num_rows($res);
	$row = mysqli_fetch_array($res);
	
	$disponibilita = $row['disponibilita'];
	if($quantita > $disponibilita){
		echo "Hai inserito una quantità troppo grande rispetto alla disponibilità.";
		exit();
	}
	
	$stmt = mysqli_prepare($con, "UPDATE buy SET quantita = ? WHERE utente = ? AND prodotto = ?");
	mysqli_stmt_bind_param($stmt, 'iii', $quantita, $utente, $prodotto);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$num = mysqli_affected_rows($con);

	if($num != 1){
		echo "Problema di aggiornamento, riprova più tardi.";
		exit();
	}
	echo "Quantità aggiornata con successo!";
	exit();
?>