<!DOCTYPE html>
<html lang="it">
	<head>
        <?php 
            require 'components/head.php';
        ?>
		<title>Headphone Paradise - Il tuo carrello</title>
		<link rel="stylesheet" type="text/css" href="/SAW2021-22/style/products.css">
	</head>
	<body>
		<?php 
			session_start();

			require 'components/navbar.php';
            require '../connessione.php';
            include 'display_message.php';

			if((!isset($_SESSION["Login"])) || (!isset($_SESSION["Firstname"])) || (!isset($_SESSION["Lastname"]))){
                errore("Non sei autorizzato a visualizzare questa pagina.", "index.php");
                exit();
			}
			$id_utente = $_SESSION['Login'];
			$stmt = mysqli_prepare($con, "SELECT * FROM buy JOIN headphone ON 
				buy.prodotto = headphone.id WHERE utente = '$id_utente'");
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);
		?>
		<div class='container'>
			<div class='col-lg-12'>
				<h3 class='display-5 text-center'>Il tuo carrello</h3>
				<p class='mb-5 text-center'>
					<i class='text-info' id='no_product'>
						<?php echo $rowcount ?>
					</i> 
					prodotti nel tuo carrello
				</p>
				<table class='table table-responsive'>
					<thead>
						<tr>
							<th style='width:60%'>Prodotto</th>
							<th style='width:12%'>Prezzo</th>
							<th style='width:10%'>Quantità</th>
							<th style='width:16%'></th> 
						</tr>
					</thead>
						<tbody>
							<?php
								for($i = 0; $i < $rowcount; $i++)
								{					
									$row = mysqli_fetch_array($res);
									$id_prod = $row['prodotto'];
									$immagine = $row['immagine'];
									$nome = $row['nome'];
									$prezzo = $row['prezzo'];
									$produttore = $row['produttore'];
									$quantita = $row['quantita'];
									$disponibilita = $row['disponibilita'];
									
									echo 
									"<tr id='$id_prod'>
										<td>
											<div class='row'>
												<div class='col-md-3'>
													<img src='images/products/$immagine' alt='$nome' class='img-fluid d-none d-md-block rounded mb-2 shadow'>
												</div>
												<div class='col-md-9'>
													<h4 >$nome</h4>
													<p>$produttore</p>
													<a href='#' onclick='view_details($id_prod)'>Scheda tecnica</a>
													<p  class='color mt-2 text-success'>Disponibilità: <span class='disp'>$disponibilita</span></p>
												</div>
											</div>
										</td>
										<td>
											<span class='prezzo'>$prezzo</span> 
											€
										</td>
										<td>
											<div>
												<input type='number' id='quantita_$id_prod' name='quantita' class='form-control text-center number' min='1' max='$disponibilita' value='$quantita'>
												<input type='hidden' id='old_$id_prod' value='$quantita'>
												<input type='submit' onclick='update($id_prod, quantita_$id_prod.value)' class='update mt-2' value='Aggiorna'>
											</div>
										</td>
										<td>
											<button class='btn btn-danger' onclick='remove($id_prod)'>Rimuovi</button>
										</td>
									</tr>";
								}
							?>
						</tbody>
					</table>
					<h4>Totale spesa:</h4>
					<h1><span id='tot'></span> €</h1>
				</div>
			<div class='row mt-4'>
				<div class='col-sm-6'>
					<a href='action/confirm_purchase.php' id='confirm' role='button' class='btn btn-primary mb-4 btn-lg'>Conferma acquisti</a>
				</div>
			</div>
		</div>
		<script src="/SAW2021-22/scripts/cart.js"></script>
		<?php
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>