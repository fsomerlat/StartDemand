<?php require_once '../core/include.php'; 
	
	$ped = new Pedido();
	$preparaProduto =  new PreparaProduto();
	$preparaAcrescimo = new PreparaAcrescimo();
	$acrescimo =  new Acrescimo();
	
	
	if($_REQUEST["acao"] == "gerar pedido"):
	
		$ped->__set("tuProduto_idProduto", addslashes($_REQUEST["tuProduto_idProduto"]));
		$ped->__set("tsPreparaPedido_idPreparaPedido", "99999999999");
		$ped->__set("cpCodPedido", $_REQUEST["cpCodPedido"]);
		$ped->__set("cpStatusPedido", addslashes($_REQUEST["cpStatusPedido"]));
		$ped->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$ped->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$ped->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$ped->__set("cpValorTotalProduto", $_REQUEST["cpValorTotalProduto"]);
 		$ped->__set("cpValorTotalPedido", addslashes($_REQUEST["cpValorTotalPedido"]));
		$ped->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
		
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
		else:
		
		$ped->INSERT();
		echo "<script language='javascript'>
					window.alert('Pedido gerado com sucesso !');
					window.location.href='../view/Pedido.php?panel=193158';
				</script>";
		endif;
	endif;
	
	
	if($_REQUEST["acao"] == "gerar pedido com acrescimo"):
		
		$fk =  $_REQUEST["tuProduto_idProduto"];
	
		$preparaProduto->__set("tuProduto_idProduto", $fk);
		$preparaProduto->__set("cpCodPedido", addslashes($_REQUEST["cpCodPedido"]));
		$preparaProduto->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$preparaProduto->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$preparaProduto->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$preparaProduto->__set("cpValorTotalProduto", addslashes($_REQUEST["cpValorTotalProduto"]));
		$preparaProduto->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));

		
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
	    $valTotalProduto = $getInfoPreparaProduto->cpValorTotalProduto;
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
	    $ped->__set("cpValorTotalProduto", addslashes($valTotalProduto));
	    $ped->__set("cpValorTotalPedido", addslashes($somaTotalPedido));
	    $ped->__set("cpObservacaoPedido", addslashes($obsPedido));
	    
	    $getInfoProduto = $preparaProduto->getProduto(); //RETORNA SEMPRE O ULTIMO REGISTRO DA TABELA tuPedido para ser inserido na tsPreparaProduto
	  
	    $codProduto = $getInfoProduto->cpCodPedido;
	  
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
		    	$acrescimo->__set("cpValorTotalAcrescimo", addslashes($res->cpValorTotalAcrescimo));
		    	$acrescimo->__set("cpObservacaoAcrescimo", addslashes($res->cpObservacaoAcrescimo));
		    	 
		    	$acrescimo->INSERT();
	    
	    	endforeach;
	    	
	    	//$preparaAcrescimo->DELETATUDO();
	    	echo "Pedido [ PRODUTO COM ACRÉSCIMO ] gerado com sucesso !";
	    
	   } elseif ($preparaAcrescimo->getRow() == 0 && $preparaProduto->getRow() == 0){
	   	
	   		echo "Informe um [ PRODUTO ] e um [ ACRÉSCIMO ] para gerar um pedido !";
	   
	   } elseif($preparaProduto->getRow() == 1 && $preparaAcrescimo->getRow() > 0 && $comparaIdsDuplicados > 0) {

	   		
	   		$getInfoPedido = $ped->getInfoPedido();
	   		$UltimoIdPedido = $getInfoPedido->idPedido;
	   		
    		$getInfoPedido = $ped->getId($UltimoIdPedido); 
    		$idPedido = $getInfoPedido->idPedido;
     		$codPedido = $getInfoPedido->cpCodPedido;
				
			//SETA ACRÉSCIMO
			foreach($arryAll as $key => $res):
				
				$acrescimo->__set("tuPedido_idPedido", addslashes($idPedido)); 
				$acrescimo->__set("tuPedido_cpCodPedido", addslashes($codPedido));
				
				$acrescimo->__set("cpAcrescimo", addslashes($res->cpAcrescimo));
				$acrescimo->__set("cpQtdAcrescimo", addslashes($res->cpQtdAcrescimo));
				$acrescimo->__set("cpValorBaseAcrescimo", addslashes($res->cpValorBaseAcrescimo));
				$acrescimo->__set("cpTipoAcrescimo","P"); // P = VINCULADO A UM PEDIDO
				$acrescimo->__set("cpValorTotalAcrescimo", addslashes($res->cpValorTotalAcrescimo));
				$acrescimo->__set("cpObservacaoAcrescimo", addslashes($res->cpObservacaoAcrescimo));
				
				$acrescimo->INSERT();
				
			endforeach;
	    	
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
		
		$ped->UPDATESTATUS($id);
		$acrescimo->UPDATESTATUS($id);
		
		header("location:../view/listarPedidos.php");
		
	endif;
	
	if($_REQUEST["acao"] == "finalizar"):
		
		$id = $_REQUEST["id"];
	
		$ped->__set("cpStatusPedido", "F");
		$acrescimo->__set("cpStatusAcrescimo", "F");
		
		$ped->UPDATESTATUS($id);
		$acrescimo->UPDATESTATUS($id);
		
		header("location:../view/listarPedidos.php");
		
	endif;
	
	if($_REQUEST["acao"] == "atualizar"):
	 
		$id = (int)$_GET["id"];
		 
		$preparaProduto->__set("tuProduto_idProduto", addslashes($_REQUEST["tuProduto_idProduto"]));
		$preparaProduto->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$preparaProduto->__set("cpComplementoUm", addslashes($_REQUEST["cpComplementoUm"]));
		$preparaProduto->__set("cpComplementoDois", addslashes($_REQUEST["cpComplementoDois"]));
		$preparaProduto->__set("cpValorTotalProduto", addslashes($_REQUEST["cpValorTotalProduto"]));
		$preparaProduto->__set("cpObservacaoPedido", addslashes($_REQUEST["cpObservacaoPedido"]));
			
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
	
	
	
	