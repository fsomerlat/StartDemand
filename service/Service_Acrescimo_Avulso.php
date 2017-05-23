z<?php require_once '../core/include.php';

	header("Content-Type: application/json");
	
	$acrescimoAvuslso = new Acrescimo();
	
	$acrescimoAvuslso->getAcrescimosAvulsosJSON();
