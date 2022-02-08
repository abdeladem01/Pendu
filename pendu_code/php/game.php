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
	<title>Jeu en cours - À vous de jouer!</title>
	<meta name="author" content="Abdeladem X Marouane">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="../css/game.css">
	<link rel="icon" type="image/png" href="../images/conan.png"/>
  <script src="../js/simpleajax.js"></script>
	<script src="../js/game.js"></script>
</head>

<body>
	<div class="titre-img"><img src="../images/image_full.png" alt="Logo de Polytech"
        title="Polytech "> </div>
    <a href="../index.php"><h1 class="titre">🏠Jeu du Pendu</h1></a>
		<br><br><br><br><br><br><br>
		<hr>
		<h1>À vous de deviner le bon mot !</h1>
		 <div class="pendu">
        <img id="imgPendu" src="../lependu/images/p00.png" title="pendu" alt="Pendu" />
        </div>
		<div id="lejeu">
    <div id="deviner">
				 _ _ _ _ _ _ _ 
        </div>
        <br><br>
    <div>
      Indice :  <div id="indice"></div>
        </div>
		<br><br>
    <div class="line">
        <img class="lettre" src="../lependu/images/a.png" title="a" alt="Lettre" />
        <img class="lettre" src="../lependu/images/b.png" title="b" alt="Lettre" />
        <img class="lettre" src="../lependu/images/c.png" title="c" alt="Lettre" />
        <img class="lettre" src="../lependu/images/d.png" title="d" alt="Lettre" />
        <img class="lettre" src="../lependu/images/e.png" title="e" alt="Lettre" />
				<img class="lettre" src="../lependu/images/f.png" title="f" alt="Lettre" />
        <img class="lettre" src="../lependu/images/g.png" title="g" alt="Lettre" />
        <img class="lettre" src="../lependu/images/h.png" title="h" alt="Lettre" />
        <img class="lettre" src="../lependu/images/i.png" title="i" alt="Lettre" />
        </div>
        <div class="line">
            <img class="lettre" src="../lependu/images/j.png" title="j" alt="Lettre" />
            <img class="lettre" src="../lependu/images/k.png" title="k" alt="Lettre" />
            <img class="lettre" src="../lependu/images/l.png" title="l" alt="Lettre" />
            <img class="lettre" src="../lependu/images/m.png" title="m" alt="Lettre" />
            <img class="lettre" src="../lependu/images/n.png" title="n" alt="Lettre" />
            <img class="lettre" src="../lependu/images/o.png" title="o" alt="Lettre" />
            <img class="lettre" src="../lependu/images/p.png" title="p" alt="Lettre" />

        </div>
        <div class="line">
            <img class="lettre" src="../lependu/images/q.png" title="q" alt="Lettre" />
            <img class="lettre" src="../lependu/images/r.png" title="r" alt="Lettre" />
            <img class="lettre" src="../lependu/images/s.png" title="s" alt="Lettre" />
            <img class="lettre" src="../lependu/images/t.png" title="t" alt="Lettre" />
            <img class="lettre" src="../lependu/images/u.png" title="u" alt="Lettre" />
            <img class="lettre" src="../lependu/images/v.png" title="v" alt="Lettre" />

        </div>
        <div class="line">

            <img class="lettre" src="../lependu/images/w.png" title="w" alt="Lettre" />
            <img class="lettre" src="../lependu/images/x.png" title="x" alt="Lettre" />
            <img class="lettre" src="../lependu/images/y.png" title="y" alt="Lettre" />
            <img class="lettre" src="../lependu/images/z.png" title="z" alt="Lettre" />
        </div>
   
    </div>
			<br>
			<hr><?php 

      if(isset($_SESSION["connection"])){
				 echo 'Utilisateur : <b>'.$login.'</b><br><div class="boutonDeco"><a href="signout.php">Se déconnecter</a></div>' ; 
			}
     ?><p id="credits">
        Réalisé par Marouane Boubia G4 et Abdeladem Saoud Fattah G3
      </p>
    <p class="bouton">
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
    </p>
  </body>
</html>