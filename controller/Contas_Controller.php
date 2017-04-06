<?php require_once '../core/include.php'; session_start();

	$contas = new Contas();
	
	if($_REQUEST["acao"] == "cadastrar"):
	
		$contas->__set("cpTipoConta", addslashes($_REQUEST["cpTipoConta"]));
		$contas->__set("cpClassificacaoConta", addslashes($_REQUEST["cpClassificacaoConta"]));
		$contas->__set("cpValorConta", addslashes($_REQUEST["cpValorConta"]));
		$contas->__set("cpDataVencimentoConta", addslashes($_REQUEST["cpDataVencimentoConta"]));
		$contas->__set("cpObservacaoConta", addslashes($_REQUEST["cpObservacaoConta"]));
		$contas->__set("cpUsuario", addslashes($_SESSION["cpNome"]));
		
		
		
		$contas->INSERT();
		echo "<script language='javascript'>
					window.alert('Registro cadastrado com sucesso !');
					window.location.href='../view/Contas.php';
				</script>";
		
		
	endif;

	if($_REQUEST["acao"] == "atualizar"):
	
	endif;
	
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = (int) $_GET["id"];
	
		$contas->DELETE($id);
		
		header("location:../view/Contas.php");
		
	endif;