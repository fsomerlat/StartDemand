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
		
		//	RECALCULAR PEDIDO COM TAXA DE JUROS
		
		$formaPagamento = $getInfoPreparaProduto->cpFormaPagamentoPedido;
		$porcentagemTaxaJuros = $getInfoPreparaProduto->cpPorcentagemJurosPedido;
		$valorTaxaJuros = $getInfoPreparaProduto->cpValorTaxaJurosPedido;
		$valorLiquido = $getInfoPreparaProduto->cpValorTotalLiquidoPedido;
		
		$valorTotalAtual = $valTotalProduto + $valTotalAcrescimo;
		$parcelaAtualizada = $valorTotalAtual / $qtdParcela;
		$valorTotalLiquido = $valorTotalAtual - substr($valorTaxaJuros,0,5);
	   
		$valorTotalAtualizado = $valTotalProduto + $valTotalAcrescimo;
		$valorTaxaJurosCalculado = ($porcentagemTaxaJuros * $valTotalAcrescimo) / 100;
		$valorJurosAtualizado =  $valorTaxaJurosCalculado + $valorTaxaJuros;
		
		if($porcentagemTaxaJuros != "D") {
			
			$preparaProdPed->__set("cpValorTaxaJurosPedido", addslashes(substr($valorJurosAtualizado,0,5)));
			$preparaProdPed->__set("cpValorTotalLiquidoPedido", addslashes($valorTotalLiquido));
			
		} else {
			
			$preparaProdPed->__set("cpValorTaxaJurosPedido", addslashes(substr($valorTaxaJuros,0,5)));
			$preparaProdPed->__set("cpValorTotalLiquidoPedido", addslashes($valorTotalAtual));
		}
		
		if($getInfoPreparaProduto->cpQtdParcela > 0) {
			
			$preparaProdPed->__set("cpValorParcela", addslashes($parcelaAtualizada));
			$preparaProdPed->__set("cpValorTotalProduto", addslashes($valorTotalAtual));
			
		}else{
			
			$preparaProdPed->__set("cpValorParcela", 0);
			$preparaProdPed->__set("cpValorTotalProduto", $valorTotalAtual);
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
		
		$formaPagamento = $getInfoPreparaProduto->cpFormaPagamento;
		$porcentagemTaxaJuros = $getInfoPreparaProduto->cpPorcentagemJurosPedido;
		$valorTaxaJuros = $getInfoPreparaProduto->cpValorTaxaJurosPedido;
		
		$valorTotalAtualizado = $valTotalProduto - $valTotaAcrescimoPorID;
		$valorParcelaAtualizado = $valorTotalAtualizado / $qtdParcela;
		
		$taxaJurosAtualizada = ($valTotaAcrescimoPorID * $porcentagemTaxaJuros) / 100;
		$valorTotalLiquidoAtualizado =   $valorTotalAtualizado - substr($taxaJurosAtualizada,0,5); // EX. 9.9 =  SEMPRE ARREDONDARÁ PRA 10.1 -> 10.10
		
		if($formaPagamento != "D") {
			
			$preparaProdPed->__set("cpValorTaxaJurosPedido", addslashes(substr($taxaJurosAtualizada,0,5)));
			$preparaProdPed->__set("cpValorTotalLiquidoPedido", addslashes($valorTotalLiquidoAtualizado));
			
		}else{
			
			$preparaProdPed->__set("cpValorTaxaJurosPedido", addslashes($valorTaxaJuros,0,5));
			$preparaProdPed->__set("cpValorTotalLiquidoPedido", $valorTotalAtualizado);
		}
		
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
