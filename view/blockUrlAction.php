<?php session_start(); 
	
	  $verificaAcessoUrl = !isset($_SESSION['logado']);
	  
	  ($verificaAcessoUrl) ? header("location:index.php") : false;
	
