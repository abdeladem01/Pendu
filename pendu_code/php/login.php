<!DOCTYPE html>
<html lang="fr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Inscription</title>
	<meta name="author" content="Abdeladem X Marouane">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="../css/game.css">
	<link rel="icon" type="image/png" href="../images/conan.png"/>
  <script src="../js/simpleajax.js"></script>
	<script src="../js/game.js"></script>
</head>

	<body>
		<div class="titre-img"><img src="../images/image_full.png" alt="Logo de Polytech"
        title="Polytech "></div>
    <a href="../index.php"><h1 class="titre">Jeu du Pendu</h1></a>
		<br><br><br><br><br><br><br>
		<hr>

		<h1>Authentification</h1>
		<form action="dosignin.php" method="post">
			Votre login :
			<br>
			<input type="text" name="login">
			<br><br>
			Votre mot de passe :
			<br>
			<input type="password" name="password">
			<br><br>
			<input type="submit" value="Se connecter">
			<input type="reset" value="Annuler">
		</form>
	</body>
</html>
