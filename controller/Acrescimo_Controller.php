<?php	require_once '../core/include.php';

	$acrescimo =  new Acrescimo();
	
	if($_REQUEST["acao"] == "cadastrar"):
	
		$acrescimo->__set("cpStatusAcrescimo", "N");
		$acrescimo->__set("tuPedido_idPedido", null);
		$acrescimo->__set("tuPedido_cpCodPedido", addslashes($_REQUEST["tuPedido_cpCodPedido"]));
		$acrescimo->__set("cpAcrescimo", addslashes($_REQUEST["cpAcrescimo"]));
		$acrescimo->__set("cpQtdAcrescimo", addslashes($_REQUEST["cpQtdAcrescimo"]));
		$acrescimo->__set("cpValorBaseAcrescimo", addslashes($_REQUEST["cpValorBaseAcrescimo"]));
		$acrescimo->__set("cpValorTotalAcrescimo", addslashes($_REQUEST["cpValorTotalAcrescimo"]));
		$acrescimo->__set("cpObservacaoAcrescimo", addslashes($_REQUEST["cpObservacaoAcrescimo"]));
	endif;
