/**
 * 
 */

var Service_Pedido = (function() {
	
	var carregaInfoPedidoAjaxDB =  function() {
		
		var itensProdutos= "",
			itensAcrescimo = "";
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Pedido.php",
			cache:false,
			dataType:"json",
			error:function(){
				
				$(".listaPedidoProdutos").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".listaPedidoProdutos").html(retorno[0].erro);
				
				} else {
					
					retorno.map(function(dados) {
						
						var status = dados.cpStatusPedido;
						(status == "C") ? status = "Cancelado" : "Em andamento";
						(status == 'A') ? status = "Em andamento" : "Cancelado";
						
						itensProdutos += "<tr>";
						itensProdutos += "<td class='status'>"+status+"</td>";
						itensProdutos += "<td>"+dados.idPedido+"</td>";
						itensProdutos += "<td class='danger'>"+dados.cpCodPedido+"</td>";
						itensProdutos += "<td class='info'>"+dados.cpNomeProduto+"</td>";
						itensProdutos += "<td class='danger'>"+dados.cpQtdProduto+"</td>";
						itensProdutos += "<td class='warning'>"+dados.cpComplementoUm+"</td>";
						itensProdutos += "<td class='success'>"+dados.cpComplementoDois+"</td>";
						itensProdutos  += "<td class='warning'>Hora da criação</td>";
						itensProdutos += "<td class='success'>"+dados.cpObservacaoPedido+"</td>";
						itensProdutos += "<td class='info'><button type='button' id='pedidoLeberado' class='btn btn-success'>baixar</button></td>";
						itensProdutos += "<td class='danger'><a href='../controller/Pedido_Controller.php?acao=cancelar&cod="+dados.cpCodPedido+"' title='cancelar pedido'><button type='button' id='pedidoCancelado' class='btn btn-danger'>Cancelar</button></a></td>";
						itensProdutos += "</tr>";
						
						itensAcrescimo += "<tr>";
						itensAcrescimo += "<td class='danger'>"+dados.cpCodPedido+"</td>";
						itensAcrescimo += "<td class='info'>Nome acrescimo</td>";
						itensAcrescimo += "<td class='warning'>Qtd acrescimo</td>";
						itensAcrescimo += "</tr>";
					});
					$("#tablePedidoProdutos tbody").html(itensProdutos);
					$("#tablePedidoAcrescimo tbody").html(itensAcrescimo);
					$(".listaPedidoProduto").html("Lista de produtos");
					$(".listaPedidoAcrescimo").html("Lista de acréscimo");
				}
			}
		});	
	}
	
	var carregaInfoProdutosDisponiveisAjaxPedido = function() {
		
		itensProdutos = "";
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
							
							itensProdutos += "<tr>";
							itensProdutos += "<td>" +retorno[i].cpNomeProduto+ "</td>"; 
							itensProdutos += "<td>" +retorno[i].cpTipoObservacao+ "</td>";
							itensProdutos += "<td> R$ " +retorno[i].cpValorProduto+"</td>";
							itensProdutos += "<td>" +retorno[i].cpObservacaoProduto+"</td>";
							itensProdutos += "</tr>";

							$("#tableProdutosDisponiveisPedido tbody").html(itensProdutos);
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