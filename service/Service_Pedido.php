<?php require_once '../core/include.php';

	header("Content-Type: application/json");
	
	$pedido = new Pedido();
	
	$pedido->getInfoPedidoJSON();
	