var Service_Acrescimo = (function() {
	
	var carregaInfoAcrescimoListaPedido = function(url) {
		
		var itensAcrescimoTablePedido = "",
			itensTableAcrescimo = "";
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
					
					var status = dados.cpStatusAcrescimo,
						tipo = dados.cpTipoAcrescimo,
						situacaoAcrescimo = dados.cpSituacaoAcrescimo; 
					
					(status  == "A" ) ? status = "Em andamento" : "";
					(status == "C") ? status = "Cancelado" : "";
					(status == "F") ? status = "Finalizado" : "";
					(tipo == "P") ? tipo = "Pedido" : false;
					(situacaoAcrescimo == "A") ? situacaoAcrescimo = "Ativo" : "Baixado";
					
					
					if(status == "Em andamento") {
						itensAcrescimoTablePedido += "<tr>";
						switch(status) {
							case "Em andamento" : itensAcrescimoTablePedido += "<td class='statusAndamentoPedido default'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+status+" ...</td>"; break;
							case "Cancelado" : itensAcrescimoTablePedido += "<td class='statusCancelPedido default'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+status+"</td>"; break;
							case "Finalizado" : itensAcrescimoTablePedido += "<td class='statusFinalizadoPedido default'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+status+"</td>"; break;
						}
						itensAcrescimoTablePedido += "<td class='info idPedido'>"+dados.tuPedido_idPedido+"</td>";
						itensAcrescimoTablePedido += "<td>"+tipo+"</td>";
						itensAcrescimoTablePedido += "<td class='danger codPedidoBlue'>"+dados.cpCodPedido+"</td>";
						itensAcrescimoTablePedido += "<td class='info'>"+dados.cpAcrescimo+"</td>";
						itensAcrescimoTablePedido += "<td class='danger'>"+dados.cpQtdAcrescimo+"</td>";
						itensAcrescimoTablePedido += "<td class='success'>"+dados.cpObservacaoAcrescimo+"</td>";
						itensAcrescimoTablePedido += "</tr>";	
					}
					
					if(situacaoAcrescimo == "Ativo") {

						itensTableAcrescimo += "<tr>";
						
						switch(status) {
							case "Em andamento": itensTableAcrescimo += "<td class='statusAndamentoPedido'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+status+" ...</td>"; break;
							case "Cancelado" : itensTableAcrescimo += "<td class='statusCancelPedido'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+status+"</td>"; break;
							case "Finalizado": itensTableAcrescimo += "<td class='statusFinalizadoPedido'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+status+"</td>"; break;
						}			
						itensTableAcrescimo += "<td>"+dados.cpCodPedido+"</td>";
						itensTableAcrescimo += "<td>"+tipo+"</td>";
						itensTableAcrescimo += "<td>"+dados.cpAcrescimo+"</td>";
						itensTableAcrescimo += "<td>"+dados.cpQtdAcrescimo+"</td>";
						itensTableAcrescimo += "<td>R$ "+dados.cpValorBaseAcrescimo+"</td>";
						itensTableAcrescimo += "<td>R$ "+dados.cpValorTotalAcrescimo+"</td>";
						itensTableAcrescimo += "<td>"+dados.cpObservacaoAcrescimo+"</td>";
						itensTableAcrescimo += "</tr>";
						
						}
							
					});
						
					
					$("#tablePedidoAcrescimo tbody").html(itensAcrescimoTablePedido);
					$("#tableAcrescimo tbody").html(itensTableAcrescimo);
					$("#painelAcrescimosPedidos tbody").html(itensTableAcrescimo);
					$(".h3listaPedidoAcrescimo").html("Lista de acréscimos relacionados a produtos");
					$("").html("");
				
			}
		});
	}
	

	var carregandAcrescimoAvuslo = function(url) {
		
		var itensAcresimosAvulso = "",
		    itensAcrescimoAvulsoTelaPedido = "";
		
		$.ajax({
			
			url:url,
			cache: false,
			dataType:"json",
			success:function(retorno) {
				
				retorno.map(function(dados){
					
					var status = dados.cpStatusAcrescimo,
						tipo = dados.cpTipoAcrescimo,
						situacaoAcrescimo = dados.cpSituacaoAcrescimo;
					
					(status == "A") ? status = "Em andamento" : false;
					(status == "C") ? status = "Cancelado" : false;
					(status == "F") ? status = "Finalizado" : false;
					(tipo == "N") ? tipo = "Avulso": false;
					(situacaoAcrescimo == "A") ? situacaoAcrescimo = "Ativo" : "Baixado";
					
					
					if(tipo == "Avulso" && situacaoAcrescimo == "Ativo") {
						itensAcresimosAvulso += "<tr>";
						switch(status){
							
							case "Cancelado": itensAcresimosAvulso += "<td class='statusCancelPedido'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+status+"</td>"; break;
							case "Em andamento": itensAcresimosAvulso += "<td class='statusAndamentoPedido'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+status+" ...</td>"; break;
							case "Finalizado": itensAcresimosAvulso += "<td class='statusFinalizadoPedido'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+status+"</td>"; break;
						}
						itensAcresimosAvulso += "<td>"+dados.tuPedido_cpCodPedido+"</td>";
						itensAcresimosAvulso += "<td>"+dados.cpAcrescimo+"</td>";
						itensAcresimosAvulso += "<td>"+tipo+"</td>";
						itensAcresimosAvulso += "<td>"+dados.cpQtdAcrescimo+"</td>";
						itensAcresimosAvulso += "<td>R$ "+dados.cpValorBaseAcrescimo+"</td>";
						itensAcresimosAvulso += "<td>R$ "+dados.cpValorTotalAcrescimo+"</td>";
						itensAcresimosAvulso += "<td>"+dados.cpObservacaoAcrescimo+"</td>";
						itensAcresimosAvulso += "<td><a href='../controller/Acrescimo_Controller.php?acao=baixar&id="+dados.idAcrescimo+"'><span class='glyphicon glyphicon-save' aria-hidden='true' title='baixar'></span></a></td>";
						itensAcresimosAvulso += "<td><a href='../controller/Acrescimo_Controller.php?acao=deletar&id="+dados.idAcrescimo+"'><span class='glyphicon glyphicon-remove' aria-hidden='true' id='excluirAcrescimoAvulso'title='excluir'></span></a></td>";
						itensAcresimosAvulso += "<tr>";
						
						if(status == "Em andamento") {
							itensAcrescimoAvulsoTelaPedido += "<tr>";
							switch(status){
							
								case "Cancelado": itensAcrescimoAvulsoTelaPedido += "<td class='statusCancelPedido'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+status+"</td>"; break;
								case "Em andamento": itensAcrescimoAvulsoTelaPedido += "<td class='statusAndamentoPedido'><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> "+status+" ...</td>"; break;
								case "Finalizado": itensAcrescimoAvulsoTelaPedido += "<td class='statusFinalizadoPedido'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+status+"</td>"; break;
							}
							itensAcrescimoAvulsoTelaPedido += "<td class='info'>"+dados.tuPedido_cpCodPedido+"</td>"; 
							itensAcrescimoAvulsoTelaPedido += "<td class='danger'>"+dados.cpAcrescimo+"</td>"; 
							itensAcrescimoAvulsoTelaPedido += "<td>"+tipo+"</td>"; 
							itensAcrescimoAvulsoTelaPedido += "<td class='danger'>"+dados.cpQtdAcrescimo+"</td>";
							itensAcrescimoAvulsoTelaPedido += "<td class='success'>"+dados.cpObservacaoAcrescimo+"</td>";
							itensAcrescimoAvulsoTelaPedido += "<td class='success'><a href='../controller/Acrescimo_Controller.php?acao=atualizar&id="+dados.idAcrescimo+"'><button type='button' id='pedidoLiberado' class='btn btn-success'>Finalizado</button></a></td>";
							itensAcrescimoAvulsoTelaPedido += "</tr>";
							
						}
					}
				});
	
				$("#tableAcrescimosAvulso tbody").html(itensAcresimosAvulso);
				$("#tableAcrescimosAvulsoTelaPedido tbody").html(itensAcrescimoAvulsoTelaPedido);
				$("#painelAcrescimosAvulso tbody").html(itensAcresimosAvulso);
				$(".h3listaAcrescimoAvulso").html("Lista de acréscimos avulso");
			}
			
		});
	}
	
	
	var carregaInfoAcrescimoAjaxDB = function() {
		
		carregaInfoAcrescimoListaPedido("http://localhost/startDemand/service/Service_Acrescimo.php");
		carregandAcrescimoAvuslo("http://localhost/startDemand/service/Service_Acrescimo_Avulso.php");
	}
	
	return {
		
		carregaInfoAcrescimoAjaxDB: carregaInfoAcrescimoAjaxDB
	}
})(); 