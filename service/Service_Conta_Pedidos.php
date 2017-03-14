<?php require_once '../core/include.php';

	header("Content-Type: application/json");
	
	$ped = new Pedido();
	
	$ped->getContaPedidos();
 