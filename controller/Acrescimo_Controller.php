<?php	require_once '../core/include.php';

	$acrescimo =  new Acrescimo();
	$parcelasAcrescimo = new ParcelaAcrescimo();
	
	
	if($_REQUEST["acao"] == "cadastrar"):

		$acrescimo->__set("tuPedido_cpCodPedido", addslashes($_REQUEST["tuPedido_cpCodPedido"]));
		$acrescimo->__set("cpAcrescimo", addslashes($_REQUEST["cpAcrescimo"]));
		$acrescimo->__set("cpQtdAcrescimo", addslashes($_REQUEST["cpQtdAcrescimo"]));
		$acrescimo->__set("cpValorBaseAcrescimo", addslashes($_REQUEST["cpValorBaseAcrescimo"]));
		$acrescimo->__set("cpValorTotalAcrescimo", addslashes($_REQUEST["cpValorTotalAcrescimo"]));
		$acrescimo->__set("cpFormaPagamentoAcrescimo", addslashes($_REQUEST["cpFormaPagamentoAcrescimo"]));
		
		$formaPagamentoSemPagS = $_REQUEST["cpFormaPagamentoAcrescimo"] != "PS" && $_REQUEST["cpFormaPagamentoAcrescimo"] == "CD" || $_REQUEST["cpFormaPagamentoAcrescimo"] == "CC";
		
		$porcetagem = substr($_REQUEST["cpPorcentagemTaxa"],0,4);
		$valorTaxaJuros = substr($_REQUEST["cpValorTaxaJuros"],0,4);
		$valorLiquido = substr($_REQUEST["cpValorTotalLiquido"],0,4);
		
		$bandeiraCartao = explode("-", $_REQUEST["cpBandeiraCartao"]);
		$planoPagSeguro = explode("-",$_REQUEST["cpPlanoPagSeguro"]);
		
		$setPlanoPagSegura = $planoPagSeguro[0];
		$setBandeiraCartao = $bandeiraCartao[0];
		
		if($_REQUEST["cpFormaPagamentoAcrescimo"] == "PS") {
		
			$acrescimo->__set("cpPorcentagemTaxa", addslashes($_REQUEST["cpPorcentagemTaxa"]));
			$acrescimo->__set("cpValorTaxaJuros", addslashes($valorTaxaJuros));
			$acrescimo->__set("cpValorTotalLiquido", addslashes($valorLiquido));
			$acrescimo->__set("cpBandeiraCartao", addslashes($setPlanoPagSegura));
			
		} elseif($formaPagamentoSemPagS) {
			
			$acrescimo->__set("cpPorcentagemTaxa", addslashes($_REQUEST["cpPorcentagemTaxa"]));
			$acrescimo->__set("cpValorTaxaJuros", addslashes($valorTaxaJuros));
			$acrescimo->__set("cpValorTotalLiquido", addslashes($valorLiquido));
			$acrescimo->__set("cpBandeiraCartao", addslashes($setBandeiraCartao));
			
		} else {
		
			
			$acrescimo->__set("cpPorcentagemTaxa", 0);
			$acrescimo->__set("cpValorTaxaJuros", 0);
			$acrescimo->__set("cpValorTotalLiquido", addslashes($_REQUEST["cpValorTotalAcrescimo"]));
			$acrescimo->__set("cpBandeiraCartao", "Dinheiro");
		}
		
		if(!empty($_REQUEST["cpQtdParcelaAcrescimo"]) && !empty($_REQUEST["cpValorParcelaAcrescimo"])) {
			
			$acrescimo->__set("cpQtdParcelaAcrescimo", addslashes($_REQUEST["cpQtdParcelaAcrescimo"]));
			$acrescimo->__set("cpValorParcelaAcrescimo", addslashes($_REQUEST["cpValorParcelaAcrescimo"]));
			
		} else {
			
			$acrescimo->__set("cpQtdParcelaAcrescimo", 0);
			$acrescimo->__set("cpValorParcelaAcrescimo", 0);
				
		}
		
		$acrescimo->__set("cpTipoAcrescimo","N"); // N = AVUSLO
		$acrescimo->__set("cpObservacaoAcrescimo", addslashes($_REQUEST["cpObservacaoAcrescimo"]));
	
		
		$acrescimo->INSERT();
		
		header("location:../view/Acrescimo.php?panel=387270");
		
	endif;
	
	if($_REQUEST["acao"] == "atualizar"):
	
		$id = (int)$_GET["id"];
		
		$acrescimo->__set("cpStatusAcrescimo","F");
		
		$acrescimo->UPDATE_STATUS_AVULSO($id);
		
		header("location:../view/listarPedidos.php");
		
	endif;

	if($_REQUEST["acao"]=="deletar"):
	
		$id = (int)$_GET["id"];
	
		if($acrescimo->verifcaStatus($id)):
			
			echo "<script language='javascript'>
						window.alert('Registro [ FINALIZADO ] não pode ser excluído !');
						window.history.go(-1);
					</script>";
		else:
		
			$acrescimo->DELETE($id);
			echo "<script language='javascript'>
						window.alert('Registro excluído com sucesso !');
						window.location.href='../view/Acrescimo.php?panel=387270';
					</script>";
		endif;
			
	endif;
	
	if($_REQUEST["acao"]=="baixar"):
		
		$id = (int)$_GET["id"];
		$getInfoAcresimo = $acrescimo->getInfoAcrescimo($id);
		
		$formaPagamento = $getInfoAcresimo->cpFormaPagamentoAcrescimo;
		$qtdParcelas = $getInfoAcresimo->cpQtdParcelaAcrescimo;
		$status = $getInfoAcresimo->cpStatusAcrescimo;
		$dataCompraAcrescimo = $getInfoAcresimo->cpDataCompraAcrescimo;
	  
		$data = date_create($dataCompraAcrescimo);
		$nova_data = date_format($data,"d/m/Y");
		
		$arryData = explode("/",$nova_data);
		$mes = substr($arryData[1],0);
		$ano = substr($arryData[2],0);

		
		$acrescimo->__set("cpSituacaoAcrescimo", "B"); 
		$parcelasAcrescimo->__set("tuAcrescimo_idAcrescimo", addslashes($id));
		
			
		if($acrescimo->verifcaStatus($id)):
				
				$acrescimo->UPDATE_SITUACAO_ACRESCIMO_AVULSO($id);
				
				if($formaPagamento == "CC" && $status !="C") {//VERIFICA FORMA DE PAGAMENTO PARA GERAR PARCELAS
						
					for($i=1; $i <= $qtdParcelas; $i++) {
						
						$verificaLengthMes = str_replace($mes,"",$mes + $i);
						$verificaLenghtAno = str_replace($ano,"",$ano + 1);
						
						if($verificaLengthMes  > 12) {
							
							$verificaLengthMes = $i + 1; 
							$parcelasAcrescimo->__set("cpDataVencimentoParcelaAcrescimo", $arryData[0]."/".substr($verificaLengthMes,1)."/".$verificaLenghtAno);
							
						}else{
							
							$parcelasAcrescimo->__set("cpDataVencimentoParcelaAcrescimo", $arryData[0]."/".str_replace($mes,"",$mes + $i)."/".$arryData[2]);
						}
						$parcelasAcrescimo->INSERT();
					}
				}else {
					
					echo "<script language='javascript'>
								window.alert('Pedido não parcelado !');
							</script>";
				}
				
				echo "<script language='javascript'>
							window.alert('Baixa realizada com sucesso !');
							window.location.href='../view/PainelDePedidos.php';
						</script>";
			else:
				
				
				echo "<script language='javascript'>
							window.alert('Registro não pode ser dado  baixa [ EM ANDAMENTO ] !');
							window.location.href='../view/PainelDePedidos.php';
						</script>";
		endif;
	endif;