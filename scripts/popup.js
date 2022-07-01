/* Funzioni per gestione popup nei prodotti (visualizzazione dettagli, aggiunta, ecc) e ricerca avanzata */

var xmlhttp = new XMLHttpRequest();

window.onclick = function(event){
    if (event.target == document.getElementById("popup-box")){
        document.getElementById("popup-box").style.display = "none";
    }
}

function close_box(){
    document.getElementById("popup-box").style.display = "none";
}

function display_popup_box(){
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById("popup-box").innerHTML = xmlhttp.responseText;
		document.getElementById("popup-box").style.display = "block";
	}
}

function view_advanced(){
	xmlhttp.onreadystatechange = display_popup_box;
    xmlhttp.open("GET","/SAW2021-22/async/view_advanced.php",true);
    xmlhttp.send();
}

function view_details(id){
	if(id == ""){
		document.getElementById("popup-box").innerHTML = "";
		return;
	} 
	else{
		xmlhttp.onreadystatechange = display_popup_box;
		xmlhttp.open("GET","async/view_details.php?id="+id,true);
		xmlhttp.send();
	}
}

function add_to_cart(id){
	if(id == ""){
		document.getElementById("popup-box").innerHTML = "";
		return;
	}
	else{
        xmlhttp.onreadystatechange = display_popup_box;
		xmlhttp.open("GET","async/select_quantity.php?id="+id,true);
		xmlhttp.send();
	}	
}

function confirm_add(id, val){ 
	if(id == ""){
        document.getElementById("popup-box").innerHTML = "";
        return;
	} 
	else{
        xmlhttp.onreadystatechange = display_popup_box;
		xmlhttp.open("GET","async/confirm_add.php?id="+id+"&val="+val,true);
		xmlhttp.send();
	}
}