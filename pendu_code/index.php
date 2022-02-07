<?php
	session_start();
	if (isset($_SESSION["login"])){
		$login = $_SESSION["login"] ;
	}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Jeu du pendu - Acceuil</title>
	<meta name="author" content="Abdeladem X Marouane">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/acceuil.css">
	<link rel="icon" type="image/png" href="images/conan.png"/>
	<script src="js/simpleajax.js"></script>
	<script src="js/index.js"></script>
	<title>Jeu du pendu - Acceuil</title>
</head>

<body>
	<div class="titre-img"><img src="images/image_full.png" alt="Logo de Polytech"
        title="Polytech "></div>
    <h1 class="titre">Jeu du Pendu</h1>
		<hr>
		<img class="center" src="images/penduanime.gif">
    <div class="bouton"><a class="btn1" href="php/game.php">JOUER</a> <div class="btn2">Se connecter</div></div>
    <div class="bouton">
    <br>
    <?php
    if(isset($_SESSION["connection"])){
				 echo 'Utilisateur actuellement connecté : <b>'.$login.'</b>'; 
			}
      ?>
      </div>
    
        <h3 class="bouton"> Règle du Jeu </h3>
    <p class="explication" >Le Pendu est un jeu consistant
      à trouver un mot en devinant quelles sont les lettres qui le composent. Le
      jeu se joue traditionnellement à deux, avec un papier et un crayon, selon
      un déroulement bien particulier.</p>
			<br><br><br>
			<hr>
      <div class="OurPic">
        <a href="https://annuaire.univ-cotedazur.fr/index.php?action=print_person&dn=uid%3D21900665%2Cou%3Detudiant%2Cou%3Dpeople%2Cdc%3Dunice%2Cdc%3Dfr"><img title="Marouane Boubia G4" src="images/marouane.jpeg" alt="Image Marouane Boubia G4"></a>
       <a href="https://annuaire.univ-cotedazur.fr/index.php?action=print_person&dn=uid%3D21901107%2Cou%3Detudiant%2Cou%3Dpeople%2Cdc%3Dunice%2Cdc%3Dfr"><img title="Abdeladem Saoud Fattah G3" src="images/fattah.jpeg" alt="Image Abdeladem Fattah Saoud G3"></a>
              <figcaption>Réalisé par Marouane Boubia G4 et Abdeladem Saoud Fattah G3</figcaption>
      </div>
    <p class="bouton">
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
    </p>
  </body>
</html>