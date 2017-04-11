 <?php session_start(); $verificaAcessoUrl = empty(($_SESSION['logado'])); 

if($verificaAcessoUrl) {
	  	
	  	header("location:permissaoNegada.php");
}
	
