var FormHelperRelatorioPedido = (function(){
	
	var createDatePickerDataInicio = function() {
		
		$("#cpDataInicioPesqPedido").datepicker({
			
			dateFormat: 'dd/mm/yy', //formato da data
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], //nomes dos campos dos dias
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],//nomes do titulo dos dias
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], //dias com nomes curtos
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],//nomes dos messes
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],//meses com nomes curtos
		    maxDate: new Date(),
		    nextText: 'Próximo',//titulo do próximo texto
		    prevText: 'Anterior',//titulo do texto anterior

		});
	}
	
	var createDatePickerDataFinal = function() {
		
		$("#cpDataFinalPesqPedido").datepicker({
			
			dateFormat: 'dd/mm/yy', //formato da data
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], //nomes dos campos dos dias
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],//nomes do titulo dos dias
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], //dias com nomes curtos
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],//nomes dos messes
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],//meses com nomes curtos
		    maxDate: new Date(),
		    nextText: 'Próximo',//titulo do próximo texto
		    prevText: 'Anterior',//titulo do texto anterior
		
		});
	}
	
	var pesquisaPedido = function() {
		
		var filtroPedido = "filtroPedido",
		    tipoPesquisa = $("#cpTipoPesquisaPedido").val(),
			status = $("#cpŚtatusPesqPedido").val(),
			dataInicio = $("#cpDataInicioPesqPedido").val(),
			dataFinal = $("#cpDataFinalPesqPedido").val();
		
		$.post("http://localhost/startDemand/controller/Pedido_Controller.php",
				
				{filtroPedido:filtroPedido,tipoPesquisa:tipoPesquisa,status:status,dataInicio:dataInicio,dataFinal:dataFinal}, function(retorno){
				
				
				if(retorno == "") {
					$("#tablePesquisaPedido tbody").html("");
					$(".msgPesquisaPedido").html("<h4>Nenhum resultado para pesquisa realizada !</h4>");
					return false;
				}else{
					
						$(".msgPesquisaPedido").html("");
						$(".msgPreparaPDF").html("preparando relatório especṕifico em PDF...")
						$("#tablePesquisaPedido tbody").html(retorno);	
						
						setTimeout(function(){
							
							if(!confirm("Deseja gerar um relatório em PDF dessa informações ?")) {
								
								$(".msgPreparaPDF").html("");
								return false;
							
							} else {
								
								if(tipoPesquisa == "T") {
									
									gerarPDFTodos(tipoPesquisa);
								
								}else if(tipoPesquisa == "D") {
									
									geraPDFData(tipoPesquisa,status,dataInicio,dataFinal);
								} 
								
								$(".msgPreparaPDF").html("");
							}
				
						},1300);						
					}						
					
		});
	}	
	
	
	var gerarPDFTodos = function(tipoPesquisa) {
		
		window.open("http://localhost/startDemand/gera-pdf/PDF_Pedidos.php?tipoPesquisa="+tipoPesquisa);
	}
	
	var geraPDFData = function(tipoPesquisa,status,dataInicio,dataFinal) {
		
		window.open("http://localhost/startDemand/gera-pdf/PDF_Pedidos.php?tipoPesquisa="+tipoPesquisa+"&status="+status+"&dataInicio="+dataInicio+"&dataFinal="+dataFinal);
	}
	
	
	var changeTipoPesquisa = function(option) {
		
		if(option == ""){
			
			$(".toClearDataPesqPedido").val("");
			$(".isDataPesquisaPedido").hide();
			$(".isBtnFltPedido").removeClass("col-md-2").addClass("col-md-9");
			return false;
			
		}else{
			
			if(option == "T") {
				
				$(".isDataPesquisaPedido").hide();
				$(".isBtnFltPedido").removeClass("col-md-2").addClass("col-md-9");
				$(".toClearDataPesqPedido").val("");
				
			}else if (option == "D") {
				
				$(".isDataPesquisaPedido").show();
				$(".isBtnFltPedido").removeClass("col-md-9").addClass("col-md-2");
			}
		}
	}
	
	var setHideCampos = function() {
		
		$(".isDataPesquisaPedido").hide();
	}
	
	var bindEvents = function() {
		
		createDatePickerDataInicio();
		createDatePickerDataFinal();
		setHideCampos();
		
		$("#cpTipoPesquisaPedido").change(function(){
			
			changeTipoPesquisa(this.value);
		});
		
		$("#btnFiltroPedido").click(function(){
			
			pesquisaPedido();
		});	
		
		
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();