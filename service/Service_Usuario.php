<?php require_once '../core/include.php';

	$usuario =  new Usuario();	

	header("Content-Type: application/json");
	
	$usuario->getInfoUsuarioJSON();
	
 