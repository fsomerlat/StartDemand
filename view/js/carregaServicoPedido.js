/**
 * 
 */

var Service_Pedido = (function() {
		
	var carregaInfoPedidoAjaxDB =  function() {
		
		var itensProdutos= "",
			painelPedidosProdutos = "";
			
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Pedido.php",
			cache:false,
			dataType:"json",
			error:function(){
				
				$(".listaPedidoProdutos").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
//				if(retorno[0].erro) {
//					
//					$(".listaPedidoProdutos").html(retorno[0].erro);
//				
//				} else {
					
					retorno.map(function(dados) {
							
						var status = dados.cpStatusPedido,
							tipo = dados.cpTipoProduto,
							situacaoPedido = dados.cpSituacaoPedido,
							opcaoStatus = "";
						
						(status == "C") ? opcaoStatus = "Cancelado" :"";
						(status == "A") ? opcaoStatus = "Em andamento" : "";
						(status == "F") ? opcaoStatus = "Finalizado" : "";
 						
						(situacaoPedido == "A") ? situacaoPedido = "Ativo" : "Baixado";
						
						var dataHrPedido = dados.cpHoraPedido,
							hora = dataHrPedido.substring(11,20),	
							objDate = 	dataHrPedido.substring(0,10).split("-");
						
						dia  = objDate[2];
						mes  = objDate[1];
						ano  = dataHrPedido.substring(0,4); 
						
						data = dia+"/"+mes+"/"+ano;
						
						dataPedido = dia+'/'+mes+'/'+ano+" - "+ hora;
						
						if(opcaoStatus == "Em andamento") {
							
							itensProdutos += "<tr>";
							
							switch(opcaoStatus){
								
								case "Cancelado": itensProdutos += "<td class='statusCancelPedido default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+opcaoStatus+"</td>"; break;
								case "Em andamento" : itensProdutos += "<td class='statusAndamentoPedido default'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+opcaoStatus+" ...</td>"; break;
								case "Finalizado" : itensProdutos += "<td class='statusFinalizadoPedido default'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+opcaoStatus+"</td>";break;
							}			
							itensProdutos += "<td class='info idPedido'>"+dados.idPedido+"</td>";
							itensProdutos += "<td class='danger codPedidoBlue'>"+dados.cpCodPedido+"</td>";
							itensProdutos += "<td class='info'>"+dados.cpNomeProduto+"</td>";
							itensProdutos += "<td class='danger'>"+dados.cpQtdProduto+"</td>";
							itensProdutos += "<td class='warning'>"+dados.cpComplementoUm+"</td>";
							itensProdutos += "<td class='success'>"+dados.cpComplementoDois+"</td>";
							itensProdutos  += "<td class='danger'>"+dataPedido+"</td>";
							itensProdutos += "<td class='success'>"+dados.cpObservacaoPedido+"</td>";
							itensProdutos += "<td class='success'><a href='../controller/Pedido_Controller.php?acao=finalizar&id="+dados.idPedido+"' title='Finalizar pedido'><button type='button' id='pedidoLiberado' class='btn btn-success'>Finalizado</button></a></td>";
							itensProdutos += "</tr>";
						}
						if(situacaoPedido == "Ativo") {
							painelPedidosProdutos += "<tr>";
							switch(opcaoStatus){
								case "Cancelado" : painelPedidosProdutos += "<td class='statusCancelPedido'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+opcaoStatus+"</td>"; break;
								case "Em andamento" : painelPedidosProdutos += "<td class='statusAndamentoPedido'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+opcaoStatus+" ...</td>"; break;
								case "Finalizado": painelPedidosProdutos += "<td class='statusFinalizadoPedido'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+opcaoStatus+"</td>"; break;
							}
							painelPedidosProdutos += "<td>"+dados.cpNomeProduto+"</td>";
							painelPedidosProdutos += "<td>"+dados.cpCodPedido+"</td>";
							painelPedidosProdutos += "<td>"+dataPedido+"</td>";
							painelPedidosProdutos += "<td>"+dados.cpQtdProduto+"</td>";
							painelPedidosProdutos += "<td>R$ "+dados.cpValorProduto+"</td>";
							painelPedidosProdutos += "<td>R$ "+dados.cpValorTotalPedido+"</td>";
							painelPedidosProdutos += "<td>"+dados.cpObservacaoPedido+"</td>";
							painelPedidosProdutos += "<td><a href='../controller/Pedido_Controller.php?acao=baixar&id="+dados.idPedido+"' title='baixar'><span class='glyphicon glyphicon-save' aria-hidden='true'></span></a></td>";
							painelPedidosProdutos += "<td><a href='../controller/Pedido_Controller.php?acao=cancelar&id="+dados.idPedido+"' title='cancelar'><span class='glyphicon glyphicon-remove-sign' id='pedidoCancelado' aria-hidden='true'></span></a></td>";
							painelPedidosProdutos += "</tr>";
						}
					});
					
					$("#tablePedidoProdutos tbody").html(itensProdutos);
					$("#painelPedidosProdutos tbody").html(painelPedidosProdutos);
					$(".h3listaPedidoProduto").html("Lista de produtos");
					
				//}
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
							itensProdutos += "<td>" +retorno[i].cpClassificacaoProduto+ "</td>";
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