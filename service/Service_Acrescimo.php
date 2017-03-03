<?php require_once '../core/include.php';

	header("Content-Type: text/plain");
	
	$acrescimo =  new Acrescimo();
	
	echo $acrescimo->getAcrescJSON();
