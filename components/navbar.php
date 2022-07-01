<nav class="navbar navbar-expand-lg navbar-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">
			<img src="/SAW2021-22/images/hplogos.png" alt="Headphone Master Logo">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li>
					<a class="nav-link" href="/SAW2021-22/index.php">Home</a>
				</li>
				<li>
					<a class="nav-link" href="/SAW2021-22/about.php">Chi siamo</a>
				</li>
				<li>
					<a class="nav-link" href="/SAW2021-22/howitworks.php">Come funziona</a>
				</li>
				<li>
					<a class="nav-link" href="/SAW2021-22/results.php">Esplora catalogo</a>
				</li>
			</ul>
			<div class="dropdown">
				<a class="btn btn-outline-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown">
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="dropdown-item" onclick='view_advanced()'>Ricerca avanzata</a>
					</li>
				</ul>
			</div>
			<form class="d-flex" action="/SAW2021-22/results.php" method="GET">
				<div>
					<input name="search" class="form-control me-2" type="search" placeholder="Trova il tuo prodotto...">				
				</div>
				<button class="btn btn-outline-primary" type="submit">Cerca</button>
			</form>
			<?php
				if((isset($_SESSION["Login"])) || (isset($_SESSION["Firstname"])) || (isset($_SESSION["Lastname"])))
					include('navbar_logged.php');
				else
					include('navbar_default.php');
			?>
		</div>
	</div>
</nav>