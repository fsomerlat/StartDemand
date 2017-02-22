<?php session_start();

	if($_GET["sessao"] == "logout") :
		
		$_SESSION["cpNome"] = "";
		$_SESSION["cpSenha"] = "";
		$_SESSION["cpStatus"] = "";
		$_SESSION["cpNivelAcesso"] = "";
		
		session_destroy();
		header("location:index.php");
	endif;
 