<?php require_once '../core/include.php';
	
	$preparaProduto = new PreparaProduto();
	header("Content-Type: application/json");
	
	$preparaProduto->getSomaProduto();
	
	
