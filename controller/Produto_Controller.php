<?php require_once '../core/include.php';

	$prod  = new Produto();
	
	if($_REQUEST["acao"] == "cadastrar"):
	
		$prod->__set("cpNomeProduto",  addslashes($_REQUEST["cpNomeProduto"]));
		$prod->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$prod->__set("cpTipoProduto", addslashes($_REQUEST["cpTipoProduto"]));
		$prod->__set("cpValorProduto", addslashes($_REQUEST["cpValorProduto"]));
		$prod->__set("cpObservacaoProduto", addslashes($_REQUEST["cpObservacaoProduto"]));
		
		$prod->INSERT();
		echo "<script language='javascript'>
					window.alert('Registro inserido com sucesso !');
					window.location.href='../view/Produto.php?panel=571586';
				</script>";
	endif;