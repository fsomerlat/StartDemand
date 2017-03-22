<?php	require_once '../core/include.php';

	$acrescimo =  new Acrescimo();
	
	if($_REQUEST["acao"] == "cadastrar"):

		$acrescimo->__set("tuPedido_cpCodPedido", addslashes($_REQUEST["tuPedido_cpCodPedido"]));
		$acrescimo->__set("cpAcrescimo", addslashes($_REQUEST["cpAcrescimo"]));
		$acrescimo->__set("cpQtdAcrescimo", addslashes($_REQUEST["cpQtdAcrescimo"]));
		$acrescimo->__set("cpValorBaseAcrescimo", addslashes($_REQUEST["cpValorBaseAcrescimo"]));
		$acrescimo->__set("cpValorTotalAcrescimo", addslashes($_REQUEST["cpValorTotalAcrescimo"]));
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
		$acrescimo->__set("cpSituacaoAcrescimo", "B");
		
		if($acrescimo->verifcaStatus($id)):
				
				$acrescimo->UPDATE_SITUACAO_ACRESCIMO_AVULSO($id);
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