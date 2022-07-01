function validateLoginForm() {
    var email = document.forms["signin"]["email"].value;
    var pass = document.forms["signin"]["pass"].value;
  
    var err_email = validateEmail(email);
    var err_pass = validatePassword(pass);
  
    return (err_email || err_pass)? false : true;
}

function checkEmailLogin() {
	var email = document.forms["signin"]["email"].value;
    if (email == "") {
	    document.getElementById("emailhelp").innerHTML = "";
	    return;
    }
    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	    if(this.readyState == 4 && this.status == 200) {
		    if(this.responseText == "no"){
			    document.getElementById("emailhelp").innerHTML = "Non esistono utenti con questa mail";
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