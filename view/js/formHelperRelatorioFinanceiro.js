
var FormHelperRelatorioFinanceiro = (function(){
	
	var setHideCamposData =  function() {
		
		$(".isFltDataFinanceiro").hide();
	}
	
	var createDatePickerDataInicio = function() {
		
		$("#cpDataInicio").datepicker({
			
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
		
		$("#cpDataFinal").datepicker({
			
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
	
	var changeTipoPesquisa = function(option) {
		
		if(option == "T") {
			
			setHideCamposData();
		$(".isBtnFiltrarFinanceiro").removeClass('col-md-2').addClass('col-md-9');
			$(".toClearDataFinanceiro").val("");
		
		}else if(option == "D"){
			
			$(".isFltDataFinanceiro").show();
			$(".isBtnFiltrarFinanceiro").removeClass('col-md-9').addClass('col-md-2');
		}else{
			
			setHideCamposData();
			$(".isBtnFiltrarFinanceiro").removeClass('col-md-2').addClass('col-md-9');
			$(".toClearDataFinanceiro").val("");
		}
	}
	
	var filtroFinanceiro = function() {
		
		var status = $("#cpStatusFinanceiro").val(),
			dataInicio = $("#cpDataInicio").val(),
			dataFinal = $("#cpDataFinal").val(),
			tipoPesquisa = $("#cpTipoPesquisa").val(),
			filtroFinanceiro = "filtroFinanceiro";

		$.post("http://localhost/startDemand/controller/Financeiro_Controller.php",
				{filtroFinanceiro:filtroFinanceiro,status:status,dataInicio:dataInicio,dataFinal:dataFinal,tipoPesquisa:tipoPesquisa},function(retorno){
			
			$("#tablePesquisaFinancerio tbody").html(retorno);
			
			if(tipoPesquisa != "") {
				
				$(".msgRelatorioFinanceiro").html("preparando relatório específico em PDF...");
				
				setTimeout(function(){
					
					if(!confirm("Deseja gerar um relatório em PDF dessas informações ?")) {
						
						$(".msgRelatorioFinanceiro").html("");
						return false;
						
					}else{
						
						if(tipoPesquisa == "T") {
							
							$(".msgRelatorioFinanceiro").html("");
							gerarPDFTotal(tipoPesquisa);	
						
						}else if(tipoPesquisa == "D") {
							
							$(".msgRelatorioFinanceiro").html("");
							geraPDFPorData(tipoPesquisa,status,dataInicio,dataFinal);
						}
					}	
					
				},1300);	
			}		
		});
	}
		
	var gerarPDFTotal = function(tipoPesquisa) {
		
		window.open('http://localhost/startDemand/gera-pdf/PDF_Financeiro.php?tipoPesquisa='+tipoPesquisa, "_blank");	
	}
	
	var geraPDFPorData = function(tipoPesquisa,status,dataInicio,dataFinal) {
		
		window.open("http://localhost/startDemand/gera-pdf/PDF_Financeiro.php?tipoPesquisa="+tipoPesquisa+"&status="+status+"&dataI="+dataInicio+"&dataF="+dataFinal,"_blank");
	}
	
	var bindEvents = function() {
		
		createDatePickerDataInicio();
		createDatePickerDataFinal();
		setHideCamposData();
		
		$("select[name=cpTipoPesquisa]").change(function(){
			
			changeTipoPesquisa(this.value);
		});
		
		$("#btnFiltrarFinanceiro").click(function(){
			
			filtroFinanceiro();
		
		});
		
		$("#btnPrintFinanceiro").click(function(){
			
			return window.print();
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();