/**
 * 
 */

var Service_Pedido = (function() {
	
	var carregaInfoPedidoAjaxDB =  function(url) {
		
		var itens= "";
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			error:function(){
				
				$(".listaPedidos").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					retorno.map(function(dados) {
						
						itens += "<tr>";
						itens += "<td>"+dados+"</td>"
						itens += "</tr>";
					});
				}
			}
		})
		
	}
	
	var carregaInfoProdutosDisponiveisAjaxPedido = function() {
		
		itens = "";
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Produto.php",
			cache:false,
			dataType:"json",
			beforeSend: function() {
				
				$(".ProdutosDisponiveisPedido").html("Carregando produtos disponíveis...");
			},
			error:function() {
				
				$(".ProdutosDisponiveisPedido").html("Houve algum erro com a fonte de dados !");
			},
			success:function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".ProdutosDisponiveisPedido").html(retorno[0].erro);
				
				} else {
					
					setTimeout(function() {
						
						for(var i=0; i < retorno.length; i++) {
							
							itens += "<tr>";
							itens += "<td>" +retorno[i].cpNomeProduto+ "</td>"; 
							itens += "<td>" +retorno[i].cpTipoObservacao+ "</td>";
							itens += "<td> R$ " +retorno[i].cpValorProduto+"</td>";
							itens += "<td>" +retorno[i].cpObservacaoProduto+"</td>";
							itens += "</tr>";

							$("#tableProdutosDisponiveisPedido tbody").html(itens);
							$(".ProdutosDisponiveisPedido").html("");
						}		
						
					},1200);
				}
			}
		});
	}
	
	
	return {
		
		carregaInfoProdutosDisponiveisAjaxPedido: carregaInfoProdutosDisponiveisAjaxPedido,
		carregaInfoPedidoAjaxDB: carregaInfoPedidoAjaxDB
		
	}
})();