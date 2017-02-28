<?php require_once '../core/include.php'; 
	
	$ped = new Pedido();
		
	if($_REQUEST["acao"] == "gerar pedido"):
	
		$ped->__set("cptuProduto_idProduto", addslashes($_REQUEST["cptuProduto_idProduto"]));
		$ped->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$ped->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$ped->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$ped->__set("cpAcrescimo", addslashes($_REQUEST["cpAcrescimo"]));
		$ped->__set("cpQtdAcrescimo", addslashes($_REQUEST["cpQtdAcrescimo"]));
		$ped->__set("cpValorAcrescimo", addslashes($_REQUEST["cpValorAcrescimo"]));
		$ped->__set("cpValorTotalPedido", addslashes($_REQUEST["cpValorTotalPedido"]));
		$ped->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$ped->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
		
		$ped->INSERT();
		echo "<script language='javascript'>
					window.alert('Pedido gerado com sucesso !');
					window.location.href='../view/listarPedidos.php';
				</script>";
		
	endif;
	
	if(isset($_REQUEST["campos"])):
		
		$valores = $_REQUEST["campos"];
		
		
		foreach($valores as $key => $res):
			
			echo $res;
		
		endforeach;
		
	endif;