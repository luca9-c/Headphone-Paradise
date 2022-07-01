<?php
	session_start();
	
	require '../../connessione.php';
	include 'message_box.php';
	
	if(!isset($_SESSION['Login'])){
		message_box("Devi autenticarti se vuoi utilizzare questa funzionalità!");
		exit();
	}
	
	$id_prod = trim($_GET['id']);
	$quantita = trim($_GET['val']);
	
	$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE id = ?");
	mysqli_stmt_bind_param($stmt, 'i', $id_prod);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$rowcount = mysqli_num_rows($res);
	
	if($rowcount != 1){
		message_box("Si è verificato un problema, il prodotto selezionato potrebbe non esistere più.");
		exit();
	}
	
	$row = mysqli_fetch_array($res);
	$disponibilita = $row['disponibilita'];
	
	if($quantita <= 0){
		message_box("Non puoi inserire una quantità nulla o negativa.");
		exit();
	}
	if($disponibilita == 0 || $quantita > $disponibilita){
		message_box("Il prodotto non è disponibile nelle quantità desiderate, riprova più tardi.");
		exit();
	}
	
	$id_utente = $_SESSION['Login'];
	$stmt = mysqli_prepare($con, "INSERT INTO buy (utente, prodotto, quantita) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iii', $id_utente, $id_prod, $quantita);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $num = mysqli_affected_rows($con);
	
	if($num != 1){
		message_box("Si è verificato un problema nell'aggiunta al carrello del prodotto, riprova più tardi.");
		exit();
	}
	message_box("Prodotto aggiunto al carrello con successo!");
?>