/**
 * 
 */

var FormHelperProduto = (function() {
	
	var expandePainel = function(idPanel) {
		
		$("#panel-element_" + idPanel).collapse();
	}
	
	var verificaUrl = function() {
		
		var url = window.location.search.replace("?",""),
			itens = url.split("&");
		
		var getIntesUrl = {
				
				"panel" : itens[0]
		}
		
		return getIntesUrl.panel.substring(6,12);
	}
	
	
	var bindEvents = function() {
		
		expandePainel(verificaUrl());
		
		$(document).on('click','.excluirProduto' ,function() {
			
			return confirm("Tem certeza que deseja excluit esse registro ?");
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();