<?php require_once '../core/include.php'; 
	
	$ped = new Pedido();
	$preparaPedido =  new PreparaPedido();

		
	if($_REQUEST["acao"] == "gerar pedido"):
	
		$ped->__set("cptuProduto_idProduto", addslashes($_REQUEST["cptuProduto_idProduto"]));
		$ped->__set("cptuAcrescimo_idAcrescimo", $_REQUEST["cptuAcrescimo_idAcrescimo"]);
		$ped->__set("cpCodPedido", $_REQUEST["cpCodPedido"]);
		$ped->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$ped->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$ped->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$ped->__set("cpValorTotalProduto", $_REQUEST["cpValorTotalProduto"]);
		$ped->__set("cpValorTotalPedido", addslashes($_REQUEST["cpValorTotalPedido"]));
		$ped->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$ped->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
		
		$ped->INSERT();
		echo "<script language='javascript'>
					window.alert('Pedido gerado com sucesso !');
					window.location.href='../view/listarPedidos.php';
				</script>";
		
	endif;
	
	if($_REQUEST["acao"] == "gerar pedido com acrescimo"):
	
		$preparaPedido->__set("cptuProduto_idProduto", addslashes($_REQUEST["cptuProduto_idProduto"]));
		$preparaPedido->__set("cptuAcrescimo_idAcrescimo", addslashes($_REQUEST["cptuAcrescimo_idAcrescimo"]));
		$preparaPedido->__set("cpCodPedido", $_REQUEST["cpCodPedido"]);
		$preparaPedido->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$preparaPedido->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$preparaPedido->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$preparaPedido->__set("cpValorTotalProduto", $_REQUEST["cpValorTotalProduto"]);
		$preparaPedido->__set("cpValorTotalPedido", addslashes($_REQUEST["cpValorTotalPedido"]));
		$preparaPedido->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$preparaPedido->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
			
		$preparaPedido->INSERT();
		
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
	
	endif;