<?php


	if($_REQUEST["acao"] == "gerar pedido"):
	
		$arryProd = $_REQUEST["produtoMobile"];
		
		foreach($arryProd as $key => $prod){
			
			echo $prod;
		}
		
	endif;