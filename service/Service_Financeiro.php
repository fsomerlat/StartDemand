<?php require_once '../core/include.php';
	
	$financeiro = new Financeiro();
	
	header("Content-Type: Text-plain");
	
	
	$financeiro->getInfoFinanceiroJSON();
	
