<?php require_once '../core/include.php'; 
	
	$ped = new Pedido();
	$preparaPedido =  new PreparaPedido();
	

		
	if($_REQUEST["acao"] == "gerar pedido"):
	
		$ped->__set("tuProduto_idProduto", addslashes($_REQUEST["tuProduto_idProduto"]));
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
					window.location.href='../view/Pedido.php?panel=193158';
				</script>";
		
	endif;
	
	if($_REQUEST["acao"] == "gerar pedido com acrescimo"):
		
		$fk =  $_REQUEST["tuProduto_idProduto"];
		$preparaPedido->__set("tuProduto_idProduto", $fk);
		$preparaPedido->__set("cpCodPedido", addslashes($_REQUEST["cpCodPedido"]));
		$preparaPedido->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$preparaPedido->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$preparaPedido->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$preparaPedido->__set("cpValorTotalProduto", addslashes($_REQUEST["cpValorTotalProduto"]));
		$preparaPedido->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$preparaPedido->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
			
		
		if($preparaPedido->getRow() > 0):
			
			echo "<script language='javascript'>
						window.alert('Um pedido já está sendo preparado.Finalize-o para continuar !');
						window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
					</script>";
		else:
			
			$preparaPedido->INSERT();
			
			header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		endif;
	endif;
	
	if($_REQUEST["acao"] == "cancelar"):
		
		$cod = $_REQUEST["cod"];
		$ped->__set("cpStatusPedido","C");
		
		$ped->UPDATESTATUS($cod);
		
		header("location:../view/listarPedidos.php");
		
	endif;
	
	if($_REQUEST["acao"] == "finalizar"):
		
		$cod = $_REQUEST["cod"];
	
		$ped->__set("cpStatusPedido", "F");
		
		$ped->UPDATESTATUS($cod);
		header("location:../view/listarPedidos.php");
	endif;
	
	if($_REQUEST["acao"] == "atualizar"):
	 
	$id = (int)$_GET["id"];
	 
	$preparaPedido->__set("tuProduto_idProduto", addslashes($_REQUEST["tuProduto_idProduto"]));
	$preparaPedido->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
	$preparaPedido->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
	$preparaPedido->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
	$preparaPedido->__set("cpValorTotalProduto", addslashes($_REQUEST["cpValorTotalProduto"]));
	$preparaPedido->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
		
	$preparaPedido->UPDATE($id);
	 
	echo "<script language='javascript'>
   					window.alert('Registro atualizado com sucesso !');
   					window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
   				</script>";
	
	endif;
	
	
	