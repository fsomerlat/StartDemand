/**
 * 
 */

var FormHelperPedido = (function() {
	
	var expandePainel = function(idPanel) {
		
		$("#panel-element_" + idPanel).collapse();
	}
	
	var verificaUrl =  function() {
		
		var url = window.location.search.replace("?",""),
			itens = url.split("&");
		
		var getItensUrl = {
				
				"panel" : itens[0]
		}
		
		return getItensUrl.panel.substring(6,12);
	}
	
	var getAjaxValorProduto = function(cptuProduto_idProduto) {
		
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Produto.php",
			cache:false,
			dataType:"json",
			success:function(retorno) {
				  
			retorno.map(function(dados){
					   
					if(dados.idProduto == cptuProduto_idProduto) {	
						
						$("#cpValorTotalProduto").attr("value",dados.cpValorProduto);
						$("#cpValorBaseProduto").val(dados.cpValorProduto);
					}
				});
			}
		});
	}
	
	var getValorBaseProduto =  function() {
		
		return $("#cpValorBaseProduto").val();
	}
	
	var preencheValorProduto = function() {
		
		$("#valorTotalPedido").html("R$ 0,0");
		
		$("#cpQtdProduto").change(function() {
			
			var nomeProduto = $("#cptuProduto_idProduto").val();
			if(nomeProduto == '') {
					
				this.value = 0;
				window.alert("È necessário selecionar o campo  [ NOME DO PRODUTO ] !");
				$("#cptuProduto_idProduto").focus() ; return false;
				
			} else if(this.value ==  0) { 
				
				$(".toClearProduto").val("");
				$("#valorTotalPedido").html("R$ 0,0");
				
			} else {
				
				var result = this.value * getValorBaseProduto();
				$("#cpValorTotalProduto").attr("value",result);
				$("#cpValorTotalPedido").val(getSomaTotalPedido());
			}
		});
	}
	
	
	/**SERA UTILZADO APÓS O PEDIDO JA ESTIVER LISTADO NA TELA**/
	var getSomaTotalPedido = function() {
		
	
		var valorAcrescimo = $("#cpValorTotalAcrescimo").val(), // NÃO ESTÁ BINDANDO O VALOR ACRESCIMO POIS ESTA EM OUTRO ARQUIVO
			valorProduto = $("#cpValorTotalProduto").val(),
			somaTotalPedido = '';
	
		if(valorAcrescimo != '' || valorProduto != '') {
			
			(valorAcrescimo == '') ? valorAcrescimo = 0 :false;
			(valorProduto == '') ? valorProduto = 0 : false;			
			
			somaTotalPedido = parseFloat(valorAcrescimo) + parseFloat(valorProduto);
			$("#valorTotalPedido").html(valorProduto);
		}	
		return somaTotalPedido; //RETORNANDO NAN =  ERRO
	}
	
	var defineTipoPedido = function(value) { 
		
		if(value == "comAcrescimo") {
			
			$("#btnCadastrarPedido").attr("value","gerar pedido com acrescimo");
			
		} else if(value == "semAcrescimo") {
			
			$("#btnCadastrarPedido").attr("value","gerar pedido");
		}
	}
	
	var bindEvents =  function() {
		
		expandePainel(verificaUrl());
		preencheValorProduto();
		
		$(document).on("click","#pedidoCancelado", function() {
			
			return confirm("Deseja cancelar esse pedido ?");
		});
		
		$(document).on('change','#cptuProduto_idProduto', function(ev) {
			
			getAjaxValorProduto(ev.target.value);
		});
		
		$(document).on("click","#pedidoLiberado",function(){
			
			return confirm("O pedido foi finalizado ?");
		});
		
		$("input[name=tipoPedido]").click(function() {
			
			defineTipoPedido(this.value);
		});
	}
	
	
	
	return  {

		bindEvents: bindEvents,
		getSomaTotalPedido: getSomaTotalPedido
	}
})();
	    
	    