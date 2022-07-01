function validateUpdatePassword() {	
	var old_pass = document.forms["edit_password"]["old_pass"].value;
	var new_pass = document.forms["edit_password"]["new_pass"].value;
	var confirm_new = document.forms["edit_password"]["confirm_new"].value;
  
	var err_old = false;
	if (old_pass == "") {
		document.getElementById("oldpasshelp").innerHTML = "Il campo è obbligatorio";
		document.getElementById("oldpasshelp").hidden = false;
		err_old = true;
	}
  
    var err_pass = validatePassword(new_pass);
    var err_confirm = validateConfirmpass(new_pass, confirm_new);
  
    return (err_old || err_pass || err_confirm)? false : true;
}