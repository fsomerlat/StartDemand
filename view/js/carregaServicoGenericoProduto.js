/**
 * 
 */

var Service_Generico = (function() {
	
	
	var carregaInProduto = function() {
		
		var option = "";
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Produto.php",
			cache:false,
			dataType:"json",
			beforeSend: function(){
				
				$("#cpAcrescimo").html("<option value='0'>Aguarde carregando...</option>");
			},
			error: function() {
				
				$("msgErroAcrescimo").html("Houve um erro com a fonte de dados !")
			},
			success: function(retorno) {
				
				if(retorno[0].erro) {
					
					$("msgErroAcrescimo").html(retorno[0].erro);
					
				} else {
					
				setTimeout(function() { 
					
					option += "<option value=''>Selecione</option>";
					for(var i=0; i < retorno.length; i++) {
						
						if(retorno[i].cpTipoObservacao == "Acrescimo") {
							
							option += "<option value='"+retorno[i].cpNomeProduto+"'>" +retorno[i].cpNomeProduto+"</option>";							
						}
					}	
						
					$("#cpAcrescimo").html(option);
					
				},1000);	
				
				}
			}
		});
	}
	
	var carregaInfoProdutoAjaxGenericoDB = function() {
		
		carregaInProduto();
	}
	
	return {
		
		carregaInfoProdutoAjaxGenericoDB: carregaInfoProdutoAjaxGenericoDB
	}
	
})();

