function validateRegistrationForm() {
    var firstname = document.forms["signup"]["firstname"].value;
    var lastname = document.forms["signup"]["lastname"].value;
    var email = document.forms["signup"]["email"].value;
    var pass = document.forms["signup"]["pass"].value;
    var confirm_ = document.forms["signup"]["confirm"].value;
  
    var err_first = validateFirstName(firstname);
    var err_last = validateLastName(lastname); 
    var err_email = validateEmail(email);
    var err_pass = validatePassword(pass);
    var err_confirm = validateConfirmpass(pass, confirm_);
  
    return (err_first || err_last || err_email || err_pass || err_confirm)? false : true;
}

function checkEmailRegistration() {
	var email = document.forms["signup"]["email"].value;
    if(email == "") {
	    document.getElementById("emailhelp").innerHTML = "";
	    return;
    }
    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	    if(this.readyState == 4 && this.status == 200) {
			if(this.responseText == "ok"){
				document.getElementById("emailhelp").innerHTML = "Questa mail è già in uso";
				document.getElementById("emailhelp").hidden = false;
			}
			else{
				document.getElementById("emailhelp").innerHTML = "";
				document.getElementById("emailhelp").hidden = true;
			}
		}
	}
	xmlhttp.open("GET", "async/check_email.php?email="+email, true);
	xmlhttp.send();
}