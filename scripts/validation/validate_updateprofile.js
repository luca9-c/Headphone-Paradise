function validateCityAddress(city, address){
	var err = false; 
	if((city != "" && address == "") || (city == "" && address != "")){
		document.getElementById("cityhelp").innerHTML = "Città e indirizzo vanno inserite insieme!";
		document.getElementById("cityhelp").hidden = false;
		document.getElementById("addresshelp").innerHTML = "Città e indirizzo vanno inserite insieme!";
		document.getElementById("addresshelp").hidden = false;
		err = true;
	}
	else{
		document.getElementById("cityhelp").innerHTML = "";
		document.getElementById("cityhelp").hidden = true;
		document.getElementById("addresshelp").innerHTML = "";
		document.getElementById("addresshelp").hidden = true;
	}
	return err;
}

function validateCreditCardAccountNumber(credit_card, account_number){
	var err = false;
	if ((credit_card == "Mastercard" || credit_card == "Visa") && account_number == "") {
		document.getElementById("accountnumberhelp").innerHTML = "Va specificato un numero di conto corrente insieme al metodo di pagamento";
		document.getElementById("accountnumberhelp").hidden = false;
		err = true;
	}
	else if(account_number != ""){
		if (account_number.length != 16) {
			document.getElementById("accountnumberhelp").innerHTML = "Il conto corrente contiene 16 caratteri";
			document.getElementById("accountnumberhelp").hidden = false;
			err = true;
		}
		else if (!account_number.match(/^[0-9]*$/)) {
			document.getElementById("accountnumberhelp").innerHTML = "Il conto corrente contiene solo numeri";
			document.getElementById("accountnumberhelp").hidden = false;
			err = true;
		}
		else if (credit_card == "") {
			document.getElementById("accountnumberhelp").innerHTML = "Devi selezionare una carta se vuoi inserire il conto corrente.";
			document.getElementById("accountnumberhelp").hidden = false;
			err = true;
		}
	}
	else{
		document.getElementById("accountnumberhelp").innerHTML = "";
		document.getElementById("accountnumberhelp").hidden = true;
	}
	return err;
}

function validateUpdateProfile() {
    var firstname = document.forms["show_profile"]["firstname"].value;
    var lastname = document.forms["show_profile"]["lastname"].value;
    var email = document.forms["show_profile"]["email"].value;
	var city = document.forms["show_profile"]["city"].value; 
	var address = document.forms["show_profile"]["address"].value; 
	var credit_card = document.forms["show_profile"]["credit_card"].value; 
	var account_number = document.forms["show_profile"]["account_number"].value; 
  
    var err_first = validateFirstName(firstname);
    var err_last = validateLastName(lastname); 
    var err_email = validateEmail(email);
	var err_city_address = validateCityAddress(city, address);
	var err_credit_account = validateCreditCardAccountNumber(credit_card, account_number);
  
    return (err_first || err_last || err_email || err_city_address || err_credit_account)? false : true;
}

function checkEmailUpdate() {
	var email = document.forms["show_profile"]["email"].value;
    if(email == "") {
	    document.getElementById("emailhelp").innerHTML = "";
	    return;
    }
    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	    if(this.readyState == 4 && this.status == 200) {
			if(this.responseText == "ok"){
				document.getElementById("emailhelp").innerHTML = "Questa mail è già in uso da un altro utente o potrebbe essere la tua";
				document.getElementById("emailhelp").hidden = false;
			}
			else{
				document.getElementById("emailhelp").innerHTML = "";
				document.getElementById("emailhelp").hidden = true;
			}
		}
	}
	xmlhttp.open("GET", "/SAW2021-22/async/check_email.php?email="+email, true);
	xmlhttp.send();
}