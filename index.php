<?php

	require_once("config.php");


	// Carrega um usuario
	//$root = new Usuario();
	//$root->loadbyId(19);

	//echo $root;
	
	// Carrega uma lista de usuarios

//	$lista = Usuario::getList();

//	echo json_encode($lista);

	$search = Usuario::search("Jo");

	echo json_encode($search);


?>
