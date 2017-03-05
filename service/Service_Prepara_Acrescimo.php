<?php require_once '../core/include.php';

	$preparaAcrescimo = new PreparaAcrescimo();
	header("Content-Type: application/json");
	
	$preparaAcrescimo->getInfoAcrescimoJSON();
	
	
 