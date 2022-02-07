<?php
	session_start();
	if (isset($_SESSION["connection"]) && $_SESSION["connection"] == false){
		echo "false";
	}else if (isset($_SESSION["connection"]) && $_SESSION["connection"] == true){
		echo "true";
	}else{
		echo "false";
	}
?>