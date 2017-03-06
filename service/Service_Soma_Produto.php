<?php require_once '../core/include.php';
	
	$preparaPedido = new PreparaPedido();
	header("Content-Type: application/json");
	
	$preparaPedido->getSomeProduto();
	
	
