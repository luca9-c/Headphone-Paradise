<div class="dropdown">
	<a class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown">
		Ciao, <?php echo $_SESSION['Firstname']; ?>!
	</a>
	<ul class="dropdown-menu">
		<li>
			<a class="dropdown-item" href="/SAW2021-22/action/show_profile.php">Il tuo account</a>
		</li>
		<li>
			<a class="dropdown-item" href="/SAW2021-22/manage_cart.php">Carrello</a>
		</li>
        <li>
			<a class="dropdown-item" href="/SAW2021-22/logout.php">Esci dal sito</a>
		</li>
	</ul>
</div>