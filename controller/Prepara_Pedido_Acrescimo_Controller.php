<?php require_once '../core/include.php';

	$acrescimo = new Acrescimo();

	if(isset($_REQUEST["cpAcrescimo"])):
		
		$nmacrescimo = $_REQUEST["cpAcrescimo"];
		$valBaseAcrescimo = $_REQUEST["cpValorBaseAcrescimo"];
		$qtdAcrescimo = $_REQUEST["cpQtdAcrescimo"];
		$valTotalAcrescimo = $_REQUEST["cpValorTotalAcrescimo"];
		
		$acrescimo->__set("cpAcrescimo", addslashes($nmacrescimo));
		$acrescimo->__set("cpValorBaseAcrescimo",addslashes($valBaseAcrescimo));
		$acrescimo->__set("cpQtdAcrescimo", addslashes($qtdAcrescimo));
		$acrescimo->__set("cpValorTotalAcrescimo", addslashes($valTotalAcrescimo));
		
		$acrescimo->INSERT();
		
		echo "Acréscimo inserido com sucesso !";
		

	endif;
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = (int)$_REQUEST["id"];
		$acrescimo->DELETE($id);
		
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		
	endif;
