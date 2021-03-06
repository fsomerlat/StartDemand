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
	
		$id = (int) $_REQUEST["id"];
		
		$contas->__set("cpTipoConta", addslashes($_REQUEST["cpTipoConta"]));
		$contas->__set("cpClassificacaoConta", addslashes($_REQUEST["cpClassificacaoConta"]));
		$contas->__set("cpValorConta", addslashes($_REQUEST["cpValorConta"]));
		$contas->__set("cpDataVencimentoConta", addslashes($_REQUEST["cpDataVencimentoConta"]));
		$contas->__set("cpObservacaoConta", addslashes($_REQUEST["cpObservacaoConta"]));
		$contas->__set("cpAlteracaoUltimoUsuario", addslashes($_SESSION["cpNome"]));
		
		
		$contas->UPDATE($id);
		$contas->UPDATE_POR_USUARIO($id);
		
		echo "<script language='javascript'>
					window.alert('Registro atualizado com sucesso !');
					window.location.href='../view/Contas.php';
				</script>";
		
	endif;
	
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = (int) $_GET["id"];
	
		$contas->DELETE($id);
		
		header("location:../view/Contas.php");
		
	endif;
	
	
	if($_REQUEST["acao"] == "fechar"):
	
		$id = (int)addslashes($_GET["id"]);
	     
		$contas->__set("cpStatusConta", "F");
		$contas->__set("cpUsuarioFechamentoConta", addslashes($_SESSION["cpNome"]));

		$contas->UPDATE_USUARIO_FECHAMENTO($id);
		$contas->UPDATE_STATUS($id);
		
		
		echo "<script language='javascript'>
					window.alert('Registro [ FECHADO ] com sucesso !');
					window.location.href='../view/Contas.php';
				</script>";
	
	endif;
	
	
	