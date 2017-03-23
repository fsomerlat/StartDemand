<?php require_once '../core/include.php';
	
	$pedidoAcrescimo = new PedidoAcrescimo();
	
	header("Content-Type: Text-plain");
	
	
	$pedidoAcrescimo->getInfoFinanceiroJSONPEDIDO_ACRESCIMO();
	
