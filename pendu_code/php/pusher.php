<?php 

if ($_POST["user"]!=null && $_POST["mot"]!=null && $_POST["t"]!=null){
	$log = $_POST["user"];
	$mot = $_POST["mot"];
	$time = $_POST["t"];
	$arr = array($log,$mot,$time);
	$tab = implode(",",$arr);
	file_put_contents("../lependu/scores.csv",$tab."\n",FILE_APPEND);
}

//trie du fichier scores.csv

$p=file("../lependu/scores.csv",FILE_IGNORE_NEW_LINES);
for($i = 0 ; $i<count($p); $i++){
  echo $p[$i].'<br/>' ;
}
?>