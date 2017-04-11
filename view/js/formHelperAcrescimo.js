var FormHelperAcrescimo = (function(){
	
	var option =  function(){
		
		var options = "";
			options += "<option value='0'>Selecione</option>";
			for(var i=1;i < 101; i++) {
				
				options += "<option value="+i+">"+i+"</option>";
			}
		return options;
	}
	
	var preencheComboCodPedido = function(){
		
		$(".codPedidoAcrescimo").html(option());
	}
	
	var changeFormaPagamento = function(value) {
		
		if(value == "D") {
			
			$(".isParcela,.isPlanoPagSeguro,.isBandeiraCartao,.isTaxaJuros,.isTotalLiquido,.isPorcentagemTaxa").hide();
		}
		
		else if(value == "CC"){
			
			$(".isParcela,.isBandeiraCartao,.isTaxaJuros,.isPorcentagemTaxa,.isTotalLiquido").show();
			$(".isPlanoPagSeguro").hide();
			
		}else if(value == "CD"){
			
			$(".cpQtdParcelaAcrescimo").val(0);
			$(".isBandeiraCartao,.isTaxaJuros,.isPorcentagemTaxa,.isTotalLiquido").show();
			$(".isParcela,.isPlanoPagSeguro").hide();
			
		}else if(value == "PS"){
			
			$(".isParcela,.isBandeiraCartao").hide();
			$(".isPlanoPagSeguro,.isTaxaJuros,.isPorcentagemTaxa,.isTotalLiquido").show();
			$(".cpQtdParcelaAcrescimo").val(0);
		}else {
			
			$(".isParcela,.isPlanoPagSeguro,.isBandeiraCartao,.isTaxaJuros,.isTotalLiquido,.isPorcentagemTaxa").hide();
		}
	}
	
	var createDatePicker = function() {
		
		$( "#cpDataVencimentoParcelaAcrescimo" ).datepicker({
			
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
	
	var getAjaxValorAcrescimo = function(nomeProduto) {
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Produto.php",
			cache: false,
			dataType:"json",
			success:function(retorno) {
					
			retorno.map(function(dados) {
					
					if(dados.cpNomeProduto == nomeProduto) {
					
						$("#cpValorTotalAcrescimo").val(dados.cpValorProduto);
						$("#cpValorBaseAcrescimo").val(dados.cpValorProduto);
	
					} 
				});
			}
		});
	}
	
	
	var setJurosPagSeguro = function(value) {
			
		$("#valorBaseTaxaJuros").val(value);
		
		if(value == "D" || value == "CD" || value == "") {
			
			$("#cpPorcentagemTaxa").val(0);
		}
	}
	
	var setValorBaseTaxaJuros = function(value) {
		
		var arryValue  = value.split("-"),
			setValue = arryValue[1];		//PEGA A TAXA DO CARTAO QUE ESTÁ JUNTO AO NOME DA BANDEIRA DO CARTAO
		
		$("#cpPorcentagemTaxa").val(setValue);
	}
	
	var getTaxaBaseJuros = function() {
		
		return $("#cpPorcentagemTaxa").val();   	
	}
	
	var setTaxaJuros = function() {
		
		var valorTotal = getValorTotalAcrescimo(),
		taxaBaseJuros = getTaxaBaseJuros(),
		resultTaxa =  parseFloat(taxaBaseJuros) * parseFloat(valorTotal) / 100,
		valorTotalRecalculado = valorTotal - resultTaxa;
		
		$("#cpValorTaxaJuros").val(resultTaxa);
		$("#cpValorTotalAcrescimo").val(valorTotal);
		
		setTimeout(function(){
		
			$("#cpValorTotalLiquido").val(valorTotalRecalculado);	
			
		},100)

	} 	
	
	var setBandeiraCartoes = function(value) {
	    
		var options = "",
			optionPlanoPagSeguro = "";
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Taxa_Juros.php",
			cache: false,
			dataType:"json",
			success: function(retorno) {
				
			    options += "<option value='0'>Selecione</option>";
			    optionPlanoPagSeguro += "<option value='0'>Selecione</option>";
			    
				for(var i=0; i < retorno.length; i++) {                                                                                              
					
					if(value == retorno[i].cpFormaPagamentoTaxa){
						
						options += "<option value='"+retorno[i].cpBandeiraCartaoTaxa+"-"+retorno[i].cpPorcentagemTaxa+"'>"+retorno[i].cpBandeiraCartaoTaxa+ "</option>";
						optionPlanoPagSeguro += "<option value='PagSeguro-"+retorno[i].cpPorcentagemTaxa+"'>"+retorno[i].cpPlanoPagSeguro+" dias</option>";
					}
				}
				
				$("#cpBandeiraCartao").html(options);
				$("#cpPlanoPagSeguro").html(optionPlanoPagSeguro);			
			}
		});
		
	}
	
	var getValorTotalAcrescimo =  function() {
		
		return  $("#cpValorTotalAcrescimo").val();
	}
	
	var setValorParcelas = function(value) {
		
		var parcelas = getValorTotalAcrescimo() / value;
		
		$("#cpValorParcelaAcrescimo").val(parcelas);
	}
	
	var setHideBlocoFormaPagamento= function() {
		
		$(".isParcela,.isPlanoPagSeguro,.isBandeiraCartao,.isTaxaJuros,.isTotalLiquido,.isPorcentagemTaxa").hide();
	}
	
	var mascaraCampos = function() {
		
		$("#cpPorcentagemTaxa").mask("99.99");
	}
	
	var bindEvents = function(){
		
		preencheComboCodPedido();
		setHideBlocoFormaPagamento();
		createDatePicker();
		mascaraCampos();
		
		$(document).on('change','#cpAcrescimo',function(ev) {
			
			if(this.value == "") {
				$(".isZero").val(0);
				$(".isPlaceholder").val("").attr("placeholder","R$ 00.00");				
			}else{
				getAjaxValorAcrescimo(ev.target.value);;	
			}
			
			setTimeout(function() {
				setTaxaJuros();
			},100);
		});		
		
		$(document).on("click","#excluirAcrescimoAvulso", function() {
			
			return confirm("Deseja excluir esse  registro ?");
		});
		
		$("select[name=cpFormaPagamentoAcrescimo]").change(function(){
			
			setJurosPagSeguro(this.value);
			setBandeiraCartoes(this.value);
			changeFormaPagamento(this.value);
			
			if(this.value != "CC") {
				
				$("#cpQtdParcelaAcrescimo").val(0);
				$("#cpValorParcelaAcrescimo").val("");
			}
		});
		
		$("#cpQtdParcelaAcrescimo").change(function(){
			
			var valTotal = $("#cpValorTotalAcrescimo").val();
		
			if(valTotal == "") {
				this.value = 0 ;
				window.alert("È necessário ter um valor para gerar parcelas !");
				$("#cpAcrescimo").focus();
				return false;
			}else{
				setValorParcelas(this.value);
			}
					
		});
	
		$("#cpQtdAcrescimo").change(function(){
			
			setTaxaJuros();
			
			var  parcelas = $("#cpQtdParcelaAcrescimo").val();
				
			if(this.value > 0) {
				
				setTimeout(function(){
					setValorParcelas(parcelas);
				},100);
				
			}else{
				$("#cpValorParcelaAcrescimo").val("").attr("placeholder","R$ 00.00");
			}
				
		
		});
		
		$(document).on("change","#cpPlanoPagSeguro", function(){
				
			setValorBaseTaxaJuros(this.value);
			setTaxaJuros();

		});
		
		$(document).on("change","#cpBandeiraCartao",function(){

			var acresimo = $("#cpAcrescimo").val();
			
			if(acresimo == "") {
				
				this.value = 0;
				$("#cpAcrescimo").focus();
				window.alert("Informe primeiramente um acréscimo !"); return false;
			}
			
			setValorBaseTaxaJuros(this.value);
			setTaxaJuros();
				
		});		
		
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();