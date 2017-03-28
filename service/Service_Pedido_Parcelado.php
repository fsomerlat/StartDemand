<?php require_once '../core/include.php';
	
	$pedidoParcelado = new ParcelasPedido();
	
	header("Content-Type: Text-plain");
	
	
	$pedidoParcelado->getInfoFinanceiroJSONPEDIDO_PARCELADO();
	
