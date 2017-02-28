<?php require_once '../core/include.php';

	$acrescimo = new Acrescimo();

	if(isset($_REQUEST["acrescimo"])):
	
	$acrescimo->__set("cpAcrescimo", addslashes($_REQUEST["cpAcrescimo"]));
	$acrescimo->__set("cpQtdAcrescimo", addslashes($_REQUEST["cpQtdAcrescimo"]));
	$acrescimo->__set("cpValorAcrescimo", addslashes($_REQUEST["cpValorAcrescimo"]));

	$acrescimo->INSERT();
	header("location:../view/Pedido.php?panel=655955");
	
	endif;
