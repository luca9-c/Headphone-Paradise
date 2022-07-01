# Headphone-Paradise
Archivio del progetto di Sviluppo di Applicazioni Web per l'A.A. 2021/2022 del corso di laurea triennale in Informatica, UniGe.
La specifica richiedeva di sviluppare un sito web a supporto di una (ipotetica) startup con tema a propria scelta. Nel mio caso la scelta è stata quella di sviluppare un e-commerce che vende cuffie, con la premessa che sono sempre più diffuse, specialmente a causa del Covid e la conseguente diffusione del lavoro da remoto. 
Il sito ha le seguenti funzionalità: 

- Una home page e altre pagine di presentazione/vetrina
- Un form di login e registrazione, dove ci si registra con nome, cognome, email e password inserita due volte
- Un form di modifica del profilo utente (dove è possibile inserire alcune informazioni aggiuntive) e di modifica della password
- Una ricerca sia di base che avanzata (produttore e fascia di prezzo) dei prodotti 
- Un catalogo dove è possibile visualizzare le informazioni di ogni prodotto e aggungerli al carrello 
- Un carrello della spesa dove è possibile aggiungere, rimuovere e modificare le quantità dei prodotti 

Il sito è un "giocattolo", di conseguenza se si conferma l'acquisto, viene semplicemente svuotato il carrello. 
Esso ha le seguenti specifiche tecniche:

- HTML5 e CSS3 con framework Bootstrap per quanto riguarda l'aspetto del sito 
- Design responsive ottimizzato specialmente per smartphone, utilizzando soprattutto media query
- Javascript per le chiamate AJAX a correzione dell'input dell'utente e per rendere immediato l'utilizzo del carrello senza dover ricaricare la pagina, per il popup box a supporto dei prodotti e la ricerca avanzata 
- PHP per il lato server, quindi costruzione delle pagine, gestione sessioni, input utente, chiamate al database, generazione pagine dinamiche, ecc. 
- MySQL come database nel suo fork MariaDB
