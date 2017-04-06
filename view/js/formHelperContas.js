var FormHelperContas = (function(){
	
	
	var createDatePicker = function() { 
		$( "#cpDataVencimentoConta" ).datepicker({
			
			dateFormat: 'dd/mm/yy', //formato da data
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], //nomes dos campos dos dias
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],//nomes do titulo dos dias
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], //dias com nomes curtos
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],//nomes dos messes
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],//meses com nomes curtos
		    minDate: new Date(),
		    nextText: 'Próximo',//titulo do próximo texto
		    prevText: 'Anterior',//titulo do texto anterior

		    });
	}
	
	var mascaraCampos = function() {
		
		$("#cpValorConta").mask("999.99");
	}
	
	var bindEvents = function() {
		
		mascaraCampos();
		createDatePicker();
		
		$(document).on("click","#exluirConta", function() {
			
			return confirm("Deseja excluir esse registro ?");
		});
	}

	return {
		
		bindEvents: bindEvents
	}
})();