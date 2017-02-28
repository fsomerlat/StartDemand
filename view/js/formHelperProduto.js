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
	
	var mascaraCampos = function(value) {
		
		if(value == 1) {
			
			$("#cpValorProduto").mask("99.99");
		
		} else if(value  == 2) {
			
			$("#cpValorProduto").mask("999.99");
		}
	}
	
	var selectValorEstimado = function(value) {
		
		if(value == 0) {
			
			$("#cpValorProduto").val("").prop("disabled", true);
		
		} else {
			
			$("#cpValorProduto").prop("disabled", false);
		}
	}
	
	var tipoObservacao =  function(value) {
		
		if(value == "Produto") {
			
			$("tipoObs").html("produto");
			
		} else if(value == "Acrescimo"){
			
			$("tipoObs").html("acréscimo");
		}
	}
	
	var bindEvents = function() {
		
		expandePainel(verificaUrl());
		
		$("#cpValorProduto").prop("disabled", true);
		
		$("#cpValorEstimado").change(function() {
			
			mascaraCampos(this.value);
			selectValorEstimado(this.value);
		});
		
		$(document).on('click','.excluirProduto' ,function() {
			
			return confirm("Tem certeza que deseja excluit esse registro ?");
		});
	
		$("#cpTipoObservacao").change(function() {
			
			tipoObservacao(this.value);
		});
	}	
	
	
	return {
		
		bindEvents: bindEvents
	}
	
})();