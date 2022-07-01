<?php 
	function message_box($message){
		echo "<div class='popup-content'>
				<p>$message</p>
				<button type='button' onclick='close_box()' class='btn btn-secondary'>Chiudi</button>
			  </div>";
	}         
?>