<?php require_once '../core/include.php';

	header("Content-Type: application/json");
	
	$preparaProduto = new PreparaProduto();
	
	$preparaProduto->getInfoJSON();
	
 