function validateFirstName(firstname){
	var err = false;
	if (firstname == "") {
		document.getElementById("firstnamehelp").innerHTML = "Il campo è obbligatorio";
		document.getElementById("firstnamehelp").hidden = false;
		err = true;
	}
	else if(!firstname.match(/^[A-Z][A-Za-z'èùàòéì ]*$/)){
		document.getElementById("firstnamehelp").innerHTML = "Il nome deve iniziare con una lettera maiuscola e può contenere solo lettere, apostrofi e spazi";
		document.getElementById("firstnamehelp").hidden = false;
		err = true;
	}
	else{
		document.getElementById("firstnamehelp").innerHTML = "";
		document.getElementById("firstnamehelp").hidden = true;
	}
	return err;
}

function validateLastName(lastname){
	var err = false;
	if (lastname == "") {
		document.getElementById("lastnamehelp").innerHTML = "Il campo è obbligatorio";
		document.getElementById("lastnamehelp").hidden = false;
		err = true;
	}
	else if(!lastname.match(/^[A-Z][A-Za-z'èùàòéì ]*$/)){
		document.getElementById("lastnamehelp").innerHTML = "Il cognome deve iniziare con una lettera maiuscola e può contenere solo lettere, apostrofi e spazi";
		document.getElementById("lastnamehelp").hidden = false;
		err = true;
	}
	else{
		document.getElementById("lastnamehelp").innerHTML = "";
		document.getElementById("lastnamehelp").hidden = true;
	}
	return err;
}

function validateEmail(email){
	var err = false;
	if (email == "") {
		document.getElementById("emailhelp").innerHTML = "Il campo è obbligatorio";
		document.getElementById("emailhelp").hidden = false;
		err = true;
	}
	else if(!email.match(/^[\w]*[@][\w]*[.][\w]*$/)){
		document.getElementById("emailhelp").innerHTML = "Devi inserire una mail valida";
		document.getElementById("emailhelp").hidden = false;
		err = true;
	}
	else{
		document.getElementById("emailhelp").innerHTML = "";
		document.getElementById("emailhelp").hidden = true;
	}
	return err;
}

function validatePassword(pass, confirm_){
	var err = false;
	if (pass == "") {
		document.getElementById("passhelp").innerHTML = "Il campo è obbligatorio";
		document.getElementById("passhelp").hidden = false;
		err = true;
	}
	else if (pass.length < 8) {
		document.getElementById("passhelp").innerHTML = "La password deve avere almeno 8 caratteri";
		document.getElementById("passhelp").hidden = false;
		err = true;
	}
	else{
		document.getElementById("passhelp").innerHTML = "";
		document.getElementById("passhelp").hidden = true;
	}
	return err;
}

function validateConfirmpass(pass, confirm_){
	var err = false;
	if (confirm_ == "") {
		document.getElementById("confirmhelp").innerHTML = "Il campo è obbligatorio";
		document.getElementById("confirmhelp").hidden = false;
		err = true;
	}
	else if (pass != confirm_) {
		document.getElementById("confirmhelp").innerHTML = "Le due password inserite non coincidono";
		document.getElementById("confirmhelp").hidden = false;
		err = true;
	}
	else{
		document.getElementById("confirmhelp").innerHTML = "";
		document.getElementById("confirmhelp").hidden = true;
	}
	return err;
}