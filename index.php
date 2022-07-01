<!DOCTYPE html> 
<html lang="it">
	<head>
		<?php 
			require 'components/head.php';
		?>
		<link rel="stylesheet" type="text/css" href="/SAW2021-22/style/index.css">
		<title>Headphone Paradise - Il tuo negozio di cuffie!</title>
	</head>
	<body>
		<?php
			session_start();
			require 'components/navbar.php';
		?>
		<article>
			<div id="HPSitePresentation" class="carousel slide" data-bs-ride="carousel">
			  <div class="carousel-indicators">
				<button type="button" data-bs-target="#HPSitePresentation" data-bs-slide-to="0" class="active"></button>
				<button type="button" data-bs-target="#HPSitePresentation" data-bs-slide-to="1"></button>
				<button type="button" data-bs-target="#HPSitePresentation" data-bs-slide-to="2"></button>
			  </div>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="images/presentation_image1.jpg" class="d-block w-100" alt="Immagine di benvenuto 1" >
				  <div class="carousel-caption d-md-block">
					<h4><b>Benvenuto su Headphone Paradise!</b></h4>
					<p>Visita il nostro catalogo e scegli il prodotto adatto a te. Dai inoltre un'occhiata agli sconti tutt'ora in corso
					e segui le nostre promozioni!</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="images/presentation_image2.jpg" class="d-block w-100" alt="Immagine di benvenuto 2" >
				  <div class="carousel-caption d-md-block">
					<h4><b>Tanti tipi di cuffie per ogni tipo di uso</b></h4>
					<p>Che tu voglia solo ascoltare musica oppure guardare film, giocare con i videogiochi o tenere videoconferenze, 
					i nostri prodotti sapranno accontentare ogni tipo di esigenza.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="images/presentation_image3.jpg" class="d-block w-100" alt="Immagine di benvenuto 3" >
				  <div class="carousel-caption d-md-block">
					<h4><b>Unisciti alla community</b></h4>
					<p>Il nostro sito è anche una community di utenti appassionati che potrai conoscere attraverso le recensioni dei prodotti.</p>
				  </div>
				</div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#HPSitePresentation" data-bs-slide="prev">
				<span class="carousel-control-prev-icon"></span>
				<span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#HPSitePresentation" data-bs-slide="next">
				<span class="carousel-control-next-icon"></span>
				<span class="visually-hidden">Next</span>
			  </button>
			</div>		
			<div class="presentation_cards mx-auto">
				<div class="mycolumn">
					<div class="index_card">
						<h3>Anche su richiesta</h3>
						<p>Se non trovi il prodotto 
						adatto a te faccelo sapere! Faremo sì che sia disponibile nel nostro catalogo e disponibile alla 
						nostra community di appassionati.</p>
					</div>
				</div>
				<div class="mycolumn">
					<div class="index_card">
						<h3>Costi di spedizione</h3>
						<p>Per prodotti spediti all'interno del territorio italiano la spedizione è di soli 15€ ma potrai avere 
						diritto ad una spedizione gratuita ogni tre acquisti effettuati.</p>
					</div>
				</div>
				<div class="mycolumn">
					<div class="index_card">
						<h3>Pagamenti in sicurezza</h3>
						<p>Potrai scegliere tra diversi sistemi di pagamento e assicuriamo assoluta sicurezza nelle transazioni.</p>
					</div>
				</div>
			</div>
		</article>
		<?php
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>