<!DOCTYPE html> 
<html lang="it">
	<head>
		<?php 
			require 'components/head.php';
		?>
		<title>Headphone Paradise - Come funziona il sito</title>
	</head>
	<body>
		<?php
			session_start();
			require 'components/navbar.php';
		?>
		<div class="info-page">
			<img src="images/howitworks.jpg" alt="howitworks">
			<h2>Come funziona il sito</h2>
			<ul>
				<li>Se vuoi utilizzare i nostri servizi dovrai autenticarti. Se non hai ancora un account ne puoi registrare
				uno andando su "Ciao, visitatore!" -> "Registrati". Ti verranno richiesti i dati essenziali, ossia
				nome, cognome, email e password ripetuta due volte.</li>
				<li>Una volta registrato potrai autenticarti andando su "Ciao, visitatore!" -> "Accedi" dove basterà inserire
				email e passowrd fornite precedentemente.</li>
				<li>Una volta autenticato potrai cliccare sul tuo nome utente seguito da "Il tuo account", dove potrai 
				modificare i dati precedentemente inseriti e aggiungere nuove informazioni, tra cui quelle di località e pagamento.</li>
				<li>Hai a disposizione nel menù la sezione "Esplora catalogo" se vuoi semplicemente visualizzare i nostri prodotti, 
				oppure la barra di Ricerca se vuoi qualcosa di più specifico. Nota che vicino alla barra di
				Ricerca, è disponibile la Ricerca Avanzata, dove potrai filtrare i prodotti per produttore o fascia di prezzo.</li>
				<li>Per ogni prodotto potrai visualizzare il nome, un'immagine, il nome della casa produttrice e le 
				caratteristiche tecniche cliccando su di esso. Se hai intenzione di comprarlo dovrai premere "Aggiungi al carrello". 
				<b>Attenzione!</b> Questa funzionalità è disponibile solo per utenti autenticati.</li>
				<li>Se vuoi confermare i tuoi acquisti vai sul tuo nome utente e infine "Carrello". Lì troverai i prodotti 
				che hai inserito. Se vuoi rimuovere qualche prodotto o modificarne la quantità lo potrai fare da lì, 
				altrimenti premi su "Conferma acquisti" e attendi l'arrivo del tuo ordine.</li>
				<li>Una volta conclusi gli acquisti potrai decidere di esplorare ancora il catalogo oppure uscire dal sito 
				andando sul tuo nome utente e infine "Logout". Ti ringraziamo per aver utilizzato i nostri servizi! :)</li>
			</ul>
		</div>
		<?php
			require 'components/popup-box.php';
			require 'components/footer.php';
		?>
	</body>
</html>