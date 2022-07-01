<?php
	session_start();
	
	require '../../connessione.php';
	include 'message_box.php';
	
	$id = trim($_GET['id']);
	$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE id = ?");
	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$rowcount = mysqli_num_rows($res);
	
	if($rowcount != 1){
		message_box("Si è verificato un problema, il prodotto selezionato potrebbe non esistere più.");
		exit();
	}
	
	$row = mysqli_fetch_array($res);

	$immagine = $row['immagine'];
	$marca = $row['marca'];
	$produttore = $row['produttore'];
	$modello = $row['modello'];
	$dimensioni = $row['dimensioni'];
	$anno = $row['anno'];
	$microfono = ($row['microfono'] == 1)? "sì" : "no";
	$connettori = $row['connettori'];
	$peso = $row['peso'];
	
	echo 
	"<div class='popup-content'>
		<img src='images/products/$immagine' id='prod-img' class='shadow'>
		<table class='prod_details mt-3'>
			<tr>
				<td><p><b>Marca</b></p></td>
				<td><p>$marca</p></td>
			</tr>
			<tr>
				<td><p><b>Produttore</b></p></td>
				<td><p>$produttore</p></td>
			</tr>
			<tr>
				<td><p><b>Modello</b></p></td>
				<td><p>$modello</p></td>
			</tr>
			<tr>
				<td><p><b>Dimensioni</b></p></td>
				<td><p>$dimensioni</p></td>
			</tr>
			<tr>
				<td><p><b>Anno di produzione</b></p></td>
				<td><p>$anno</p></td>
			</tr>
			<tr>
				<td><p><b>Microfono incluso?</b></p></td>
				<td><p>$microfono</p></td>
			</tr>
			<tr>
				<td><p><b>Tipo connettori</b></p></td>
				<td><p>$connettori</p></td>
			</tr>
			<tr>
				<td><p><b>Peso (in grammi)</b></p></td>
				<td><p>$peso</p></td>
			</tr>
		</table>
		<button type='button' onclick='close_box()' class='btn btn-secondary mt-3'>Chiudi</button>
	</div>";
?>