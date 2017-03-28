<?php require_once '../core/include.php';

	$preparaAcrescimo = new PreparaAcrescimo();
	$preparaProdPed = new PreparaProduto();
	$acrescimo = new Acrescimo();
	$ped = new Pedido();

	if(isset($_REQUEST["cpAcrescimo"])):
		
		$nmacrescimo = $_REQUEST["cpAcrescimo"];
		$valBaseAcrescimo = $_REQUEST["cpValorBaseAcrescimo"];
		$codPedido = $_REQUEST["tuPedido_cpCodPedido"];
		$qtdAcrescimo = $_REQUEST["cpQtdAcrescimo"];
		$valTotalAcrescimo = $_REQUEST["cpValorTotalAcrescimo"];
		$obsAcrescimo = $_REQUEST["cpObservacaoAcrescimo"];
		
		$preparaAcrescimo->__set("cpAcrescimo", addslashes($nmacrescimo));
		$preparaAcrescimo->__set("tuPedido_cpCodPedido", addslashes($codPedido));
		$preparaAcrescimo->__set("cpValorBaseAcrescimo",addslashes($valBaseAcrescimo));
		$preparaAcrescimo->__set("cpQtdAcrescimo", addslashes($qtdAcrescimo));
		$preparaAcrescimo->__set("cpValorTotalAcrescimo", addslashes($valTotalAcrescimo));
		$preparaAcrescimo->__set("cpObservacaoAcrescimo", addslashes($obsAcrescimo));
		
		//PEGA O VALOR DA PARCELA E VALOR TOTAL DO PEDIDO NA TABELA PREPARAPRODUTO PARA ATUALIZA-LA
		$getInfoPreparaProduto = $preparaProdPed->getProduto();
		$idPreparaProduto = $getInfoPreparaProduto->idPreparaProduto;
		$valTotalProduto = $getInfoPreparaProduto->cpValorTotalProduto;
		$qtdParcela = $getInfoPreparaProduto->cpQtdParcela;
		
		$valorTotalAtualizado = $valTotalProduto + $valTotalAcrescimo;
		$parcelaAtualizada = $valorTotalAtualizado / $qtdParcela;
		
		if($getInfoPreparaProduto->cpQtdParcela > 0) {
			
			$preparaProdPed->__set("cpValorParcela", addslashes($parcelaAtualizada));
			$preparaProdPed->__set("cpValorTotalProduto", addslashes($valorTotalAtualizado));
			
		}else{
			
			$preparaProdPed->__set("cpValorParcela", 0);
			$preparaProdPed->__set("cpValorTotalProduto", $valorTotalAtualizado);
		}
		
		if(empty($_REQUEST["cpAcrescimo"])):
			
			echo "<script language='javascript'>
						window.alert('O campo [ ACRÉSCIMO  ] DEVE SER PREENCHIDO  !');
						window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
					</script>";
		
		elseif($_REQUEST["cpQtdAcrescimo"]== 0):
		
			echo "<script language='javascript'>
							window.alert('O campo [ QUANTIDADE ] DEVE SER SELECIONADO !');
							window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
						</script>";
		else:
				$preparaProdPed->UPDATE_VALORES($idPreparaProduto);
				$preparaAcrescimo->INSERT();
		
				echo "Acréscimo inserido com sucesso !";
		endif;
	endif;
	
	if($_REQUEST["acao"] == "deletarProdPedido"):
	
		$id = (int)$_REQUEST["id"];
	
		$preparaProdPed->DELETE($id);
		
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		
	endif;
	
	if($_REQUEST["acao"] == "deletarPreparaAcrescimo"):
		
		$id = (int)$_GET["id"];         
	
		$getInfoUltimoPedido = $ped->getInfoPedido();
		$idUltimoPedido = $getInfoUltimoPedido->idPedido;
	    $getInfoPedido = $ped->getId($idUltimoPedido);
		
		$getInfoPreparaAcrescimo = $preparaAcrescimo->getId($id); // RETORNA INFORMAÇÕES VIA ID PREPARA ACRESCIMO
		$getInfoPreparaProduto = $preparaProdPed->getProduto();  
		
		$valTotaAcrescimoPorID = $getInfoPreparaAcrescimo->cpValorTotalAcrescimo;
		$idPreparaProduto = $getInfoPreparaProduto->idPreparaProduto;
		$valTotalProduto = $getInfoPreparaProduto->cpValorTotalProduto;
		$qtdParcela = $getInfoPreparaProduto->cpQtdParcela;
		
		$valorTotalAtualizado = $valTotalProduto - $valTotaAcrescimoPorID;
		$valorParcelaAtualizado = $valorTotalAtualizado / $qtdParcela;
			
		if($qtdParcela > 0) {

			$preparaProdPed->__set("cpValorParcela", $valorParcelaAtualizado);
			$preparaProdPed->__set("cpValorTotalProduto", $valorTotalAtualizado);
			$ped->__set("cpValorParcela", $valorParcelaAtualizado);
			$ped->__set("cpValorTotalPedido", $valorTotalAtualizado);
			
		}else{
			
			$preparaProdPed->__set("cpValorParcela", 0);
			$preparaProdPed->__set("cpValorTotalProduto", $valorTotalAtualizado);
			$ped->__set("cpValorParcela", 0);
			$ped->__set("cpValorTotalPedido",$valorTotalAtualizado);
		}

		
		$preparaAcrescimo->DELETE($id);
		$preparaProdPed->UPDATE_VALORES($idPreparaProduto);
		$ped->UPDATE_VALORES($getInfoPedido->idPedido);
		
		
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		
	endif;
