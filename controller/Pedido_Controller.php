<?php require_once '../core/include.php';  session_start();
	
	$ped = new Pedido();
	$preparaProduto =  new PreparaProduto();
	$preparaAcrescimo = new PreparaAcrescimo();
	$acrescimo =  new Acrescimo();
	$financeiro = new Financeiro();
	
	if($_REQUEST["acao"] == "gerar pedido"):
	
		$ped->__set("tuProduto_idProduto", addslashes($_REQUEST["tuProduto_idProduto"]));
		$ped->__set("cpCodPedido", $_REQUEST["cpCodPedido"]);
		$ped->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$ped->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$ped->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$ped->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$ped->__set("cpValorTotalProduto", $_REQUEST["cpValorTotalProduto"]);
 		$ped->__set("cpValorTotalPedido", addslashes($_REQUEST["cpValorTotalPedido"]));
 		$ped->__set("cpFormaPagamento",addslashes($_REQUEST["cpFormaPagamento"]));
 		
 		
 		//VERIFICAR A FORMA DE PAGAMENTO
 		
 		$porcentagemJuros = substr($_REQUEST["cpPorcentagemJurosPedido"],0,4);
 		$valorTaxaJuros = substr($_REQUEST["cpValorTaxaJurosPedido"],0,4);
 		$valorTotalLiquido = substr($_REQUEST["cpValorTotalLiquidoPedido"],0,4);
 		
 		$arryBandeira = explode("-", $_REQUEST["cpBandeiraCartaoPedido"]);
 		$bandeiraCartao = $arryBandeira[0];
 		
 		$arryPlanoPagSeguro = explode("-", $_REQUEST["cpPlanoPagSeguroPedido"]);
 		$planoPagSeguro = $arryPlanoPagSeguro[0];		
 		
 		$ped->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
 			
 		if($_REQUEST["cpFormaPagamento"] == "PS"):
 	
	 		$ped->__set("cpPlanoPagSeguroPedido",addslashes($planoPagSeguro));
	 		$ped->__set("cpBandeiraCartaoPedido", addslashes("PagSeguro"));
	 		$ped->__set("cpPorcentagemJurosPedido",addslashes($porcentagemJuros));
	 		$ped->__set("cpValorTaxaJurosPedido",addslashes($valorTaxaJuros));
	 		$ped->__set("cpValorTotalLiquidoPedido",addslashes($valorTotalLiquido));
	 		$ped->__set("cpQtdParcela", 0);
	 		$ped->__set("cpValorParcela", 0);
	 		
	 		elseif($_REQUEST["cpFormaPagamento"] == "CC"):
		 		
	 			$ped->__set("cpQtdParcela", addslashes($_REQUEST["cpQtdParcela"]));
	 			$ped->__set("cpValorParcela", addslashes($_REQUEST["cpValorParcela"]));
	 			$ped->__set("cpPlanoPagSeguroPedido", 0);
	 			$ped->__set("cpBandeiraCartaoPedido", addslashes($bandeiraCartao));
	 			$ped->__set("cpPorcentagemJurosPedido",addslashes($porcentagemJuros));
	 			$ped->__set("cpValorTaxaJurosPedido",addslashes($valorTaxaJuros));
	 			$ped->__set("cpValorTotalLiquidoPedido",addslashes($valorTotalLiquido));
	 			
	 		elseif($_REQUEST["cpFormaPagamento"] == "CD"):
	 			
		 		$ped->__set("cpPlanoPagSeguroPedido", 0);
		 		$ped->__set("cpBandeiraCartaoPedido",addslashes($bandeiraCartao));
		 		$ped->__set("cpPorcentagemJurosPedido",addslashes($porcentagemJuros));
		 		$ped->__set("cpValorTaxaJurosPedido",addslashes($valorTaxaJuros));
		 		$ped->__set("cpValorTotalLiquidoPedido",addslashes($valorTotalLiquido));
		 		$ped->__set("cpQtdParcela", 0);
		 		$ped->__set("cpValorParcela", 0);
		 		
 			else:
 			
	 			$ped->__set("cpPlanoPagSeguroPedido", 0);
	 			$ped->__set("cpBandeiraCartaoPedido", 0);
	 			$ped->__set("cpPorcentagemJurosPedido", 0);
	 			$ped->__set("cpValorTaxaJurosPedido", 0);
	 			$ped->__set("cpValorTotalLiquidoPedido",addslashes($_REQUEST["cpValorTotalPedido"]));
	 			$ped->__set("cpQtdParcela", 0);
	 			$ped->__set("cpValorParcela", 0);
 				
 		endif;		

 		
 		//CONTINUAR VERIFICANDO A FORMA DE PAGAMENTO
 		
		if($_REQUEST["tipoPedido"] == ""):
			
			echo "<script language='javascript'>
						window.alert('Informe o [ TIPO DO PEDIDO ] !');
						window.location.href='../view/Pedido.php?panel=193158';
					</script>";
		
		elseif($_REQUEST["tuProduto_idProduto"] == 0):
		
			echo "<script language='javascript'>
						window.alert('È necessário selecionar o campo [ NOME PRODUTO ] ! ');
						window.location.href='../view/Pedido.php?panel=193158';
					</script>";
		
		elseif ($_REQUEST["cpCodPedido"] == 0):
		
			echo "<script language='javascript'>
							window.alert('È necessário selecionar o campo [ CÓDIGO PRODUTO ] !');
							window.location.href='../view/Pedido.php?panel=193158';
						</script>";
		
		elseif ($_REQUEST["cpQtdProduto"] == 0):
		
			echo "<script language='javascript'>
								window.alert('È necessário selecionar o campo [ QUANTIDADE PRODUTO ] !');
								window.location.href='../view/Pedido.php?panel=193158';
							</script>";
		
		elseif ($_REQUEST["cpComplementoUm"] == ''):
		
			echo "<script language='javascript'>
								window.alert('È necessário selecionar o campo [ 1ª COMPLEMENETO ] !');
								window.location.href='../view/Pedido.php?panel=193158';
							</script>";
		
		elseif ($_REQUEST["cpComplementoDois"] == ''):
		
			echo "<script language='javascript'>
								window.alert('È necessário selecionar o campo [ 2ª COMPLEMENETO ] !');
								window.location.href='../view/Pedido.php?panel=193158';
							</script>";
		
		elseif($_REQUEST["cpFormaPagamento"] == ""):
			
			echo "<script language='javascript'>
									window.alert('È necessário selecionar o campo [ FORMA DE PAGAMENTO ] !');
									window.location.href='../view/Pedido.php?panel=193158';
								</script>";
		
			else:
			
			
				$ped->INSERT();
				echo "<script language='javascript'>
							window.alert('Pedido gerado com sucesso !');
							window.location.href='../view/Pedido.php?panel=193158';
						</script>";
		endif;
	endif;
	
	
	if($_REQUEST["acao"] == "gerar pedido com acrescimo"):  // INSERIR IDPREPARA PEDIDO NA TABELA PEDIDO PARA CANCELAR 
		
		$fk =  $_REQUEST["tuProduto_idProduto"];
	
		$preparaProduto->__set("tuProduto_idProduto", $fk);
		$preparaProduto->__set("cpCodPedido", addslashes($_REQUEST["cpCodPedido"]));
		$preparaProduto->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$preparaProduto->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$preparaProduto->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$preparaProduto->__set("cpValorBaseProduto", addslashes($_REQUEST["cpValorBaseProduto"]));
		$preparaProduto->__set("cpValorTotalProduto", addslashes($_REQUEST["cpValorTotalProduto"]));
		$preparaProduto->__set("cpFormaPagamento",addslashes($_REQUEST["cpFormaPagamento"]));
		$preparaProduto->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
	    
		$porcentagemJuros = substr($_REQUEST["cpPorcentagemJurosPedido"],0,4);
		$valorTaxaJuros = substr($_REQUEST["cpValorTaxaJurosPedido"],0,4);
		$valorTotalLiquido = substr($_REQUEST["cpValorTotalLiquidoPedido"],0,4);
		
		$arryPlanoPagSeguro = explode("-", $_REQUEST["cpPlanoPagSeguroPedido"]);
		$planoPagSeguro = $arryPlanoPagSeguro[0];
	    
		$arryBandeira = explode("-",$_REQUEST["cpBandeiraCartaoPedido"]);
		$bandeiraCartao = $arryBandeira[0];
		
		if($_REQUEST["cpFormaPagamento"] == "PS"):
		
			$preparaProduto->__set("cpPlanoPagSeguroPedido",addslashes($planoPagSeguro));
			$preparaProduto->__set("cpBandeiraCartaoPedido", addslashes("PagSeguro"));
			$preparaProduto->__set("cpPorcentagemJurosPedido",addslashes($porcentagemJuros));
			$preparaProduto->__set("cpValorTaxaJurosPedido",addslashes($valorTaxaJuros));
			$preparaProduto->__set("cpValorTotalLiquidoPedido",addslashes($valorTotalLiquido));
			$preparaProduto->__set("cpQtdParcela", 0);
			$preparaProduto->__set("cpValorParcela", 0);
			
		elseif($_REQUEST["cpFormaPagamento"] == "CC"):
		 
			$preparaProduto->__set("cpQtdParcela", addslashes($_REQUEST["cpQtdParcela"]));
			$preparaProduto->__set("cpValorParcela", addslashes($_REQUEST["cpValorParcela"]));
			$preparaProduto->__set("cpPlanoPagSeguroPedido", 0);
			$preparaProduto->__set("cpBandeiraCartaoPedido", addslashes($bandeiraCartao));
			$preparaProduto->__set("cpPorcentagemJurosPedido",addslashes($porcentagemJuros));
			$preparaProduto->__set("cpValorTaxaJurosPedido",addslashes($valorTaxaJuros));
			$preparaProduto->__set("cpValorTotalLiquidoPedido",addslashes($valorTotalLiquido));
			
		elseif($_REQUEST["cpFormaPagamento"] == "CD"):
			
			$preparaProduto->__set("cpPlanoPagSeguroPedido", 0);
			$preparaProduto->__set("cpBandeiraCartaoPedido",addslashes($bandeiraCartao));
			$preparaProduto->__set("cpPorcentagemJurosPedido",addslashes($porcentagemJuros));
			$preparaProduto->__set("cpValorTaxaJurosPedido",addslashes($valorTaxaJuros));
			$preparaProduto->__set("cpValorTotalLiquidoPedido",addslashes($valorTotalLiquido));
			$preparaProduto->__set("cpQtdParcela", 0);
			$preparaProduto->__set("cpValorParcela", 0);
		 
		else:
		
			$preparaProduto->__set("cpPlanoPagSeguroPedido", 0);
			$preparaProduto->__set("cpBandeiraCartaoPedido", 0);
			$preparaProduto->__set("cpPorcentagemJurosPedido", 0);
			$preparaProduto->__set("cpValorTaxaJurosPedido", 0);
			$preparaProduto->__set("cpValorTotalLiquidoPedido",addslashes($_REQUEST["cpValorTotalPedido"]));
			$preparaProduto->__set("cpQtdParcela", 0);
			$preparaProduto->__set("cpValorParcela", 0);
			
		endif;
		
		if($_REQUEST["tipoPedido"] == ""):
		
			echo "<script language='javascript'>
						window.alert('Informe o [ TIPO DO PEDIDO ] !');
						window.location.href='../view/Pedido.php?panel=193158';
					</script>";
		
		elseif($preparaProduto->getRow() > 0):
			
			echo "<script language='javascript'>
						window.alert('Um pedido com acréscimo já está sendo preparado. Finalize-o para continuar !');
						window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
					</script>";
	
		elseif($_REQUEST["tuProduto_idProduto"] == 0):
		
			echo "<script language='javascript'>
						window.alert('È necessário selecionar o campo [ NOME PRODUTO ] ! ');
						window.location.href='../view/Pedido.php?panel=193158';
					</script>";
		
		elseif ($_REQUEST["cpCodPedido"] == 0):
		
			echo "<script language='javascript'>
							window.alert('È necessário selecionar o campo [ CÓDIGO PRODUTO ] !');
							window.location.href='../view/Pedido.php?panel=193158';
						</script>";
		
		elseif ($_REQUEST["cpQtdProduto"] == 0):
		
			echo "<script language='javascript'>
								window.alert('È necessário selecionar o campo [ QUANTIDADE PRODUTO ] !');
								window.location.href='../view/Pedido.php?panel=193158';
							</script>";
		
		elseif ($_REQUEST["cpComplementoUm"] == ''):
		
			echo "<script language='javascript'>
								window.alert('È necessário selecionar o campo [ 1ª COMPLEMENETO ] !');
								window.location.href='../view/Pedido.php?panel=193158';
							</script>";
		
		elseif ($_REQUEST["cpComplementoDois"] == ''):
		
			echo "<script language='javascript'>
								window.alert('È necessário selecionar o campo [ 2ª COMPLEMENETO ] !');
								window.location.href='../view/Pedido.php?panel=193158';
							</script>";
		else:
		
			$preparaProduto->INSERT();
	
			header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		endif;
	endif;
	
	
	if(isset($_REQUEST["confirm"])):
		
		$somaTotalPedido = $_REQUEST["valTotalPedido"];
	
		$getInfoPreparaProduto = $preparaProduto->getProduto(); 
	    
	    $fkProduto = $getInfoPreparaProduto->tuProduto_idProduto;
	    $idPreparaProduto = $getInfoPreparaProduto->idPreparaProduto;
	    $codPreparaProduto = $getInfoPreparaProduto->cpCodPedido;
	    $qtdProd = $getInfoPreparaProduto->cpQtdProduto;
	    $complementoUm = $getInfoPreparaProduto->cpComplementoUm;
	    $complementoDois = $getInfoPreparaProduto->cpComplementoDois;
	    $valBaseProduto = $getInfoPreparaProduto->cpValorBaseProduto;
	    $valTotalProduto = $getInfoPreparaProduto->cpValorTotalProduto;
	    $formaPagamento = $getInfoPreparaProduto->cpFormaPagamento;
	    $qtdParcela = $getInfoPreparaProduto->cpQtdParcela;
	    
	    
	    //**************************VERIFICAR REGRAS DE JUROS AO INCLUIR ACRÉSCIMO NOVAMENTE
	    
	    $planoPagSeguro = $getInfoPreparaProduto->cpPlanoPagSeguroPedido;
	    $porcentagemJuros = $getInfoPreparaProduto->cpPorcentagemJurosPedido;
	    $bandeiraCartao = $getInfoPreparaProduto->cpBandeiraCartaoPedido;
	    $valorTaxaJuros = $getInfoPreparaProduto->cpValorTaxaJurosPedido;
	    $valorTotalLiquido = $getInfoPreparaProduto->cpValorTotalLiquidoPedido;
	    
	    $valorMultiplicadoProduto = $valBaseProduto * $qtdProd;
	    
	    $valorParcela = $somaTotalPedido / $qtdParcela;
	    
	    $obsPedido = $getInfoPreparaProduto->cpObservacaoPedido;
	    	
	    //BUSCA INFO TABELA PREPARA ACRÉSCIMO
	    $arryAll = $preparaAcrescimo->getAll();
	    
	    //UM PEDIDO COM ACRÉSCIMO POR VEZ

	    $ped->__set("tuProduto_idProduto", addslashes($fkProduto));
	    $ped->__set("tsPreparaProduto_idPreparaProduto",addslashes($idPreparaProduto));
	    $ped->__set("cpCodPedido", addslashes($codPreparaProduto));
		$ped->__set("cpQtdProduto", addslashes($qtdProd));
	    $ped->__set("cpComplementoUm", addslashes($complementoUm));
	    $ped->__set("cpComplementoDois", addslashes($complementoDois));
	    $ped->__set("cpPlanoPagSeguroPedido", addslashes($planoPagSeguro));
	    $ped->__set("cpPorcentagemJurosPedido", addslashes($porcentagemJuros));
	    $ped->__set("cpBandeiraCartaoPedido", addslashes($bandeiraCartao));
	    $ped->__set("cpValorTaxaJurosPedido", addslashes($valorTaxaJuros));
	    $ped->__set("cpValorTotalLiquidoPedido", addslashes($valorTotalLiquido));
	    
	    $ped->__set("cpValorTotalProduto", addslashes($valorMultiplicadoProduto));
	    $ped->__set("cpValorTotalPedido", addslashes($somaTotalPedido));
	    
	    $ped->__set("cpFormaPagamento", addslashes($formaPagamento));
	    
	    if($qtdParcela > 0) {
	 
	    	$ped->__set("cpQtdParcela", addslashes($qtdParcela));
	    	$ped->__set("cpValorParcela", addslashes($valorParcela));
	    	
	    } else {
	    	
	    	$ped->__set("cpQtdParcela", 0);
	    	$ped->__set("cpValorParcela", 0);
	    }
	    
	    $ped->__set("cpObservacaoPedido", addslashes(trim($obsPedido)));
	    
	    $getInfoPreparaProduto = $preparaProduto->getProduto(); 
	  
	    $codProduto = $getInfoPreparaProduto->cpCodPedido;
	  
	    $comparaIdsDuplicados = $ped->comparaRelacionamentoIds();
	    
	    
	   if($preparaAcrescimo->getRow() > 0 && $preparaProduto->getRow() > 0 && $comparaIdsDuplicados == 0) { 
	    	
	   		
	   		$ped->INSERT(); 
		   	
	    	$getInfoPedido = $ped->getInfoPedido(); //RETORNA SEMPRE O ULTIMO REGISTRO DA TABELA tuPedido para ser inserido na tsPreparaProduto
	    	$idPedido = $getInfoPedido->idPedido;
	    	$codPedido = $getInfoPedido->cpCodPedido;
	    	 
	    	//SETA ACRÉSCIMO
	    	foreach($arryAll as $key => $res):
	    	 
		    	$acrescimo->__set("tuPedido_idPedido", addslashes($idPedido)); //AQUI É INSERIDO SEMPRE O ULTIMO ID DA TABELA tsPraparaPedido
		    	$acrescimo->__set("tuPedido_cpCodPedido", addslashes($codPedido));
		    	$acrescimo->__set("cpAcrescimo", addslashes($res->cpAcrescimo));
		    	$acrescimo->__set("cpQtdAcrescimo", addslashes($res->cpQtdAcrescimo));
		    	$acrescimo->__set("cpValorBaseAcrescimo", addslashes($res->cpValorBaseAcrescimo));
		    	$acrescimo->__set("cpTipoAcrescimo","P"); // P = VINCULADO A UM PEDIDO
		    	$acrescimo->__set("cpFormaPagamentoAcrescimo","PD"); //FORMA DEPAGAMENTO ESTÁ DECLARADA NO PEDIDO
		    	$acrescimo->__set("cpQtdParcelaAcrescimo", 0); // PARCELA DELCARADA NO PEDIDO
		    	$acrescimo->__set("cpValorParcelaAcrescimo",0); //VALOR DA PARCELA ESTÁ DEFINIDO NO PEDIDO
		    	//CAMPOS VINCULADOS AO PEDIDO
		    	$acrescimo->__set("cpBandeiraCartao", "PD");
		    	$acrescimo->__set("cpPorcentagemTaxa", 0);
		    	$acrescimo->__set("cpValorTaxaJuros", 0);
		    	$acrescimo->__set("cpValorTotalLiquido", 0);
		    	$acrescimo->__set("cpValorTotalAcrescimo", addslashes($res->cpValorTotalAcrescimo));
		    	$acrescimo->__set("cpObservacaoAcrescimo", addslashes(trim($res->cpObservacaoAcrescimo)));
		    	 
		    	$acrescimo->INSERT();
	    
	    	endforeach;
	    	
	    	$preparaAcrescimo->DELETATUDO();
	    	echo "Pedido [ PRODUTO COM ACRÉSCIMO ] gerado com sucesso !";
	    
	   } elseif ($preparaAcrescimo->getRow() == 0 && $preparaProduto->getRow() == 0){
	   	
	   		echo "Informe um [ PRODUTO ] e um [ ACRÉSCIMO ] para gerar um pedido !";
	   
	   } elseif($preparaProduto->getRow() == 1 && $preparaAcrescimo->getRow() > 0 && $comparaIdsDuplicados > 0) {
	   	
 	   		$getInfoPedido = $ped->getInfoPedido();
	   		$UltimoIdPedido = $getInfoPedido->idPedido;
	   		
    		$getInfoPedido = $ped->getId($UltimoIdPedido); 
    		$idPedido = $getInfoPedido->idPedido;
     		$codPedido = $getInfoPedido->cpCodPedido;
     		$valTotalPedido = $getInfoPedido->cpValorTotalPedido;
     		
     		//RETORNA O JUROS E OVALOR DO PEDIDO RECALCULADO PARA SER ATUAZALIDO     //******************   ATUALIZANDO JUROS DE DO PEDIDO EM TEMPO DE EXECUÇÃO
     	
     		$preparaProduto->__set("cpValorTaxaJurosPedido", substr($valorTaxaJuros,0,4));
     		$preparaProduto->__set("cpValorTotalLiquidoPedido", substr($valorTotalLiquido,0,4));
     		$ped->__set("cpValorTaxaJurosPedido", substr($valorTaxaJuros,0,4));
     		$ped->__set("cpValorTotalLiquidoPedido", substr($valorTotalLiquido,0,4));
     	
     		if($qtdParcela > 0){
     		
     			$preparaProduto->__set("cpValorParcela", $valorParcela);
     			$preparaProduto->__set("cpValorTotalProduto", $valTotalProduto);
     			$ped->__set("cpValorParcela", $valorParcela);
     			$ped->__set("cpValorTotalPedido", $valTotalProduto);
     		
     		} else {
     		
     			$preparaProduto->__set("cpValorParcela", 0);
     			$preparaProduto->__set("cpValorTotalProduto", $valTotalProduto);
     			$ped->__set("cpValorParcela", 0);
     			$ped->__set("cpValorTotalPedido", $valTotalProduto);
     		}
     		
			//SETA ACRÉSCIMO
			foreach($arryAll as $key => $res):
				
				$acrescimo->__set("tuPedido_idPedido", addslashes($idPedido)); 
				$acrescimo->__set("tuPedido_cpCodPedido", addslashes($codPedido));
				$acrescimo->__set("cpAcrescimo", addslashes($res->cpAcrescimo));
				$acrescimo->__set("cpQtdAcrescimo", addslashes($res->cpQtdAcrescimo));
				$acrescimo->__set("cpValorBaseAcrescimo", addslashes($res->cpValorBaseAcrescimo));
				$acrescimo->__set("cpTipoAcrescimo","P"); // P = VINCULADO A UM PEDIDO
				$acrescimo->__set("cpFormaPagamentoAcrescimo","PD"); //FORMA DEPAGAMENTO ESTÁ DECLARADA NO PEDIDO
				$acrescimo->__set("cpQtdParcelaAcrescimo", 0); // PARCELA DELCARADA NO PEDIDO
				$acrescimo->__set("cpValorParcelaAcrescimo",0); //VALOR DA PARCELA ESTÁ DEFINIDO NO PEDIDO
				//CAMPOS VINCULADOS AO PEDIDO
				$acrescimo->__set("cpBandeiraCartao", "PD");
				$acrescimo->__set("cpPorcentagemTaxa", 0);
				$acrescimo->__set("cpValorTaxaJuros", 0);
				$acrescimo->__set("cpValorTotalLiquido", 0);
				$acrescimo->__set("cpValorTotalAcrescimo", addslashes($res->cpValorTotalAcrescimo));
				$acrescimo->__set("cpObservacaoAcrescimo", addslashes(trim($res->cpObservacaoAcrescimo)));
						
				$acrescimo->INSERT();
				
			endforeach;
	
			$preparaProduto->UPDATE_VALORES($idPreparaProduto);
			$ped->UPDATE_VALORES($idPedido);
			$preparaAcrescimo->DELETATUDO();
			
			echo "Pedido [ ACŔESCIMO ] gerado com sucesso !";
	    }
	    
	    else {
	    	
	    	echo "Acréscimo deve ser informado para incluir no pedido [ ".$codProduto." ] !";
	}
	    
	endif;
	
	if($_REQUEST["acao"] == "cancelar"):
		
		$id = $_REQUEST["id"];
		$ped->__set("cpStatusPedido","C");
		$acrescimo->__set("cpStatusAcrescimo","C");
		
		if($ped->verificaPedidoFinalizado($id)):
		
			echo "<script language='javascript'>
						window.alert('Pedido [ FINALIZADO ] não pode ser cancelado !');
						window.history.go(-1);
					</script>";
		else:

			$ped->UPDATESTATUS($id);
			$acrescimo->UPDATESTATUS($id);
			header("location:../view/PainelDePedidos.php");
		endif;
	endif;
	
	if($_REQUEST["acao"] == "finalizar"):
		
		$id = $_REQUEST["id"]; 
		$getInfoPedido = $ped->getId($id);
			
		$idPreparaProduto = $getInfoPedido->tsPreparaProduto_idPreparaProduto;
		$preparaProduto->__set("idPreparaProduto", addslashes($idPreparaProduto));
		
		if($preparaProduto->listId($idPreparaProduto)):
		
			echo "<script language='javascript'>
						window.alert('Pedido a disposição do cliente. Aguarde um momento...');
						window.history.go(-1);
					</script>";
		
		else:
			
			$ped->__set("cpStatusPedido", "F");
			$acrescimo->__set("cpStatusAcrescimo", "F");
			
			$ped->UPDATESTATUS($id);
			$acrescimo->UPDATESTATUS($id);
			
			header("location:../view/listarPedidos.php");
			
		endif;
	endif;
	
	if($_REQUEST["acao"] == "atualizar"):
	 
		$id = (int)$_GET["id"];
		 
		$preparaProduto->__set("tuProduto_idProduto", addslashes($_REQUEST["tuProduto_idProduto"]));
		$preparaProduto->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$preparaProduto->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$preparaProduto->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$preparaProduto->__set("cpValorTotalProduto", addslashes($_REQUEST["cpValorTotalProduto"]));
		$preparaProduto->__set("cpObservacaoPedido", addslashes(trim($_REQUEST["cpObservacaoPedido"])));
			
		$preparaProduto->UPDATE($id);
		 
		echo "<script language='javascript'>
	   					window.alert('Registro atualizado com sucesso !');
	   					window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
	   				</script>";
	
	endif;
	
	if(isset($_REQUEST["efetivaPedido"])):
	
		if($preparaAcrescimo->getRow() == 0 && $preparaProduto->getRow() == 0 ):
			
			echo "Informe um [ PEDIDO ] e [ ACŔESCIMO ] para executar essa ação !";
		
		elseif($preparaProduto->getRowCodPedido() == 0):
		
			echo "È necessário que tenha pelo menos um pedido efetivado referente a esse código !";
		else:
		
			$preparaAcrescimo->DELETATUDO();
			$preparaProduto->DELETATUDO();
			echo "PEDIDO EFETIVADO !";
			
		endif;
	endif;
	
	if($_REQUEST["acao"] == "baixar"):
	
		$id = (int)$_GET["id"];		
	
		$getInfoPedido = $ped->getId($id); // RETORNA INFORMAÇÕES DO PEDIDO ATRAVEŚ DO IDPEDIDO
		
		$ped->__set("cpSituacaoPedido", "B");
		$ped->__set("cpUsuarioBaixa",addslashes($_SESSION['cpNome']));
		$acrescimo->__set("cpSituacaoAcrescimo", "B");
		
		$formaPagamento = $getInfoPedido->cpFormaPagamento;
		$qtdParcela = $getInfoPedido->cpQtdParcela;
		$valParcela = $getInfoPedido->cpValorParcela;
		$statusPedido = $getInfoPedido->cpStatusPedido;
		$valorTotalPed = $getInfoPedido->cpValorTotalPedido;
		$valorTotalLiquidoPed = $getInfoPedido->cpValorTotalLiquidoPedido;	
		
		
		if($ped->relacionaPedidoAcrescimo($id) || $ped->pedidoAndamentoIndividual($id)) :
			
			echo "<script language='javascript'>
						window.alert('Registro  [ EM ANDAMENTO ] não pode ser baixado !');
						window.history.go(-1);
				  </script>";
		else:
			
		
			$ped->UPDATE_SITUACAO_PEDIDO($id);
			$acrescimo->UPDATE_SITUACAO_ACRESCIMO_PEDIDO($id);

			$dataCriacaoPedido = substr($getInfoPedido->cpHoraPedido,0,10);
		
			$getInfFinanceiro = $financeiro->getInfoFinanceiro($dataCriacaoPedido);
			
			$valorTotal = $getInfFinanceiro->cpValorTotal;
			$valorTotalLiquido = $getInfFinanceiro->cpValorLiquidoTotal;
			
			$somaValorTotal = $valorTotalPed + $valorTotal;
			$somaValorLiquido = $valorTotalLiquidoPed + $valorTotalLiquido;

			$financeiro->__set("cpDataCompra", addslashes($dataCriacaoPedido));
			$financeiro->__set("cpStatusFinanceiro", addslashes($statusPedido));
			$financeiro->__set("cpValorTotal", addslashes($somaValorTotal));
			$financeiro->__set("cpValorLiquidoTotal", addslashes($somaValorLiquido));
			
			if($financeiro->verificaSituacao($dataCriacaoPedido, $statusPedido) == ""):	
			
	 			
				$financeiro->INSERT();
				
			else:
							
				$financeiro->UPDATE($dataCriacaoPedido,$statusPedido);			
			
			endif;
				
					echo "<script language='javascript'>
								window.alert('Pedido baixado com sucesso !');
								window.location.href='../view/PainelDePedidos.php';
							</script>";
			
		endif;
	endif;
	
	if($_REQUEST["filtroPedido"] == "filtroPedido"):
	
		$td = "";
		
		if($_REQUEST["tipoPesquisa"] == "T"):
			
			
			$getAll = $ped->getPedidoInProduto();
	
			foreach($getAll as $key => $res):
				
				$dataPedido = explode("-",substr($res->cpHoraPedido,0,10));
				
					$diaC = $dataPedido[2]; 
					$mesC = $dataPedido[1];
					$anoC = $dataPedido[0];
				
				$msgHoraPedido = $diaC."/".$mesC."/".$anoC; //." - ".substr($res->cpHoraPedido,10,19);
				
				$dataBaixa = explode("-",substr($res->cpDataBaixa,0,10));
				
					$diaB = $dataBaixa[2];
					$mesB = $dataBaixa[1];
					$anoB = $dataBaixa[0];
				
				$msgBaixaPedido = $diaB."/".$mesB."/".$anoB;//." - ".substr($res->cpDataBaixa,10,19);
				
				$usuarioBaixa = $res->cpUsuarioBaixa;
				
				($res->cpStatusPedido == "F") ? $status="Finalizado" : $status="Cancelado";
				
				$getInfoAcrescimo = $acrescimo->getId($res->idPedido);
				
				$td .= "<tr>";
				$td .= "<td>".$res->idPedido."</td>";
				$td .= "<td>".$status."</td>";
				$td .= "<td>".$res->cpNomeProduto."</td>";
				$td .= "<td>".$res->cpQtdProduto."</td>";
				$td .= "<td>".$res->cpComplementoUm."</td>";
				$td .= "<td>".$res->cpComplementoDois."</td>";		
				$td .= "<td class='danger'>".$getInfoAcrescimo->cpAcrescimo."</td>";
				$td .= "<td class='danger'>".$getInfoAcrescimo->cpQtdAcrescimo."</td>";
				$td .= "<td class='danger'>R$ ".$getInfoAcrescimo->cpValorBaseAcrescimo."</td>";
				$td .= "<td class='danger'>R$ ".$getInfoAcrescimo->cpValorTotalAcrescimo."</td>";
				$td .= "<td>".$msgHoraPedido."</td>";
				$td .= "<td class='isDetalhesPesquisaPedido'>
						<a href='#' title='Data do Pedido: "
								.$msgHoraPedido." Data baixa: "
								.$msgBaixaPedido." Usuário / baixa: "
								.$usuarioBaixa."'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
						</a>
				</td>";
				$td .= "<td>".$res->cpBandeiraCartaoPedido."</td>";
				$td .= "<td>R$ ".$res->cpValorTotalPedido."</td>";
				$td .= "<td>R$ ".$res->cpValorTotalLiquidoPedido."</td>";
			    $td .= "</tr>";
				
			endforeach;
			
			if(!empty($td)){
				
				echo $td;
			
			} else {
				
				$td = "";
				echo $td;
			}
			
		elseif($_REQUEST["tipoPesquisa"] == "D"):
		
		$td = "";
		
		$status = $_REQUEST["status"];
		$dataIn = explode("/", $_REQUEST["dataInicio"]);
		
			$diaIn = $dataIn[0];
			$mesIn = $dataIn[1];
			$anoIn = $dataIn[2];
		
		$dataInicio = $anoIn."-".$mesIn."-".$diaIn;
		
		$dataFin = explode("/", $_REQUEST["dataFinal"]);
			
			$diaFin = $dataFin[0];
			$mesFin = $dataFin[1];
			$anoFin = $dataFin[2];
		
		$dataFinal = $anoFin."-".$mesFin."-".$diaFin;
			
		$getAll = $ped->getBuscaPorData($status, $dataInicio, $dataFinal);
		
		foreach($getAll as $key => $res):
		
			$dataPedido = explode("-",substr($res->cpHoraPedido,0,10));
			
				$diaC = $dataPedido[2];
				$mesC = $dataPedido[1];
				$anoC = $dataPedido[0];
			
			$msgHoraPedido = $diaC."/".$mesC."/".$anoC ;//." - ".substr($res->cpHoraPedido,10,19);
			
			$dataBaixa = explode("-",substr($res->cpDataBaixa,0,10));
				
				$diaB = $dataBaixa[2];
				$mesB = $dataBaixa[1];
				$anoB = $dataBaixa[0];
			
			$msgBaixaPedido = $diaB."/".$mesB."/".$anoB." - ".substr($res->cpDataBaixa,10,19);
			
			$usuarioBaixa = $res->cpUsuarioBaixa;
			
			($res->cpStatusPedido == "F") ? $status="Finalizado" : $status="Cancelado";
			
			$getInfoAcrescimo = $acrescimo->getId($res->idPedido);
			
			$td .= "<tr>";
			$td .= "<td>".$res->idPedido."</td>";
			$td .= "<td>".$status."</td>";
			$td .= "<td>".$res->cpNomeProduto."</td>";
			$td .= "<td>".$res->cpQtdProduto."</td>";
			$td .= "<td>".$res->cpComplementoUm."</td>";
			$td .= "<td>".$res->cpComplementoDois."</td>";
			$td .= "<td class='danger'>".$getInfoAcrescimo->cpAcrescimo."</td>";
			$td .= "<td class='danger'>".$getInfoAcrescimo->cpQtdAcrescimo."</td>";
			$td .= "<td class='danger'>R$ ".$getInfoAcrescimo->cpValorBaseAcrescimo."</td>";
			$td .= "<td class='danger'>R$ ".$getInfoAcrescimo->cpValorTotalAcrescimo."</td>";
			$td .= "<td>".$msgHoraPedido."</td>";
			$td .= "<td class='isDetalhesPesquisaPedido'>
							<a href='#' title='Data do Pedido: "
							.$msgHoraPedido." Data baixa: "
							.$msgBaixaPedido." Usuário / baixa: "
							.$usuarioBaixa."'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
							</a>
					</td>";
			$td .= "<td>".$res->cpBandeiraCartaoPedido."</td>";
			$td .= "<td>R$ ".$res->cpValorTotalPedido."</td>";
			$td .= "<td>R$ ".$res->cpValorTotalLiquidoPedido."</td>";
			$td .= "</tr>";

		endforeach;
			
		if(!empty($td)){

			echo $td;
				
		} else {

			$td = "";
			echo $td;
		}
	endif;
endif;
	
	
	