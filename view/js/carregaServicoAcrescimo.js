var Service_Acrescimo = (function() {
	
	var carregaInfoAcrescimoListaPedido = function(url) {
		
		var itensAcrescimoTablePedido = "",
			intesTableAcrescimo = "";
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			success: function(retorno) {
				
//				if(retorno[0].erro) {
//					
//					$("").html(retorno[0].erro);
//				
//				}else{

					
				retorno.map(function(dados) {
					
					var status = dados.cpStatusAcrescimo; 
					
					(status  == "A" ) ? status = "Em andamento" : "";
					(status == "C") ? status = "Cancelado" : "";
					(status == "F") ? status = "Finalizado" : "";
					
					itensAcrescimoTablePedido += "<tr>";
					switch(status) {
						case "Em andamento" : itensAcrescimoTablePedido += "<td class='statusAndamentoPedido default'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+status+" ...</td>"; break;
						case "Cancelado" : itensAcrescimoTablePedido += "<td class='statusCancelPedido default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+status+"</td>"; break;
						case "Finalizado" : itensAcrescimoTablePedido += "<td class='statusFinalizadoPedido default'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+status+"</td>"; break;
					}
					itensAcrescimoTablePedido += "<td class='info idPedido'>"+dados.tuPedido_idPedido+"</td>";
					itensAcrescimoTablePedido += "<td class='danger codPedidoBlue'>"+dados.cpCodPedido+"</td>";
					itensAcrescimoTablePedido += "<td class='info'>"+dados.cpAcrescimo+"</td>";
					itensAcrescimoTablePedido += "<td class='danger'>"+dados.cpQtdAcrescimo+"</td>";
					itensAcrescimoTablePedido += "<td class='success'>"+dados.cpObservacaoAcrescimo+"</td>";
					itensAcrescimoTablePedido += "</tr>";	
					
					if(dados.tuPedido_cpCodPedido == null) {
						
						intesTableAcrescimo += "<tr>";
						switch(status) {
							case "Em andamento": intesTableAcrescimo += "<td class='statusAndamentoPedido'>"+status+"</td>"; break;
							case "Cancelado" : intesTableAcrescimo += "<td class='statusCancelPedido'>"+status+"</td>"; break;
							case "Finalizado": intesTableAcrescimo += "<td class='statusFinalizadoPedido'>"+status+"</td>"; break;
						}			
						intesTableAcrescimo += "<td>"+dados.cpCodPedido+"</td>";
						intesTableAcrescimo += "<td>"+dados.cpAcrescimo+"</td>";
						intesTableAcrescimo += "<td>"+dados.cpQtdAcrescimo+"</td>";
						intesTableAcrescimo += "<td>"+dados.cpObservacaoAcrescimo+"</td>";
						intesTableAcrescimo += "<td><a href=''><span class='glyphicon glyphicon-menu-down' aria-hidden='true' title='baixar'></span></a></td>";
						intesTableAcrescimo += "<td>"+dados.cpObservacaoAcrescimo+"</td>";
						intesTableAcrescimo += "</tr>";
					
						}
					});
						
					$("#tablePedidoAcrescimo tbody").html(itensAcrescimoTablePedido);
					$("#tableAcrescimo tbody").html(intesTableAcrescimo);
					$("").html("");
				//}
			}
		});
	}
	
	var carregaInfoAcrescimoAjaxDB = function() {
		
		carregaInfoAcrescimoListaPedido("http://localhost/startDemand/service/Service_Acrescimo.php");
	}
	
	return {
		
		carregaInfoAcrescimoAjaxDB: carregaInfoAcrescimoAjaxDB
	}
})(); 