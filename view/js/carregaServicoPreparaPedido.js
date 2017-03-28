var Service_Prepara_Pedido = (function() {
	
	var carregaInfoProdPedido = function(url) {
		
		var itens = "",
			umiTem = "";
		
		$("listaPreparaPedido").html("Não há produto para ser listado");
		$.ajax({
			
			url: url,
			cache: false,
			dataType:"json",
			beforeSend: function() {
				
				$(".listaPreparaPedido").html("Carregando pedido para preparação...");
				
			}
			,
			
			error:function() {
				
				$(".listaPreparaPedido").html("Houve algum erro com a fonte de dados !");
			},
    		success:function(retorno) {
				
//				if(retorno[0].erro) {
//					
//					$(".listaPreparaPedido").html(retorno[0].erro);
//				
//				}
//				else{
				
				setTimeout(function() {
					
						retorno.filter(function(i) {
							
							
							var valorDoProduto = i.cpQtdProduto * i.cpValorBaseProduto;
							
							itens += "<tr>";
							itens += "<td>"+i.cpCodPedido+"</td>";
							itens += "<td>"+i.cpNomeProduto+"</td>"
							itens += "<td>"+i.cpQtdProduto+"</td>";
							itens += "<td>"+i.cpValorProduto+"</td>";
							itens += "<td>"+valorDoProduto+"</td>";
							itens += "<td>"+i.cpQtdParcela+"</td>";
							itens += "<td>"+i.cpValorParcela+"</td>";
							itens += "<td>"+i.cpValorTotalProduto+"</td>";
							itens += "<td>"+i.cpObservacaoPedido+"</td>";
							itens += "<td><a href='Pedido.php?panel=193158&acao=editar&id="+i.idPreparaProduto+"' title='editar'><span class='glyphicon glyphicon-pencil super'  aria-hidden='true'></span></a></td>";
							itens += "<td><a href='../controller/Prepara_Pedido_Acrescimo_Controller.php?acao=deletarProdPedido&id="+i.idPreparaProduto+"' title='excluir'><span class='glyphicon glyphicon-trash super excluirProdPreparaPedido' aria-hidden='true'></span></a></td>";
							itens += "</tr>";
							
							$("#tuPedido_cpCodPedido").html("<option value='"+i.cpCodPedido+"'>"+i.cpCodPedido+"</option>");
							umiTem += i.idPreparaProduto;
							
							FormHelperPedidoAcrescimo.setValorTotalProdutoComAcrescimo(i.cpValorTotalProduto);
						});
						$("#tablePreparaPedido tbody").html(itens);
						$(".listaPreparaPedido").html("");
						
					},010); 
					
					setTimeout(function(){
						FormHelperPedidoAcrescimo.painelEmenuAcrescimoHide(umiTem);
					},020);
				//}
			}
		});
	}
	
	
	var carregaInfoAcrescimoPedido = function(url) {
		
		var itens = "";
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			beforeSend:function(){
				
				$(".listaPreparaAcrescimo").html("Carregando acréscimos... ");
			},
			error:function(){
				
				$(".listaPreparaAcrescimo").html("Houve algum erro com a fonte de dados !");
			},
		   success:function(retorno) {
				
//				if(retorno[0].erro) {
//					
//					$(".").html(retorno[0].erro)
//				}else {
//				
					setTimeout(function(){
						retorno.map(function(dados) {
							
							itens += "<tr>";
							itens += "<td>"+dados.idPreparaAcrescimo+"</td>";
							itens += "<td>"+dados.cpAcrescimo+"</td>";
							itens += "<td>"+dados.cpQtdACrescimo+"</td>";
							itens += "<td>"+dados.cpValorBaseAcrescimo+"</td>";
							itens += "<td>"+dados.cpValorTotalAcrescimo+"</td>";
							itens += "<td><a href='../controller/Prepara_Pedido_Acrescimo_Controller.php?acao=deletarPreparaAcrescimo&id="+dados.idPreparaAcrescimo+"' title='excluir'><span class='glyphicon glyphicon-trash super excluirAcrescimo' aria-hidden='true'></span></a></td>";
							itens += "</tr>";
							
						});
						
						$("#tablePreparaAcrescimo tbody").html(itens);
						$(".listaPreparaAcrescimo").html("");
					},1000);	
				//}
			}
		});
	}
	
	var getSomaTotalProduto = function(url) {
		
		
		$.ajax({
			url:url,
			cache:false,
			dataType:"json",
			success:function(retorno) {
				
				retorno.map(function(dados){
					
					if(dados.somaTotalProduto) {
						FormHelperPedidoAcrescimo.setValorProduto(dados.somaTotalProduto.substring(0,5));
					}else{
						FormHelperPedidoAcrescimo.setValorProduto(0);
					}
				});
			}
		});
	}
	
	var getSomaTotalAcrescimo =  function(url) {
			
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			success:function(retorno){
		
				retorno.map(function(dados) {
					
					if(dados.somaTotalAcrescimo) {
						
						FormHelperPedidoAcrescimo.setValorAcrescimo(dados.somaTotalAcrescimo.substring(0,5));
					}else {
						FormHelperPedidoAcrescimo.setValorAcrescimo(0);
					}	
				});
			}
		});
	}
	
	var carregaInfoPedidoAjaxDB = function() {
	
		
		getSomaTotalProduto("http://localhost/startDemand/service/Service_Soma_Produto.php");
		getSomaTotalAcrescimo("http://localhost/startDemand/service/Service_Soma_Acrescimo.php");
		carregaInfoProdPedido("http://localhost/startDemand/service/Service_Prepara_Produto.php");
		carregaInfoAcrescimoPedido("http://localhost/startDemand/service/Service_Prepara_Acrescimo.php");
	}
		
	return  {
		
		carregaInfoPedidoAjaxDB: carregaInfoPedidoAjaxDB
	}
})();