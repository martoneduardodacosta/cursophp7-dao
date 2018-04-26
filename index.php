<?php

	require_once("config.php");


	// Carrega um usuario
	//$root = new Usuario();
	//$root->loadbyId(19);

	//echo $root;
	
	// Carrega uma lista de usuarios

	//	$lista = Usuario::getList();

	//	echo json_encode($lista);

	//	$search = Usuario::search("Ma");

	//	echo json_encode($search);

	// Carrega o usuario

	//	$usuario = new Usuario();

	//	$usuario->login("Joao","123");

	//	echo $usuario;

		$aluno = new Usuario("aluno","12345");

		$aluno->insert();

		echo $aluno;


?>
