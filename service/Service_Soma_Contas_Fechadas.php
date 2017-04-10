<?php require_once '../core/include.php';

	$contas = new Contas();
	
	header("Content-Type: text-plain");
	
	$contas->getSomaContasFechadasJSON();
 