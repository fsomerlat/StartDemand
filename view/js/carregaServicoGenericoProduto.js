/**
 * 
 */

var Service_Generico = (function() {
	
	
	var carregaInProduto = function() {
		
		var option = "", options = "";
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Produto.php",
			cache:false,
			dataType:"json",
			beforeSend: function(){
				
			    $("#cpAcrescimo").html("<option value='0'>Aguarde carregando...</option>");
				$("#tuProduto_idProduto").html("<option value='0'>Aguarde, carregando...</option>");
			},
			error: function() {
				
				$("msgErroAcrescimo").html("Houve um erro com a fonte de dados !");
				$("msgErroProdutoPedido").html("Houve um erro com a fonte de dados !");
		
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$("msgErroAcrescimo").html(retorno[0].erro);
					$("msgErroProdutoPedido").html(retorno[0].erro);
				} else {
				
				
				setTimeout(function() { 
					
					option   += "<option value=''>Selecione</option>";
					options  += "<option value='0'>Selecione</option>";
					
					for(var i=0; i < retorno.length; i++) {
						
						if(retorno[i].cpClassificacaoProduto == "Acrescimo") {
							
							option += "<option value='"+retorno[i].cpNomeProduto+"'>" +retorno[i].cpNomeProduto+"</option>";							
						
						} else if(retorno[i].cpClassificacaoProduto == "Principal") {
							
							options += "<option value='"+retorno[i].idProduto+"'>"+retorno[i].cpNomeProduto+"</option>";
						}
					}	
					try {						
						    $("#cpAcrescimo").html(option);
							$("#tuProduto_idProduto").html(options);
							
						}catch(e) {
							
							console.log(e);
						}
					},1000);	
				
				}
			}
		});
	}
	
	var carregaInfoProdutoGenericoAjaxDB = function() {
	
			carregaInProduto();
	}
	
	return {
		
		carregaInfoProdutoGenericoAjaxDB: carregaInfoProdutoGenericoAjaxDB
	}
	
})();

