<?php
	require '../../connessione.php';
	
	$email = trim($_GET['email']);
	$stmt = mysqli_prepare($con, "SELECT * FROM user WHERE email = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$res = mysqli_stmt_get_result($stmt);
	$rowcount = mysqli_num_rows($res);
	
	if($rowcount == 1)
		echo "ok";
	else
		echo "no";
	exit();
?>