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
		
		if(value == "CC"){
			
			$(".blocoParcelasAcrescimo").show();
		}else{
			$(".blocoParcelasAcrescimo").hide();
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
	
	var getValorTotalAcrescimo =  function() {
		
		return $("#cpValorTotalAcrescimo").val();
	}
	
	var setValorParcelas = function(value) {
		
		var parcelas = getValorTotalAcrescimo() / value;
		
		$("#cpValorParcelaAcrescimo").val(parcelas);
	}
	
	var setHideBlocoParcelasAcrescimo = function() {
		
		$(".blocoParcelasAcrescimo").hide();
	}
	
	var bindEvents = function(){
		
		preencheComboCodPedido();
		setHideBlocoParcelasAcrescimo();
		createDatePicker();
		
		$(document).on('change','#cpAcrescimo',function(ev) {
			
			if(this.value == "") {
				$(".isZero").val(0);
				$(".isPlaceholder").val("").attr("placeholder","R$ 00.00");				
			}else{
				getAjaxValorAcrescimo(ev.target.value);
			}
		});		
		
		$(document).on("click","#excluirAcrescimoAvulso", function() {
			
			return confirm("Deseja excluir esse  registro ?");
		});
		
		
		$("select[name=cpFormaPagamentoAcrescimo]").change(function(){
			
			changeFormaPagamento(this.value);
			
			if(this.value != "CC") {
				
				$("#cpQtdParcelaAcrescimo").val(0);
				$("#cpValorParcelaAcrescimo").val("");
			}
		});
		
		$("#cpQtdParcelaAcrescimo").change(function(){
			
			if(this.value > 0) {
				setValorParcelas(this.value);	
			}else{
				$("#cpValorParcelaAcrescimo").val("").attr("placeholder","R$ 00.00");
			}
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();