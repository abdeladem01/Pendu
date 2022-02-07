<?php
session_start();
$lettrejoue = null;
if (isset($_GET["lettre"])){
	$lettrejoue=$_GET["lettre"];
}
$avant=$_SESSION["motAffiche"];
for($i=0;$i<7;$i++){  
	if($lettrejoue == $_SESSION["mot"][$i]){
		$_SESSION["motAffiche"][$i]=$lettrejoue ;
	}
}
if ($_SESSION["motAffiche"] == $avant){
	$_SESSION["compteur"]+=1;
}
if ($_SESSION["compteur"]<11){
	if ($_SESSION["mot"]==$_SESSION["motAffiche"]){
		echo "SUCCESS<br />SUCCESS<br />SUCCESS";
	}else{
		echo $_SESSION["motAffiche"]. "<br />".$_SESSION["indice"]."<br />".$_SESSION["compteur"];
	}
}else{
	echo "FAIL<br />FAIL<br />FAIL";
}
?>