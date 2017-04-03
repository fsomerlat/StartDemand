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
	
	var setPorcentagemJuros = function(value) {
		
		var arryValue =  value.split("-"),
			setValue = arryValue[1];
			
		$("#cpPorcentagemJurosPedido").val(setValue);
	}
	
	var getTaxaJuros = function(value) {
		
		var optionPagSeguro = "",
			optionBandeiraCartao = "";
		
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Taxa_Juros.php",
			cache:false,
			dataType:"json",
			success: function(retorno) {
				
				optionPagSeguro += "<option value='0'>Selecione</option>";
				optionBandeiraCartao += "<option value='0'>Selecione</option>";
				retorno.map(function(dados) {
					
					if(value ==  dados.cpFormaPagamentoTaxa) {
						
						optionPagSeguro += "<option value='"+dados.cpBandeiraCartaoTaxa+"-"+dados.cpPorcentagemTaxa+"'>Receber em "+dados.cpPlanoPagSeguro+" dias</option>";
						optionBandeiraCartao += "<option value='"+dados.cpBandeiraCartaoTaxa+"-"+dados.cpPorcentagemTaxa+"'>"+dados.cpBandeiraCartaoTaxa+"</option>";
					}
				});
				
				$("#cpPlanoPagSeguroPedido").html(optionPagSeguro);
				$("#cpBandeiraCartaoPedido").html(optionBandeiraCartao);
			}
		});
	}
	
	
	var changeFormaPagamento = function(value) {
		
		if(value == "PS") {
			
			$(".isPagSeguroProduto,.isValorJuros,.isValorLiquido,.isPorcentagemJuros").show();
			$(".isBandeiraCartaoPedido,.parcelas").hide();
			
		} else if(value == "CC") {
			
			$(".isValorJuros,.isValorLiquido,.isPorcentagemJuros,.isBandeiraCartaoPedido,.parcelas").show();
			$(".isPagSeguroProduto").hide();
		
		} else if(value == "CD" ) {
			
			$(".isValorJuros,.isValorLiquido,.isPorcentagemJuros,.isBandeiraCartaoPedido").show();
			$(".parcelas,.isPagSeguroProduto").hide();

		}else if(value == "D") {
			
			$(".parcelas,.isPagSeguroProduto,.isValorJuros,.isValorLiquido,.isPorcentagemJuros,.isBandeiraCartaoPedido").hide();
			$("#cpValorParcela").val("");
			$("#cpQtdParcela").val(0);
		
		} else {
			
			$(".parcelas,.parcelas,.isPagSeguroProduto,.isValorJuros,.isValorLiquido,.isPorcentagemJuros,.isBandeiraCartaoPedido").hide();
			$("#cpValorParcela").val("");
			$("#cpQtdParcela").val(0);
		}	
	}
	
	var setFormaPagamento = function() {
		
		$(".creditoOuDebito,.parcelas,.isPagSeguroProduto,.isPorcentagemJuros,.isValorJuros,.isValorLiquido,.isBandeiraCartaoPedido").hide();
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
				
				setValorTotalPedido(result);
				$("#cpValorTotalProduto").attr("value",result);
				
				recalcularValores();
			}
		});
	}
	
	var atualizaValores = function(){
		
		setTimeout(function() {
			
			var qtdProduto = $("#cpQtdProduto").val(),
			valorBaseProduto = $("#cpValorBaseProduto").val(),
			multiplica = parseInt(qtdProduto) * parseFloat(valorBaseProduto);
			setValorTotalPedido(multiplica);				
		
		},100)			
	}
	
	var recalcularValores = function() {	
		
		var result = getValorTotalPedido();
		porcentagemTaxaJuros = $("#cpPorcentagemJurosPedido").val(),
		valorTaxaJuros = parseFloat(porcentagemTaxaJuros) * result / 100,
		valorTotalLiquido = parseFloat(result) - parseFloat(valorTaxaJuros);
	
		$("#cpValorTaxaJurosPedido").val(valorTaxaJuros);
		$("#cpValorTotalLiquidoPedido").val(valorTotalLiquido);
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
		setFormaPagamento();
		createDatePicker();
		setDivideParcela();
		
		$("select[name=cpFormaPagamento]").change(function(){
			
			getTaxaJuros(this.value);
			changeFormaPagamento(this.value);
		});
		
		$(document).on("change","#cpPlanoPagSeguroPedido",function(){
			
			var arryValue = this.value.split("-"),
				setValue = arryValue[1];
			
			setPorcentagemJuros(this.value);
			atualizaValores();
			recalcularValores();
		});
		
		$(document).on("change","#cpBandeiraCartaoPedido", function(){
			
			var arryValue = this.value.split("-"),
				setValue = arryValue[1];
			
			setPorcentagemJuros(this.value);
			atualizaValores();
			recalcularValores();
		});

		$(document).on("click","#pedidoCancelado", function() {
			
			return confirm("Deseja cancelar esse pedido ?");
		});
		
		
		$(document).on('change','#tuProduto_idProduto', function(ev) {
			
			Service_Pedido.getAjaxValorProduto(ev.target.value);
			atualizaValores();
			
			setTimeout(function(){
				
				recalcularValores();
			},150);
			
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
	    
	    