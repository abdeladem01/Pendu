<?php
session_start();
$_SESSION["compteur"]=-1; //compteur de tentative intialié à 0, maximum 11
$motsetindices=file("../lependu/dico.csv",FILE_IGNORE_NEW_LINES);
	foreach ($motsetindices as $motetindice){
		$listemotindice=explode(",", $motetindice);
		$INDICE[$listemotindice[0]]=$listemotindice[1];
	}
$aupif = array_rand($INDICE);
$_SESSION["mot"] = $aupif;
$_SESSION["indice"] = $INDICE[$aupif];
$_SESSION['motAffiche'] = "-------";
?>