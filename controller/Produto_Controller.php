<?php require_once '../core/include.php';

	$prod  = new Produto();
	
	if($_REQUEST["acao"] == "cadastrar"):
	
		$prod->__set("cpNomeProduto",  addslashes($_REQUEST["cpNomeProduto"]));
		$prod->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$prod->__set("cpTipoProduto", addslashes($_REQUEST["cpTipoProduto"]));
		$prod->__set("cpValorProduto",  addslashes($_REQUEST["cpValorProduto"]));
		$prod->__set("cpTipoObservacao", addslashes($_REQUEST["cpTipoObservacao"]));
		$prod->__set("cpObservacaoProduto", addslashes($_REQUEST["cpObservacaoProduto"]));
		
		$validaNome = empty($prod->__get("cpNomeProduto"));
		$validaQtd  = empty($prod->__get("cpQtdProduto"));
		$validaValorEstimado = $_REQUEST["cpValorEstimado"];
		$validaValorProduto = empty($prod->__get("cpValorProduto"));
		
		if($validaNome):
		
			echo "<script language='javascript'>
						window.alert('È necessário preencher o campo [ 	NOME PRODUTO ] !');
						window.history.go(-1);
					</script>";
		
		elseif($validaQtd):
		
			echo "<script language='javascript'>
							window.alert('È necessário preencher o campo [ 	QUANTIDADE PRODUTO ] !');
							window.history.go(-1);
						</script>";
		
		elseif($_REQUEST["cpTipoProduto"] == ""):
		
			echo "<script language='javascript'>
								window.alert('È necessário preencher o campo [ 	TIPO PRODUTO ] !');
								window.history.go(-1);
							</script>";
		
		elseif($validaValorEstimado == 0):
		
			echo "<script language='javascript'>
							window.alert('È necessário preencher o campo [ 	VALOR ESTIMADO ] ! !');
							window.history.go(-1);
						</script>";
		
		elseif($validaValorProduto):
		
			echo "<script language='javascript'>
								window.alert('È necessário preencher o campo [ 	VALOR PRODUTO ] ! !');
								window.history.go(-1);
							</script>";
		else:
			$prod->INSERT();
			echo "<script language='javascript'>
						window.alert('Registro inserido com sucesso !');
						window.location.href='../view/Produto.php?panel=571586';
					</script>";
	
		endif;		
	endif;
	
	
	if($_REQUEST["acao"] == "atualizar"):
	
		$id = $_REQUEST["id"];
		
		$prod->__set("cpNomeProduto", addslashes($_REQUEST["cpNomeProduto"]));
		$prod->__set("cpQtdProduto", addslashes($_REQUEST["cpQtdProduto"]));
		$prod->__set("cpTipoProduto", addslashes($_REQUEST["cpTipoProduto"]));
		$prod->__set("cpValorProduto", addslashes($_REQUEST["cpValorProduto"]));
		$prod->__set("cpTipoObservacao", addslashes($_REQUEST["cpTipoObservacao"]));
		$prod->__set("cpObservacaoProduto", addslashes(trim($_REQUEST["cpObservacaoProduto"])));
	
	
		if(empty($prod->__get("cpNomeProduto"))):
			
			echo "<script language='javascript'>
						window.alert('È necessário preencher o campo [ NOME PRODUTO ] !');
						window.history.go(-1);
					</script>";
					
		elseif(empty($prod->__get("cpQtdProduto"))):
		
			echo "<script language='javascript'>
							window.alert('È necessário preencher o campo [ 	QUANTIDADE PRODUTO ] !');
							window.history.go(-1);
						</script>";
			
		elseif(empty($prod->__get("cpTipoProduto"))):
		
			echo "<script language='javascript'>
							window.alert('È necessário preencher o campo [ 	TIPO PRODUTO ] !');
							window.history.go(-1);
						</script>";
		
	    elseif(empty($prod->__get("cpValorProduto"))):
			
			echo "<script language='javascript'>
							window.alert('È necessário preencher o campo [ 	VALOR PRODUTO ] !');
							window.history.go(-1);
						</script>";
			
		else:
		
			$prod->UPDATE($id);
			echo "<script language='javascript'>
						window.alert('O registro [ $id ] foi atualizado com sucesso !');
						window.location.href='../view/Produto.php?panel=571586';
					</script>";
		endif;
	endif;
	
	
	if($_REQUEST["acao"] == "deletar"):
	
		$id = (int)$_GET["id"];
	
		if($prod->getVerificaRelacionamento($id) > 0):
		
			echo "<script language='javascript'>
						window.alert('Não é possível excluir.Registro relacionado a um pedido !');
						window.history.go(-1);
					</script>";
		else:
			$prod->DELETE($id);
			echo "<script language='javascript'>
						window.alert('Registro [ $id ] foi excluído com sucesso !');
						window.history.go(-1);
					</script>";
		endif;
	endif;
	
	