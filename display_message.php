<?php 
	function errore($error_message, $link){
		echo "<div class='alert alert-danger my-5 p-4 mx-auto w-60' role='alert'>
				<h6>$error_message</h6>
			  </div>";
		header("refresh:3, url=$link");
		require 'components/footer.php';
	}   

	function ok($confirm_message, $link){
		echo "<div class='alert alert-success my-5 p-4 mx-auto w-60' role='alert'>
				<h6>$confirm_message</h6>
			  </div>";
		header("refresh:3, url=$link");
	} 	
?>