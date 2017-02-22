<?php session_start(); $verificaAcessoUrl = $_SESSION['logado'] == 0; if($verificaAcessoUrl) {
	  	
	  	header("location:index.php");
}
	
