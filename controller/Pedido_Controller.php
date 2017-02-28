<?php require_once '../core/include.php'; 
	
	$ped = new Pedido();
	$acrescimo = new Acrescimo();
		
	if($_REQUEST["acao"] == "gerar pedido"):
	
		$ped->__set("cptuProduto_idProduto", addslashes($_REQUEST["cptuProduto_idProduto"]));
		$ped->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$ped->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$ped->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$ped->__set("cpValorTotalPedido", addslashes($_REQUEST["cpValorTotalPedido"]));
		$ped->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$ped->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
		
		$ped->INSERT();
		echo "<script language='javascript'>
					window.alert('Pedido gerado com sucesso !');
					window.location.href='../view/listarPedidos.php';
				</script>";
		
	endif;
	
	if(isset($_REQUEST["nomeAcrescimo"])):
		
		$nomeAcrescimo = $_REQUEST["nomeAcrescimo"];
		$qtdAcrescimo = $_REQUEST["qtdAcrescimo"];
		$valAcrescimo = $_REQUEST["valTotalAcrescimo"];
		$valBaseAcrescimo = $_REQUEST["valBaseAcrescimo"];
		
		$acrescimo->__set("cpAcrescimo", addslashes($nomeAcrescimo));
		$acrescimo->__set("cpValorBaseAcrescimo",addslashes($valBaseAcrescimo));
		$acrescimo->__set("cpQtdAcrescimo", addslashes($qtdAcrescimo));
		$acrescimo->__set("cpValorTotalAcrescimo",addslashes($valAcrescimo));
		
		echo $nomeAcrescimo.' - '.$qtdAcrescimo.' - '.$valAcrescimo;
		
	endif;