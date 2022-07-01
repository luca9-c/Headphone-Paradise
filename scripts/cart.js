/* Funzioni per tenere aggiornato il carrello con aggiunta e rimozione dei prodotti */

window.onload = function(){
	compute_total();
	set_button();
}

function obtain_total(){
	return document.getElementById("tot").innerHTML;
}

function set_button(){
	if(!check_quantities() || obtain_total() == 0)
		document.getElementById("confirm").classList.add("disabled");
	else 
		document.getElementById("confirm").classList.remove("disabled");
}

function compute_total(){
	var q = document.getElementsByName("quantita");
	var p = document.getElementsByClassName("prezzo");
	if(q == "" && p == "")
		document.getElementById("tot").innerHTML = toEuro(0);
	else{
		let tot = 0;
		for(let i = 0; i < q.length; i++){
			tot += toEuro(p[i].innerHTML) * toEuro(q[i].value);
		}
		document.getElementById("tot").innerHTML = toEuro(tot);
	}		
}

function check_quantities(){
	var q = document.getElementsByName("quantita");
	var d = document.getElementsByClassName("disp");
	var ok = true;
	for(var i = 0; i < q.length; i++){
		if(q[i].value > parseInt(d[i].innerHTML)){
			document.getElementsByClassName("color")[i].classList.remove("text-success");
			document.getElementsByClassName("color")[i].classList.add("text-danger");
			ok = false;
		}
	}
	return ok;
}

function toEuro(val){
	return parseFloat(val).toFixed(2);
}

function remove(prod){
	if(!window.confirm("Sei sicuro di voler rimuovere il prodotto?"))
		return;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == "Elemento rimosso con successo!"){
				document.getElementById(prod).remove();
				
				let no_product = parseInt(document.getElementById("no_product").innerHTML);
				document.getElementById("no_product").innerHTML = (no_product -= 1);
				
				compute_total();
				set_button();
			}
			alert(this.responseText);
		}
    };
    xmlhttp.open("GET","/SAW2021-22/async/remove_selected.php?prod="+prod,true);
    xmlhttp.send();
}

function update(prod, new_quantity){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == "Quantità aggiornata con successo!"){
				document.getElementById("quantita_"+prod).value = parseInt(new_quantity);
				document.getElementById("old_"+prod).value = parseInt(new_quantity);
				
				compute_total();	
				set_button();
			}
			alert(this.responseText);
		}
    };
    xmlhttp.open("GET","/SAW2021-22/async/update_selected.php?prod="+prod+"&quantity="+new_quantity,true);
    xmlhttp.send();
}