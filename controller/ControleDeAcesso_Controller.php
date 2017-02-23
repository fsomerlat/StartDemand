<?php session_start(); require_once '../core/include.php';

	$acesso = new ControleDeAcesso();
	
	if($_REQUEST["acao"] == "entrar"):
		
		$nome = addslashes($_REQUEST["cpNome"]);
	    $senha = addslashes($_REQUEST["cpSenha"]);
	   
	    $getInfoUser = $acesso->getInfoUser($nome, $senha);
	    
	    $nm = $getInfoUser->cpNome;
	    $pass = $getInfoUser->cpSenha;
	    $stat = $getInfoUser->cpStatus;
	    $nivel = $getInfoUser->cpNivelAcesso;
	    
	    $_SESSION["cpNome"] = $nm;
	    $_SESSION["cpSenha"] = $pass;
	    $_SESSION["cpStatus"] = $stat;
	    $_SESSION["cpNivelAcesso"] = $nivel;
	    
	    if($stat == "B"):
	    	echo "<script language='javascript'>
	    				window.alert('Usuário [ $nome ] encontra-se bloqueado.Contate o administrador do sistema !');
	    				window.history.go(-1);
	    			</script>"; 
	    endif;
	    
	    $verificaSessao = $acesso->getSessaoUser($nm, $pass, $stat, $nivel);
	   
	    if($verificaSessao > 0):
	    
		    switch($nivel):
		    
				case "A": header("location:../view/Usuario.php"); $_SESSION["logado"] = true; break;
				case "S": header("location:../view/Pedido.php");  $_SESSION["logado"] = true; break;
				case "C": header("location:../view/Produto.php?panel=571586"); $_SESSION["logado"] = true; break;
				default: $_SESSION['logado'] = false;
			endswitch;
	    
		else:
		
			echo "<script type='text/javascript'>
		    			window.alert('Usuário e/ou senha incorretos !');
		    			window.location.href='../view/index.php';
		    		</script>";
		
		endif;
	endif;
	