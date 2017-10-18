<?php
    define("SERVEUR","localhost");
	define("USAGER","root");
	define("PASSE","");
	define("BD","chadorakubd");
	$connexion = new mysqli(SERVEUR,USAGER,PASSE,BD);
	if ($connexion->connect_errno) {
		echo "Probleme de connexion au serveur de bd";
		exit();
	}
	mysqli_set_charset($connexion,"utf8");
?>