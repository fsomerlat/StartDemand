<?php require_once '../core/include.php';
	
	$prod = new Produto();
	
	header("Content-Type: application/json");
	
	$prod->getJSON();
