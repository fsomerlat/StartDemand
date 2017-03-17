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
		
	var getValorBaseProduto =  function() {
		
		return $("#cpValorBaseProduto").val();
	}
	
	var getContadorPedido =  function() {
	
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Conta_Pedidos.php",
			cache: false,
			dataType:"json",
			beforeSend:function(){
				$(".pedidosFinalizados,.pedidosCancelados,.pedidoEmAndamento").html(0)
			},
			success: function(retorno){
				
				retorno.map(function(dados){
					
					var status = dados.cpStatusPedido;

					if(status == "F") {
					
						$(".pedidosFinalizados").html(dados.contaPedido);
					}else if(status == "C"){
						
						$(".pedidosCancelados").html(dados.contaPedido);
					}else if(status == "A") {
						
						$(".pedidoEmAndamento").html(dados.contaPedido);
					}
				});
			}
		});
		
	}
	
	var getPedidoDiaCorrente = function() {
		
		var contador = [];
		
		$.ajax({
			
			url: "http://localhost/startDemand/service/Service_Pedido.php",
			cache: false,
			dataType:"json",
			beforeSend:function(){
				$(".pedidosDeHoje").html(0);
			},
			success:function(retorno) {
				
				retorno.forEach(function(dados){
					
					var objDtHoje =  dados.cpHoraPedido.substring(0,10);
						dataAtual = objDtHoje.split("-");
						
						ano = dataAtual[0];
						mes = dataAtual[1];
						dia = dataAtual[2];
						
					
					data = dia+"/"+mes+"/"+ano;
					
				
					if(data == Utils.carregaDataDeHoje(new Date())) {
						
						contador.push(dados.idPedido);
						
						for(var i=0;i < contador.length; i++) {
							
							$(".pedidosDeHoje").html(i + 1);
						}
						
					}else{
						$(".pedidosFinalizados,.pedidosCancelados,.pedidoEmAndamento,.pedidosDeHoje").html(0)

					}
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
		
		preencheValorProduto();
		getPedidoDiaCorrente();
		getContadorPedido();
		
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
	    
	    