<?php require_once '../core/include.php';

	$preparaAcrescimo = new PreparaAcrescimo();
	$preparaProdPed = new PreparaPedido();

	if(isset($_REQUEST["cpAcrescimo"])):
		
		$nmacrescimo = $_REQUEST["cpAcrescimo"];
		$valBaseAcrescimo = $_REQUEST["cpValorBaseAcrescimo"];
		$qtdAcrescimo = $_REQUEST["cpQtdAcrescimo"];
		$valTotalAcrescimo = $_REQUEST["cpValorTotalAcrescimo"];
		$obsAcrescimo = $_REQUEST["cpObservacaoAcrescimo"];
		
		$preparaAcrescimo->__set("cpAcrescimo", addslashes($nmacrescimo));
		$preparaAcrescimo->__set("cpValorBaseAcrescimo",addslashes($valBaseAcrescimo));
		$preparaAcrescimo->__set("cpQtdAcrescimo", addslashes($qtdAcrescimo));
		$preparaAcrescimo->__set("cpValorTotalAcrescimo", addslashes($valTotalAcrescimo));
		$preparaAcrescimo->__set("cpObservacaoAcrescimo", addslashes($obsAcrescimo));
		
		if(empty($_REQUEST["cpAcrescimo"])):
			
			echo "<script language='javascript'>
						window.alert('O campo [ ACRÉSCIMO  ] DEVE SER PREENCHIDO  !');
						window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
					</script>";
		
		elseif($_REQUEST["cpQtdAcrescimo"]== 0):
		
			echo "<script language='javascript'>
							window.alert('O campo [ QUANTIDADE ] DEVE SER SELECIONADO !');
							window.location.href='../view/PreparaPedidoAcrescimo.php?panel=655955';
						</script>";
		else:
				$preparaAcrescimo->INSERT();	
				echo "Acréscimo inserido com sucesso !";
		endif;
	endif;
	
	if($_REQUEST["acao"] == "deletarProdPedido"):
	
		$id = (int)$_REQUEST["id"];
		$preparaProdPed->DELETE($id);
		
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		
	endif;
	
	if($_REQUEST["acao"] == "deletarPreparaAcrescimo"):
		
		$id = (int)$_GET["id"];
	
		$preparaAcrescimo->DELETE($id);
		header("location:../view/PreparaPedidoAcrescimo.php?panel=655955");
		
	endif;
	
	
	