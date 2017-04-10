<?php require_once '../core/include.php';

	$conta = new Contas();
	
	header("Content-type: application/json");
	
	$conta->getSomaContasAbertasJSON();
