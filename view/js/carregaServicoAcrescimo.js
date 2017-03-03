var Service_Acrescimo = (function() {
	
	var carregaInfoAcrescimo = function(url) {
		
		var itens = "";
		$.ajax({
			
			url:url,
			cache:false,
			dataType:"json",
			beforeSend: function(){
				
				$(".listaAcrescimo").html("Carregando lista de acréscimos...");
			},
			error: function() {
			
				$(".listaAcrescimo").html("Houve algum erro com a fonte de dados !");
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$(".listaAcrescimo").html(retorno[0].erro);
				
				}else{
				
				setTimeout(function() {
					
				retorno.map(function(dados) {
							
	
							itens += "<tr>";
							itens += "<td>"+dados.idAcrescimo+"</td>";
							itens += "<td>"+dados.cpAcrescimo+"</td>";
							itens += "<td>"+dados.cpQtdAcrescimo+"</td>";
							itens += "<td>"+dados.cpValorBaseAcrescimo+"</td>";
							itens += "<td>"+dados.cpValorTotalAcrescimo+"</td>";
							itens += "<td><a href='PreparaPedidoAcrescimo.php?panel=655955&acao=editar&id="+dados.idAcrescimo+"'><span class='glyphicon glyphicon-pencil super'  aria-hidden='true'></span></a></td>";
							itens += "<td><a href='../controller/Prepara_Pedido_Acrescimo_Controller.php?acao=deletar&id="+dados.idAcrescimo+"'><span class='glyphicon glyphicon-trash super excluirAcrescimo' aria-hidden='true'></span></a></td>";
							itens += "</tr>";	
							
						});
							$("#tableAcrescimo tbody").html(itens);
							$(".listaAcrescimo").html("");
					},1500);
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