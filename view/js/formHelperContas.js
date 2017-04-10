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
	
	//SOMA CONTAS EM ABERTO
	var getSomaContasAbertas = function(url) {
		
		$.ajax({
			
			url: url,
			cache: false,
			dataType:"json",
			success: function(retorno){
				
				retorno.map(function(dados) {
					
					var valorTotal = dados.somaConta.substring(0,6);
					if(dados.cpTipoConta == 'P') {
						
						$("#cpTotalValorPagar").val("R$ " + valorTotal);
						
					}else if(dados.cpTipoConta == 'R'){
						
						$("#cpTotalValorReceber").val("R$ " + valorTotal);
					}
				});
			}
		});
	}
	
	var getSomaContasFechadas = function(url) {
		
		$.ajax({
			
			url:url,
			cache: false,
			dataType: "json",
			success: function(retorno){
				
				retorno.map(function(dados){
					
					var valorTotal =  dados.somaConta.substring(0,6);
					if(dados.cpTipoConta == 'P'){
						
						$("#cpTotalValorPagado").val("R$ " + valorTotal);
					
					}else if(dados.cpTipoConta == 'R') {
						
						$("#cpTotalValorRecebido").val("R$ " + valorTotal);
					}
				});
			}
			
		});
	}
	
	var bindEvents = function() {
		
		getSomaContasAbertas('http://localhost/startDemand/service/Service_Soma_Contas_Abertas.php');
		getSomaContasFechadas('http://localhost/startDemand/service/Service_Soma_Contas_Fechadas.php');
		mascaraCampos();
		createDatePicker();
		
		$(document).on("click","#exluirConta", function() {
			
			return confirm("Deseja excluir esse registro ?");
		});
		
		$(document).on("click","#cpConfirmaContaReceber",function(){
			
			return confirm ("Fechar essa conta ?");
		});
	}

	return {
		
		bindEvents: bindEvents
	}
})();