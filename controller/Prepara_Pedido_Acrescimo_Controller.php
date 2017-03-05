<?php require_once '../core/include.php';

	$preparaAcrescimo = new PreparaAcrescimo();
	$preparaProdPed = new PreparaPedido();

	if(isset($_REQUEST["cpAcrescimo"])):
		
		$nmacrescimo = $_REQUEST["cpAcrescimo"];
		$valBaseAcrescimo = $_REQUEST["cpValorBaseAcrescimo"];
		$qtdAcrescimo = $_REQUEST["cpQtdAcrescimo"];
		$valTotalAcrescimo = $_REQUEST["cpValorTotalAcrescimo"];
		
		$preparaAcrescimo->__set("cpAcrescimo", addslashes($nmacrescimo));
		$preparaAcrescimo->__set("cpValorBaseAcrescimo",addslashes($valBaseAcrescimo));
		$preparaAcrescimo->__set("cpQtdAcrescimo", addslashes($qtdAcrescimo));
		$preparaAcrescimo->__set("cpValorTotalAcrescimo", addslashes($valTotalAcrescimo));
		
		$preparaAcrescimo->INSERT();
		
		echo "Acréscimo inserido com sucesso !";
		

	endif;
	
	if($_REQUEST["acao"] == "deletarProdPedido"):
	
		$id = (int)$_REQUEST["id"];
		$preparaProdPed->DELETE($id);
		
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		
	endif;
	
	if($_REQUEST["acao"] == "deletarAcrescimo"):
		
		$id = (int)$_GET["id"];
	
		$preparaAcrescimo->DELETE($id);
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
	endif;
	
