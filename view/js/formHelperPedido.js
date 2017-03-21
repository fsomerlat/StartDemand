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
	
	var createDatePicker = function() { // SERÁ UTILIZADO NO FINANCEIRO
		  
		var data = new Date();
			
			dia = data.getDate();
			mes = data.getMonth() + 2;
			ano = data.getFullYear();
			
		novaData = dia +'/'+mes+'/'+ano;
		
		$( "#cpDataVencimentoParcela" ).datepicker({
			
			dateFormat: 'dd/mm/yy', //formato da data
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'], //nomes dos campos dos dias
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],//nomes do titulo dos dias
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], //dias com nomes curtos
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],//nomes dos messes
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],//meses com nomes curtos
		    minDate: novaData,
		    nextText: 'Próximo',//titulo do próximo texto
		    prevText: 'Anterior',//titulo do texto anterior

		    });
	}
	
	
	var changeFormaPagamento = function(value) {
		
		if(value == "CC") {
			
			$(".parcelas").show();
			
		
		} else if(value == "CD" ) {
			
			$(".parcelas").hide();
			
		}else if(value == "D") {
			
			$(".parcelas").hide();
			$("#cpValorParcela").val("");
			$("#cpQtdParcela").val(0);
		
		} else {
			
			$(".parcelas").hide();
			$("#cpValorParcela").val("");
			$("#cpQtdParcela").val(0);
		}	
	}
	
	
	var changeQtdParcelas =  function(value) {

		 	
		 if(value == "Debito") {
			
			$(".parcelas").hide();
			$("#cpQtdParcela").val(0);
		
		} else if(value == "Credito") {
			
			$(".parcelas").show();
		
		} else {
			
			$(".parcelas").hide();
			$("#cpQtdParcela").val(0);
		}
	}
	
	var setSituacaoPagamento = function() {
		
		$(".creditoOuDebito").hide();
		$(".parcelas").hide();
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
	
	var setDivideParcela = function() {
		
		$("input[name=cpValorParcela]").attr("placeholder","R$ 00.00");
		
		$("select[name=cpQtdParcela]").change(function(){
			
			var valorTotalPedido = $(".valTotalPedidoPagPedido").val();
	
			if(this.value > 0) {
			
				if(valorTotalPedido != "") {
					
					$("input[name=cpValorParcela]").val(parseFloat(valorTotalPedido) / parseInt(this.value));
				
				}else{
					
					this.value = 0;
					window.alert("O valor total do pedido não pode ser zero para poder dividir as parcelas !");
					$("#cpQtdProduto").focus(); return false;
					
				}
			}else{
				
				$("input[name=cpValorParcela]").val(0);
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
		setSituacaoPagamento();
		createDatePicker();
		setDivideParcela();
		
		$("select[name=cpFormaPagamento]").change(function(){
			
			changeFormaPagamento(this.value);
		});
		
		$("select[name=cpCreditoOuDebito]").change(function(){
			
			changeQtdParcelas(this.value);
		});
		
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
	    
	    