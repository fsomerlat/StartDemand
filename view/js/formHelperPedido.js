/**
 * 
 */

var FormHelperPedido = (function() {
	
	
	var getValorTotalPedido = function() {
		
		return $(".valTotalPedidoPagPedido").val();
	}
	
	var setValorTotalPedido = function(valor) {
		
		$(".valTotalPedidoPagPedido").val(valor);
	}
		
	
	var expandePainel = function(idPanel) {
		
		$("#panel-element_" + idPanel).collapse();
	}
	
	var getValorBaseProduto =  function() {
		
		return $("#cpValorBaseProduto").val();
	}
	
	var preencheValorProduto = function() {
		
		$(".valTotalPedidoPagPedido").attr("placeholder","R$ 00.00");
		
		$("#cpQtdProduto").change(function() {
			
			var nomeProduto = $("#tuProduto_idProduto").val();
			if(nomeProduto == 0) {
					
				this.value = 0;
				window.alert("È necessário selecionar o campo  [ NOME DO PRODUTO ] !");
				$("#tuProduto_idProduto").focus() ; return false;
				
			} else if(this.value ==  0) { 
				
				$(".toClearProduto").val("");

			} else {
				
				var result = this.value * getValorBaseProduto();
				$("#cpValorTotalProduto").attr("value",result);
				
				setValorTotalPedido(result);
				
			}
		});
	}
	
	var defineTipoPedido = function(value) { 
		
		if(value == "comAcrescimo") {
			
			$("#btnCadastrarPedido").attr("value","gerar pedido com acrescimo");
			
		} else if(value == "semAcrescimo") {
			
			$("#btnCadastrarPedido").attr("value","gerar pedido");
		}
	}
	
	var bindEvents =  function() {
		
		expandePainel(Utils.verificaUrl());
		preencheValorProduto();
		
		$(document).on("click","#pedidoCancelado", function() {
			
			return confirm("Deseja cancelar esse pedido ?");
		});
		$(document).on('change','#tuProduto_idProduto', function(ev) {
			
			Service_Pedido.getAjaxValorProduto(ev.target.value);
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
	
	}
})();
	    
	    