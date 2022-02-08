<?php
$t = file("users.csv", FILE_IGNORE_NEW_LINES) ;
	foreach ($t as $line) {
		$t_int = explode(",",$line);
		$t_fin[]=$t_int[0];
	}
	
	if(!preg_match("/^[a-zA-Z]+$/",$_POST["login"]) ){
		header("Location: signup.php?badsignup=1") ;
		exit();
	}

	if(in_array($_POST["login"],$t_fin)){
		header("Location: signup.php?badsignup=2") ;
		exit();
	}

	if(strlen($_POST["password1"]) < 4  ){
		header("Location: signup.php?badsignup=3") ;
		exit();
	}

	if($_POST["password1"]!= $_POST["password2"] ){
		header("Location: signup.php?badsignup=4") ;
		exit();
	}

	// ajouter l'inscription au fichier users
	$new_user = $_POST["login"].",".md5($_POST["password2"]) ."\n";

	file_put_contents('users.csv', $new_user, FILE_APPEND);
	header("Location: ../index.php");
	exit();
	
?>