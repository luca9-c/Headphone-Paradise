<!DOCTYPE html> 
<html lang="it">
	<head>
		<?php 
			require 'components/head.php';
		?>
		<title>Headphone Paradise - Chi siamo</title>
	</head>
	<body>
		<?php
			session_start();
			require 'components/navbar.php';
		?>
		<div class="info-page">
			<img src="images/puggia.jpg" alt="sede_puggia">
			<h2>Chi siamo</h2>
			<p>Siamo una startup nata nel 2022 all'Università di Genova nell'ambito del progetto StartSAW, con 
			lo scopo di fornire un servizio per tutti coloro che hanno bisogno di cuffie indipendentemente dal motivo per 
			cui vengono usate, che sia per lavoro, svago oppure studio.</p>
			<p>All'interno troverai sia cuffie di grandi marchi ma anche di nicchie più piccole, per cui 
			promuoviamo sempre nuovi prodotti.</p>
			<p>Essendo il nostro scopo quello di acconentare ogni cliente, il sito non avrà come scopo solo quello di vendta 
			e promozione, ma bensì anche quello di community, grazie alle possibilità futura di inserire recensioni, parlare
			di prodotti ed effettuare richieste.</p>
			<p>Speriamo che il nostro servizio sia di vostro gradimento!</p>
		</div>
		<?php
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>