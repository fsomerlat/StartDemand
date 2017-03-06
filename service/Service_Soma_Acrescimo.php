<?php require_once '../core/include.php';

	header("Content-Type: application/json");
	
	$acrescimo = new PreparaAcrescimo();
	
	$acrescimo->getSomaTotalAcrescimo();
