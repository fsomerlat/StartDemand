var Service_Acrescimo = (function() {
	
	var carregaInfoAcrescimo = function(url) {
		
		var itens = "";
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			beforeSend: function(){
				
				$("").html("Carregando lista de acréscimos...");
			},
			error: function() {
			
				$("").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$("").html(retorno[0].erro);
				
				}else{

					
				retorno.map(function(dados) {
					
					var status = dados.cpStatusAcrescimo; 
					
					(status  == "A" ) ? status = "Em andamento" : "";
					(status == "C") ? status = "Cancelado" : "";
					(status == "F") ? status = "Finalizado" : "";
					
					itens += "<tr>";
					switch(status) {
						case "Em andamento" : itens += "<td class='statusAndamentoPedido'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+status+" ...</td>"; break;
						case "Cancelado" : itens += "<td class='statusCancelPedido'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+status+"</td>"; break;
						case "Finalizado" : itens += "<td class='statusFinalizadoPedido'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+status+"</td>"; break;
					}
					itens += "<td class='danger codPedidoBlue'>"+dados.cpCodPedido+"</td>";
					itens += "<td class='info'>"+dados.cpAcrescimo+"</td>";
					itens += "<td class='warning'>"+dados.cpQtdAcrescimo+"</td>";
					itens += "<td class='success'>"+dados.cpObservacaoAcrescimo+"</td>";
					itens += "</tr>";	
					
					});
						
					$("#tablePedidoAcrescimo tbody").html(itens);
					$("").html("");
				}
			}
		});
	}
	
	var carregaInfoAcrescimoAjaxDB = function() {
		
		carregaInfoAcrescimo("http://localhost/startDemand/service/Service_Acrescimo.php");
	}
	
	return {
		
		carregaInfoAcrescimoAjaxDB: carregaInfoAcrescimoAjaxDB
	}
})(); 