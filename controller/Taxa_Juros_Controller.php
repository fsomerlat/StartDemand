<?php require_once '../core/include.php';
	
	$taxa = new TaxaJuros();
	
	if($_REQUEST["acao"] == "cadastrar"):
		
		$taxa->__set("cpFormaPagamentoTaxa", addslashes($_REQUEST["cpFormaPagamentoTaxa"]));
		$taxa->__set("cpPorcentagemTaxa", addslashes($_REQUEST["cpPorcentagemTaxa"]));
		
		if($_REQUEST["cpFormaPagamentoTaxa"] == "PS") {
			
			$taxa->__set("cpBandeiraCartao", "PagSeguro");
			$taxa->__set("cpPlanoPagSeguro", addslashes($_REQUEST["cpPlanoPagSeguro"]));
			
		}else{
			
			$taxa->__set("cpBandeiraCartao", addslashes($_REQUEST["cpBandeiraCartao"]));
			$taxa->__set("cpPlanoPagSeguro", 0);
		}
	
		
		
		$taxa->INSERT();
		
		echo "<script language='javascript'>
					window.alert('Cadastro realizado com sucesso !');
					window.history.go(-1);
				</script>";
		

	endif;
	
	if($_REQUEST["acao"]=="deletar"):
	
		$id = (int)$_GET["id"];
	
		$taxa->DELETE($id);
		
		echo "<script language='javascript'>
					window.alert('Registro excluido com sucesso !');
					window.location.href='../view/Taxas.php';
				</script>";
	
	endif;
	
	if($_REQUEST["acao"] == "atualizar"):
	
		$id =  $_REQUEST["id"];
		
		$taxa->__set("cpFormaPagamentoTaxa", addslashes($_REQUEST["cpFormaPagamentoTaxa"]));
		$taxa->__set("cpPorcentagemTaxa", addslashes($_REQUEST["cpPorcentagemTaxa"]));
		$taxa->__set("cpBandeiraCartao", addslashes($_REQUEST["cpBandeiraCartao"]));
		$taxa->__set("cpPlanoPagSeguro", addslashes($_REQUEST["cpPlanoPagSeguro"]));
		
		$taxa->UPDATE($id);
		
		echo "<script language='javascript'>
					window.alert('Registro atualizado com sucesso !');
					window.location.href='../view/Taxas.php';
				</script>";
		
	endif;