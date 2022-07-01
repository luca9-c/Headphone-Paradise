<?php
	session_start();
	
	require '../../connessione.php';
	include 'message_box.php';
	
	if((!isset($_SESSION["Login"])) || (!isset($_SESSION["Firstname"])) || (!isset($_SESSION["Lastname"]))){
		message_box("Devi <a href='signin.php'>autenticarti</a> se vuoi utilizzare questa funzionalità!");
		exit();
	}
	
	$id_user = $_SESSION['Login'];
	$id_prod = trim($_GET['id']);
	
	$stmt = mysqli_prepare($con, "SELECT * FROM buy WHERE utente = ? AND prodotto = ?");
	mysqli_stmt_bind_param($stmt, 'ii', $id_user, $id_prod);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$rowcount = mysqli_num_rows($res);

	if($rowcount == 1){
		message_box("Questo prodotto è già presente nel tuo <a href='manage_cart.php'>carrello</a>, vai lì se vuoi gestirlo.");
		exit();
	}
	
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
	
	if($disponibilita == 0){
		message_box("Il prodotto non è più disponibile, riprova più tardi.");
		exit();
	}
	echo 
	"<div class='popup-content'>
		<p><b>Disponibilità:</b> $disponibilita</p>
		<p>Seleziona la quantità</p>
		<input type='number' class='form-control text-center number' id='quantity' min='1' max='$disponibilita' value='1'>
		<div>
			<button type='button' class='btn bg-cart mt-3' onclick='confirm_add($id_prod, quantity.value)'>Conferma</button>
			<button type='button' onclick='close_box()' class='btn btn-secondary mt-3'>Chiudi</button>
		</div>
	</div>
	";
?>