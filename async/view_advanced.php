<?php
	require '../../connessione.php';
	
	$prod = mysqli_prepare($con, 'SELECT DISTINCT produttore FROM headphone');
	mysqli_stmt_execute($prod);
    $result = mysqli_stmt_get_result($prod);
    $rows = mysqli_num_rows($result);
?>
<form class="popup-content" action="/SAW2021-22/results.php" method="GET">
	<div class="my-3">
		<label for="search">Cerca</label>
		<input name="search" class="form-control my-1" type="search" placeholder="Nome prodotto">
	</div>
	<div class="my-3">
		<label for="produttore">Produttore</label>
		<select class="form-select my-1" name="produttore">
			<option selected></option>
			<?php
				for($i = 0; $i < $rows; $i++)
				{					
					$r = mysqli_fetch_array($result);
					$produttore = $r['produttore'];
					echo "<option value='$produttore'>$produttore</option>";
				}
			?>
		</select>
	</div>
	<div class="my-3">
		<label for="prezzo">Fascia di prezzo</label>
		<select class="form-select my-1" name="prezzo">
		  <option selected></option>
		  <option value="1">meno di 20€</option>
		  <option value="2">20€ - 50€ </option>
		  <option value="3">50€ - 100€</option>
		  <option value="4">più di 100€</option>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Cerca</button>
	<button type='button' onclick='close_box()' class='btn btn-secondary'>Chiudi</button>
	</div>
</form>