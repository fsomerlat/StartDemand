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
	
	var getContadorPedido =  function() {
	
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Conta_Pedidos.php",
			cache: false,
			dataType:"json",
			success: function(retorno){
				
				retorno.map(function(dados){
					
					var status = dados.cpStatusPedido;

					if(status == "F") {
						statusF += dados.contaPedido;
						$(".pedidosFinalizados").html(dados.contaPedido);
					}else if(status == "C"){
						statusC += dados.contaPedido;
						$(".pedidosCancelados").html(dados.contaPedido);
					}else if(status == "A") {
						statusA += dados.contaPedido;
						$(".pedidoEmAndamento").html(dados.contaPedido);
					}
				});
			}
		});
		
	}
	
	var getPedidoDiaCorrente = function() {
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Pedido.php",
			cache: false,
			dataType:"json",
			success:function(retorno) {
				
				retorno.map(function(dados){
					
					var objDtHoje =  dados.cpHoraPedido.substring(0,10);
						dataAtual = objDtHoje.split("-");
						
						ano = dataAtual[0];
						mes = dataAtual[1];
						dia = dataAtual[2];
						
					
					data = dia+"/"+mes+"/"+ano;
					
					console.log(data);
						
				});
				
			}
		});

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
		getContadorPedido();
		getPedidoDiaCorrente();
		
		$(document).on("click","#pedidoCancelado", function() {
			
			return confirm("Deseja cancelar esse pedido ?");
		});
		$(document).on('change','#tuProduto_idProduto', function(ev) {
			
			Service_Pedido.getAjaxValorProduto(ev.target.value);
		});
		
		$(document).on("click","#pedidoLiberado",function(){
			
			return confirm("O pedido foi finalizado ?");
		});
		
		$("select[name=tipoPedido]").change(function() {
			
			defineTipoPedido(this.value);
		});
	}
	
	return  {

		bindEvents: bindEvents
	
	}
})();
	    
	    