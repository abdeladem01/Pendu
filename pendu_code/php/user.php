<?php
	session_start();
	if (isset($_SESSION["connection"]) && $_SESSION["connection"]==true){
		echo $_SESSION["login"];
	}
?>