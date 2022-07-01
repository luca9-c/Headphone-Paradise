<!DOCTYPE html> 
<html lang="it">
	<head>
		<?php 
			require 'components/head.php';
		?>
		<title>Headphone Paradise - Risultati della ricerca</title>
		<link rel="stylesheet" type="text/css" href="/SAW2021-22/style/products.css">
	</head>
	<body>
		<?php
			session_start();
			
			require 'components/navbar.php';
			require '../connessione.php';
			
			$search = !empty($_GET['search'])? ("%" . trim($_GET['search']) . "%") : null;
			$prod = !empty($_GET['produttore'])? trim($_GET['produttore']) : null;
			$min = $max = null;
			
			if(!empty($_GET['prezzo']))
			{
				if($_GET['prezzo'] == 1)
				{
					$min = 0.01;
					$max = 20.00;
				}
				if($_GET['prezzo'] == 2)
				{
					$min = 20.00;
					$max = 50.00;
				}
				if($_GET['prezzo'] == 3)
				{
					$min = 50.00;
					$max = 100.00;
				}
				if($_GET['prezzo'] == 4)
				{
					$min = 100.00;
				}
			}
			
			if(!isset($search) && !isset($prod) && !isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone");
			}
			if(isset($search) && !isset($prod) && !isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE nome LIKE ?");
				mysqli_stmt_bind_param($stmt, 's', $search);
			}
			if(!isset($search) && isset($prod) && !isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE produttore = ?");
				mysqli_stmt_bind_param($stmt, 's', $prod);
			}
			if(!isset($search) && !isset($prod) && isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE prezzo >= ?");
				mysqli_stmt_bind_param($stmt, 'd', $min);
			}
			if(isset($search) && isset($prod) && !isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE nome LIKE ? AND produttore = ?");
				mysqli_stmt_bind_param($stmt, 'ss', $search, $prod);
			}
			if(!isset($search) && isset($prod) && isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE produttore = ? AND prezzo >= ?");
				mysqli_stmt_bind_param($stmt, 'sd', $search, $min);
			}
			if(!isset($search) && !isset($prod) && isset($min) && isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE prezzo BETWEEN ? AND ?");
				mysqli_stmt_bind_param($stmt, 'dd', $min, $max);
			}
			if(isset($search) && isset($prod) && isset($min) && !isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE nome LIKE ? AND produttore = ? AND prezzo >= ?");
				mysqli_stmt_bind_param($stmt, 'ssd', $search, $prod, $min);
			}
			if(!isset($search) && isset($prod) && isset($min) && isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE produttore = ? AND prezzo BETWEEN ? AND ?");
				mysqli_stmt_bind_param($stmt, 'sdd', $prod, $min, $max);
			}
			if(isset($search) && !isset($prod) && isset($min) && isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE nome LIKE ? AND prezzo BETWEEN ? AND ?");
				mysqli_stmt_bind_param($stmt, 'sdd', $search, $min, $max);
			}
			if(isset($search) && isset($prod) && isset($min) && isset($max)){
				$stmt = mysqli_prepare($con, "SELECT * FROM headphone WHERE nome LIKE ? AND produttore = ? AND prezzo BETWEEN ? AND ?");
				mysqli_stmt_bind_param($stmt, 'ssdd', $search, $prod, $min, $max);
			}
			
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $rowcount = mysqli_num_rows($res);
			
			if($rowcount == 0)
				echo "<h3 class='display-5 text-center'>La ricerca non ha prodotto risultati</h3>";
			else
				echo "<h3 class='display-5 text-center'>La ricerca ha prodotto $rowcount risultati</h3>";
			
			echo "<div class='container my-5'>
					<div class='row'>";
					for($i = 0; $i < $rowcount; $i++)
					{					
						$row = mysqli_fetch_array($res);
						$id = $row['id'];
						$immagine = $row['immagine'];
						$nome = $row['nome'];
						$prezzo = $row['prezzo'];
						echo 
						"<div class='col-md-3 mt-2'>
							<div class='card'>
								<img src='images/products/$immagine' class='img-fluid' alt='$nome'> 
								<div class='card-body text-center'>
									<h6><a href='#' onclick='view_details($id)'>$nome</a></h6>
									<h3>$prezzo €</h3>
									<button type='button' class='btn bg-cart' onclick='add_to_cart($id)'>Aggiungi al carrello</button>
								</div>
							</div>
						</div>";
					}
				echo "</div>
				</div>";
		
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>