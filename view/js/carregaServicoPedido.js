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
						
						var status = dados.cpStatusPedido,
							opcaoStatus = "";
						
						(status == "C") ? opcaoStatus = "Cancelado" :"";
						(status == "A") ? opcaoStatus = "Em andamento" : "";
						(status == "F") ? opcaoStatus = "Finalizado" : "";
						
						
						var dataHrPedido = dados.cpHoraPedido,
							hora = dataHrPedido.substring(11,20),	
							objDate = 	dataHrPedido.substring(0,11).split("-");
						
						dia  = objDate[2];
						mes  = objDate[1];
						ano  = dataHrPedido.substring(0,5); 
							
						dataPedido = dia+'/'+mes+'/'+ano+ hora;
								
							itensProdutos += "<tr>";
							
							switch(opcaoStatus){
								
								case "Cancelado": itensProdutos += "<td class='statusCancelPedido'>"+opcaoStatus+"</td>"; break;
								case "Em andamento" : itensProdutos += "<td class='statusAndamentoPedido'>"+opcaoStatus+"</td>"; break;
								case "Finalizado" : itensProdutos += "<td class='statusFinalizadoPedido'>"+opcaoStatus+"</td>";break;
							}			
							itensProdutos += "<td class='idPedido'>"+dados.idPedido+"</td>";
							itensProdutos += "<td class='danger'>"+dados.cpCodPedido+"</td>";
							itensProdutos += "<td class='info'>"+dados.cpNomeProduto+"</td>";
							itensProdutos += "<td class='danger'>"+dados.cpQtdProduto+"</td>";
							itensProdutos += "<td class='warning'>"+dados.cpComplementoUm+"</td>";
							itensProdutos += "<td class='success'>"+dados.cpComplementoDois+"</td>";
							itensProdutos  += "<td class='warning'>"+dataPedido+"</td>";
							itensProdutos += "<td class='success'>"+dados.cpObservacaoPedido+"</td>";
							itensProdutos += "<td class='info'><button type='button' id='pedidoBaixado' class='btn btn-info'>baixar</button></td>";
							itensProdutos += "<td class='success'><a href='../controller/Pedido_Controller.php?acao=finalizar&cod="+dados.cpCodPedido+"' title='Cancelar pedido'><button type='button' id='pedidoLiberado' class='btn btn-success'>Finalizado</button></a></td>";
							itensProdutos += "<td class='danger'><a href='../controller/Pedido_Controller.php?acao=cancelar&cod="+dados.cpCodPedido+"' title='Finalizar pedido'><button type='button' id='pedidoCancelado' class='btn btn-danger'>Cancelar</button></a></td>";
							itensProdutos += "</tr>";
							
							itensAcrescimo += "<tr>";
							itensAcrescimo += "<td class='danger'>"+dados.cpCodPedido+"</td>";
							itensAcrescimo += "<td class='info'>Nome acrescimo</td>";
							itensAcrescimo += "<td class='warning'>Qtd acrescimo</td>";
							itensAcrescimo += "</tr>";
						
					});
					$("#tablePedidoProdutos tbody").html(itensProdutos);
					//$("#tablePedidoAcrescimo tbody").html(itensAcrescimo);
					$(".h3listaPedidoProduto").html("Lista de produtos");
					$(".h3listaPedidoAcrescimo").html("Lista de acréscimo");
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
	
	var getAjaxValorProduto = function(cptuProduto_idProduto) {
		
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Produto.php",
			cache:false,
			dataType:"json",
			success:function(retorno) {
				  
			retorno.map(function(dados){
					   
					if(dados.idProduto == cptuProduto_idProduto) {	
						
						$("#cpValorTotalProduto").attr("value",dados.cpValorProduto);
						$("#cpValorBaseProduto").val(dados.cpValorProduto);
					}
				});
			}
		});
	}	
	
	return {
		
		carregaInfoProdutosDisponiveisAjaxPedido: carregaInfoProdutosDisponiveisAjaxPedido,
		carregaInfoPedidoAjaxDB: carregaInfoPedidoAjaxDB,
		getAjaxValorProduto: getAjaxValorProduto
		
	}
})();