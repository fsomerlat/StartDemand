
var FormHelperTaxa = (function(){
	
	
	var changeFormaPagamentoTaxa = function(value) {
		
		if(value == "PS") {
			
			$(".isPagaSeguro").show();
			$(".isBandeiraCartaoPagTaxa").hide();
		
		}else if(value == "CD" || value == "CC") {
			
			$(".isPagaSeguro").hide();
			$(".isBandeiraCartaoPagTaxa").show();
		}else{
		
			$(".isPagaSeguro,.isBandeiraCartaoPagTaxa").hide();
			$("#cpPlanoPagSeguro").val("");
		}
	}
	
	var setHideCampos = function() {
		
		$(".isPagaSeguro,.isBandeiraCartaoPagTaxa").hide();
	}
	
	var bindEvents = function() {
		
		setHideCampos();
		
		$("select[name=cpFormaPagamentoTaxa]").change(function(){
			
			changeFormaPagamentoTaxa(this.value);
		});
		
		$(document).on("click","#excluirTaxaJuros",function() {
			
			return confirm("Deseja excluir esse registro ?");
		});	
	}
	
	return  {
		
		bindEvents:bindEvents
		
	}
	
})();