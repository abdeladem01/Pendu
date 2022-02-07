<?php
	session_start();

	$t = file("users.csv", FILE_IGNORE_NEW_LINES) ;
	foreach ($t as $line) {
		$t_int = explode(",",$line);
		$t_fin[$t_int[0]]=$t_int[1];
	}
	
	$_SESSION["connection"] = false ; // pour verifier par la suite si la connection est établie ou non 
	$_SESSION["login"] = $_POST["login"] ; // pour stocker le login

	//Vérification du login et du mdp
	foreach($t_fin as $log => $mdp){
		
		if($log == $_POST["login"] && $mdp == md5($_POST["password"]) ){
			$_SESSION["connection"] = true ;
			
				header("Location: game.php"); 
			
			exit(); // pour arrêter le script
		}
	}
	// cas où le login ou le password est faux
	session_unset(); 
	header('Location: ../index.php'); 
	exit(); // pour arrêter le script
?>