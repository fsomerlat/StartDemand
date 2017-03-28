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
	
	var setHideBlocoParcelasAcrescimo = function() {
		
		$(".blocoParcelasAcrescimo").hide();
	}
	
	var bindEvents = function(){
		
		preencheComboCodPedido();
		setHideBlocoParcelasAcrescimo();
		
		
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
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();