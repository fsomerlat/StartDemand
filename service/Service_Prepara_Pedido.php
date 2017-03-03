<?php require_once '../core/include.php';

	header("Content-Type: application/json");
	
	$preparaPedido = new PreparaPedido();
	
	$preparaPedido->getInfoJSON();
	
 