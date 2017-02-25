/**
 * 
 */

var FormHelperPedido = (function() {
	
	var expandePainel = function(idPanel) {
		
		$("#panel-element_" + idPanel).collapse();
	}
	
	var verificaUrl =  function() {
		
		var url = window.location.search.replace("?",""),
			itens = url.split("&");
		
		var getItensUrl = {
				
				"panel" : itens[0]
		}
		
		return getItensUrl.panel.substring(6,12);
	}
	
	/****MARACUTAIA****/ 
	var getAjaxProduto = function(nomeProduto) {
		
		var infoProdutos = [];
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Produto.php",
			cache: false,
			dataType:"json",
			success:function(retorno) {
					
			var arry = retorno.map(function(dados) {
					
					if(dados.cpNomeProduto == nomeProduto) {
						
						$("#cpValorAcrescimo").val(dados.cpValorProduto);
					}
				});

			infoProdutos.push(arry);
			}
		});
		return infoProdutos;
	}
	
	var preencheAcrescimoPedido = function() {
		
		$(document).on('change','#cpAcrescimo',function(ev) {
			
			getAjaxProduto(ev.target.value);
		});
	}
	
	var bindEvents =  function() {
		
		expandePainel(verificaUrl());
		
		preencheAcrescimoPedido();
	
	}
	
	return  {

		bindEvents: bindEvents
		
	}
})();