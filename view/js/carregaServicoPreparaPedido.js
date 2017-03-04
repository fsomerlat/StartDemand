var Service_Prepara_Pedido = (function() {
	
	var carregaInfoPedido = function(url) {
		
		var itens = "";
		$.ajax({
			
			url: url,
			cache: false,
			dataType:"json",
			beforeSend: function() {
				
				$(".listaPreparaPedido").html("Carregando pedido para preparação...");
			},
			error:function() {
				
				$(".listaPreparaPedido").html("Houve algum erro com a fonte de dados !");
			},
			success:function(retorno) {
//				
//				if(retorno[0].erro) {
//					
//					$(".listaPreparaPedido").html(retorno[0].erro);
//				
//				} else {
				
				setTimeout(function() {
					
						retorno.filter(function(i) {
							
							itens += "<tr>";
							itens += "<td>"+i.cpCodPedido+"</td>";
							itens += "<td>"+i.cpQtdProduto+"</td>";
							itens += "<td>"+i.cpValorTotalProduto+"</td>";
							itens += "<td>"+i.cpValorTotalPedido+"</td>";
							itens += "<td>"+i.cpObservacaoPedido+"</td>";
							itens += "<td><a href='Pedido.php?panel=193158&acao=editar&id="+i.idPreparaPedido+"' title='editar'><span class='glyphicon glyphicon-pencil super'  aria-hidden='true'></span></a></td>";
							itens += "<td><a href='../controller/Prepara_Pedido_Acrescimo_Controller.php?acao=deletarProdPedido&id="+i.idPreparaPedido+"' title='excluir'><span class='glyphicon glyphicon-trash super excluirProdPreparaPedido' aria-hidden='true'></span></a></td>";
							itens += "</tr>";
						});
						
						$("#tablePreparaPedido tbody").html(itens);
						$(".listaPreparaPedido").html("Pedido sendo preparado");	
					},1200);
				}
			//}
		});
	}
	
	var carregaInfoPedidoAjaxDB = function() {
		
		carregaInfoPedido("http://localhost/startDemand/service/Service_Prepara_Pedido.php");
	}
		
	return  {
		
		carregaInfoPedidoAjaxDB: carregaInfoPedidoAjaxDB
	}
})();