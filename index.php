<?php

	require_once("config.php");

	$root = new Usuario();

	$root->loadbyId(19);

	echo $root;
	
?>
