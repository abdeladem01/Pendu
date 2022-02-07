<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Inscription</title>
	<meta name="author" content="Abdeladem X Marouane">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="../css/game.css">
	<link rel="icon" type="image/png" href="../images/conan.png"/>

</head>
	<body>
  <div class="titre-img"><img src="../images/image_full.png" alt="Logo de Polytech"
        title="Polytech "></div>
    <a href="../index.php"><h1 class="titre">Jeu du Pendu</h1></a>
		<br><br><br><br><br><br><br>
		<hr>

		<h2>Inscription</h2>

		<form action="dosignup.php" method="post">
			Choisissez votre login (uniquement des lettres minuscules ou majuscules)
			<br>
			<input type="text" name="login">
			<br><br>
			Choisissez votre mot de passe (minimum 4 caractères)
			<br>
			<input type="password" name="password1">
			<br>
			Répétez votre mot de passe
			<br>
			<input type="password" name="password2">
			<br><br>
			<input type="submit" value="S'inscrire">
			<input type="reset" value="Annuler">
		</form>
<?php

	$r ='';
	if(isset($_GET["badsignup"])){

		switch($_GET["badsignup"]){
			case '1' : 
				$r = "le login ne contient pas que des lettres" ;
				break;
			case '2' : 
				$r = "le login est déjà utilisé" ;
				break;
			case '3' : 
				$r = "le mot de passe à moins de 4 caractères" ;
				break;
			case '4' : 
				$r = "le mot de passe et lae mot de passe de vérification sont différents" ;
				break;
		}
	}
	echo "<h2>".$r."</h2>" ;
?>
	</body>
</html>
