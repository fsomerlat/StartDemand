<?php require_once '../model/TaxaJuros.php';

	$taxa =  new TaxaJuros();

	header("Content-Type:  application/json");
	
	$taxa->getJSON_TAXA_JUROS();
