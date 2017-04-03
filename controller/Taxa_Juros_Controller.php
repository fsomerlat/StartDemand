<?php require_once '../core/include.php';
	
	$taxa = new TaxaJuros();
	
	if($_REQUEST["acao"] == "cadastrar"):
		
		$taxa->__set("cpFormaPagamentoTaxa", addslashes($_REQUEST["cpFormaPagamentoTaxa"]));
		$taxa->__set("cpPorcentagemTaxa", addslashes($_REQUEST["cpPorcentagemTaxa"]));
		
		
		if($_REQUEST["cpFormaPagamentoTaxa"] == "PS") {
				
			$taxa->__set("cpBandeiraCartaoTaxa", "PagSeguro");
			$taxa->__set("cpPlanoPagSeguro", addslashes($_REQUEST["cpPlanoPagSeguro"]));
				
		}else{
				
			$taxa->__set("cpBandeiraCartaoTaxa", addslashes($_REQUEST["cpBandeiraCartaoTaxa"]));
			$taxa->__set("cpPlanoPagSeguro", 0);
		}
		
		
		if($_REQUEST["cpFormaPagamentoTaxa"] == "PS"):
		
		
			if($_REQUEST["cpPlanoPagSeguro"] == "") :
			
				echo "<script language='javascript'>
								window.alert('Preencha o campo [ PLANO PAGSEGURO ] !');
								window.location.href='../view/Taxas.php';
							</script>";
			
			elseif(strlen($_REQUEST["cpPorcentagemTaxa"]) < 4):
					
				echo "<script language='javascript'>
								window.alert('Porcentaxa taxa não está preenchida de forma correta !');
								window.location.href='../view/Taxas.php';
							</script>";
				else:
			
					if($taxa->getVerificaDuplicidade() > 0):
						
						echo "<script language='javascript'>
										window.alert('*ATENÇÃO*...Há um registro igual a esse já cadastado !');
										window.location.href='../view/Taxas.php';
									</script>";
					else:
						
						$taxa->INSERT();
						echo "<script language='javascript'>
										window.alert('Cadastro realizado com sucesso !');
										window.location.href='../view/Taxas.php';
									</script>";
					endif;
				endif;
			endif;
			
			if ($_REQUEST["cpFormaPagamentoTaxa"] != "" && $_REQUEST["cpFormaPagamentoTaxa"] != "PS"):
		 
			 	if(strlen($_REQUEST["cpPorcentagemTaxa"]) < 4):
			 	
				 	echo "<script language='javascript'>
										window.alert('Porcentaxa taxa não está preenchida de forma correta !');
										window.location.href='../view/Taxas.php';
									</script>";
		 	
			 	elseif($_REQUEST["cpBandeiraCartaoTaxa"] == ""):
			 	
			 		echo "<script language='javascript'>
			 					window.alert('Informe uma bandeira para o cartão ! ');
			 					window.location.href='../view/Taxas.php';
			 				</script>"; 
		 		else:
	 		
			 		if($taxa->getVerificaDuplicidade() > 0):
			 			
				 		echo "<script language='javascript'>
								window.alert('*ATENÇÃO*...Há um registro igual a esse já cadastado !');
								window.location.href='../view/Taxas.php';
							</script>";
			 		else:
				 		
			 			$taxa->INSERT();
				 		echo "<script language='javascript'>
								window.alert('Cadastro realizado com sucesso !');
								window.location.href='../view/Taxas.php';
							</script>";
		 			endif;
				endif;
			endif;
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
		$taxa->__set("cpBandeiraCartaoTaxa", addslashes($_REQUEST["cpBandeiraCartaoTaxa"]));
		$taxa->__set("cpPlanoPagSeguro", addslashes($_REQUEST["cpPlanoPagSeguro"]));
		
		$taxa->UPDATE($id);
		
		echo "<script language='javascript'>
					window.alert('Registro atualizado com sucesso !');
					window.location.href='../view/Taxas.php';
				</script>";
		
	endif;
	
	
	
	