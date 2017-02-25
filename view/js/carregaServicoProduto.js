var Service_Produto = (function() {
	
	var carregaInfoProduto =  function(url) {
			
		var itens = '';
		
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			beforeSend: function() {
				
				$(".listaProdutos").html("Carregando lista de produtos...");
			},
			error: function() {
				
				$(".listaProdutos").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".listaProdutos").html(retorno[0].erro);
				
				} else {
					
				setTimeout(function() {
					
					for(var i=0; i < retorno.length; i++) {
						
						itens += "<tr>";
						itens += "<td>" +retorno[i].idProduto+"</td>";
						itens += "<td>" +retorno[i].cpNomeProduto+"</td>";
						itens += "<td>" +retorno[i].cpQtdProduto+ "</td>";
						itens += "<td>" +retorno[i].cpTipoProduto+"</td>";
						itens += "<td> R$ " +retorno[i].cpValorProduto+"</td>";
						itens += "<td>" +retorno[i].cpTipoObservacao+"</td>";
						itens += "<td>" +retorno[i].cpObservacaoProduto+"</td>"; 
						itens += "<td><a href='Produto.php?panel=193157&acao=editar&id="+retorno[i].idProduto+"'><span class='glyphicon glyphicon-pencil super'  aria-hidden='true'></span></a></td>";
						itens += "<td><a href='../controller/Produto_Controller.php?acao=deletar&id="+retorno[i].idProduto+"'><span class='glyphicon glyphicon-trash super excluirProduto' aria-hidden='true'></span></a></td>";
						itens += "</tr>";
					}
					
					$("#tableProduto tbody").html(itens);
					$(".listaProdutos").html("Lista de produtos");					
				
				},1500);
			
				}
			}
		});
	}
	
	var carregaInfoProdutoAjaxDB =  function() {
		
		carregaInfoProduto("http://localhost/startDemand/service/Service_Produto.php");
		
	}
	
	return {
		
		carregaInfoProdutoAjaxDB: carregaInfoProdutoAjaxDB
	}
	
	
})();