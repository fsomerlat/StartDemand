<?php require_once '../core/include.php'; session_start();

	$usuario = new Usuario();
	
	if($_REQUEST['acao'] == "cadastrar"):
	
		$usuario->__set("cpNome", addslashes($_REQUEST["cpNome"]));
		$usuario->__set("cpSenha", addslashes(sha1($_REQUEST["cpSenha"])));
		$usuario->__set("cpStatus", addslashes($_REQUEST["cpStatus"]));
		$usuario->__set("cpNivelAcesso", addslashes($_REQUEST["cpNivelAcesso"]));
		
		$nome = $usuario->__get("cpNome");
		
		if(empty($_REQUEST["cpNome"])):
		
			echo "<script language='javascript'>
						window.alert('Preencha no campo [ USUÁRIO ] !');
						window.history.go(-1);
					</script>";
		
		elseif(strlen($_REQUEST["cpSenha"]) < 4):
			
			echo "<script language='javascript'>
						window.alert('Preencha o campo [ SENHA ] !');
						window.history.go(-1);
					</script>";
		
		elseif(empty($_REQUEST["cpStatus"])):
			
			echo "<script language='javascript'>
						window.alert('Selecione o campo [ STATUS ] !');
						window.history.go(-1);
					</script>";
		
		elseif(empty($_REQUEST["cpNivelAcesso"])):
		
			echo "<script language='javascript'>
						window.alert('Selecione o campo [ NÍVEL DE ACESSO ] ! ');
					    window.history.go(-1);
		
					</script>";
		
		elseif($usuario->verificaDuplicidade() > 0):
			
			echo "<script language='javascript'>
						window.alert('Usuário [ $nome ] já existe !');
						window.history.go(-1);
					</script>";
			else:
			
				$usuario->INSERT();
				echo "<script language='javascript'>
							window.alert('Registro inserido com sucesso !');
							window.location.href='../view/Usuario.php?panel=11508';
						</script>";
		endif;
	endif;
	
	
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = addslashes((int)$_GET["id"]);
		
		$usuario->DELETE($id);
		header("location:../view/Usuario.php?panel=11508");
	endif;

 
	if($_REQUEST["acao"] == "atualizar"):
		
		$id = addslashes((int)$_REQUEST["id"]);
		
		$usuario->__set("cpNome", addslashes($_REQUEST["cpNome"]));
		$usuario->__set("cpSenha", addslashes(sha1($_REQUEST["cpSenha"])));
		$usuario->__set("cpStatus", addslashes($_REQUEST["cpStatus"]));
		$usuario->__set("cpNivelAcesso", addslashes($_REQUEST["cpNivelAcesso"]));
		$usuario->__set("cpAlteracaoUsuario", addslashes($_SESSION["cpNome"]));
		
		$usuario->UPDATE($id);
		
		echo "<script language='javascript'>
					window.alert('Registro atualizado com sucesso !');
					window.location.href='../view/Usuario.php?panel=11508';
				</script>";
		
		
	endif
	
	;