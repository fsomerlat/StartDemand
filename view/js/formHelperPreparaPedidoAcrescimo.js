var FormHelperAcrescimo = (function() {
	
	var getValorProduto = function() {
		
		return  $("#valTotalPreparaProduto").val();
	}
	
	var getValorAcrescimo =  function() {
		
		return $("#valTotalPreparaAcrescimo").val();

	}
	var setValorProduto = function(valor) {
		
		$("#valTotalPreparaProduto").val(valor);
	}
	
	var setValorAcrescimo = function(valor) {
		
		$("#valTotalPreparaAcrescimo").val(valor);				
	}
	
	var setSomaValores = function() {
		
		setTimeout(function() {
			
		var somaProduto = getValorProduto(),
			somaAcrescimo = getValorAcrescimo();
		
			if(somaProduto == 0 && somaAcrescimo == 0) {
				
				$(".valTotalPedidoPagPreparaPedido").attr("placeholder","R$ 00.00");

			}else {
				
			     somaTotal = parseFloat(somaProduto) + parseFloat(somaAcrescimo);
				 $(".valTotalPedidoPagPreparaPedido").val(somaTotal);				
			}
		},100);
	}	
	
	var expandePainel = function(idPanel) {
		
		$("#panel-element_" + idPanel).collapse();
	}
	
	var getValorBaseAcrescimo =  function() {
		
		return $("#cpValorBaseAcrescimo").val();
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
	
	var efetivarPedido =  function() {
		
		var efetivaPedido = "efetivaPedido";
		$.post("http://localhost/startDemand/controller/Pedido_Controller.php",{efetivaPedido: efetivaPedido },function(retorno){ 
			
			var msgRetornoInforme = retorno.substring(0,7),
				msgRetornoEnecessario = retorno.substring(0,1);
			
			if(msgRetornoInforme == "Informe") {
				$(".msgPedido").html(Utils.msgDanger(retorno)).collapse();
				Utils.setTimeoutLocation('http://localhost/startDemand/view/Pedido.php?panel=193158')
			}else if(msgRetornoEnecessario == "È") {
				
				$(".msgPedido").html(Utils.msgDanger(retorno)).collapse();
				Utils.setTimeoutReload();
			} else {
				
				$(".msgPedido").html(Utils.msgSuccess(retorno)).collapse();
				Utils.setTimeoutLocation('http://localhost/startDemand/view/Pedido.php?panel=193158');
			}
		});
	}
	
	var postConfirmPedido =  function() {
		
		var valTotalPedido = $(".valTotalPedidoPagPreparaPedido").val(),
			tuPedido_cpCodPedido = $("#tuPedido_cpCodPedido").val(),
			cpObservacaoAcrescimo = $("#cpObservacaoAcrescimo").val(),
		    confirm = "confirmaPedido";
		
		$.post("http://localhost/startDemand/controller/Pedido_Controller.php",{confirm:confirm,valTotalPedido:valTotalPedido,
			tuPedido_cpCodPedido:tuPedido_cpCodPedido,cpObservacaoAcrescimo:cpObservacaoAcrescimo} ,function(retorno){
					
				var msgRetorno = retorno.substring(0,7),
					msgRetornoAcrescimos = retorno.substring(0,9);
				if(msgRetorno == "Informe") {
					
					$(".msgPedido").html(Utils.msgDanger(retorno)).collapse();
					Utils.setTimeoutLocation('http://localhost/startDemand/view/Pedido.php?panel=193158');
				} else if(msgRetornoAcrescimos == "Acréscimo"){
					
					$(".msgPedido").html(Utils.msgDanger(retorno)).collapse();
					Utils.setTimeoutReload();
				}
				else {
					
					$(".msgPedido").html(Utils.msgSuccess(retorno)).collapse();
					Utils.setTimeoutReload();
				} 
			});
	}
		
	var preencheAcrescimoPedido = function() {

		$("#cpQtdAcrescimo").change(function() {
			
			var valorAcrescimo = $("#cpAcrescimo").val();
			if(valorAcrescimo == '') {
				
				this.value = 0;
				window.alert("È necessário selecionar o campo [ ACRÉSCIMO ] !");
			    $("#cpAcrescimo").focus(); return false;
				
			} else if(this.value == 0) {
				
				$('.toClearAcrescimo').val("");
				
			} else {
				
				var result = this.value * getValorBaseAcrescimo();
				$("#cpValorTotalAcrescimo").val(result);
			}
		});
	}	
	
	var postCamposAcrescimos = function() {
		
		var cpAcrescimo = $("#cpAcrescimo").val(),
			tuPedido_cpCodPedido = $("#tuPedido_cpCodPedido").val(),
			cpValorBaseAcrescimo = $("#cpValorBaseAcrescimo").val(),
			cpQtdAcrescimo = $("#cpQtdAcrescimo").val(),
			cpValorTotalAcrescimo = $("#cpValorTotalAcrescimo").val(),
			cpObservacaoAcrescimo = $("#cpObservacaoAcrescimo").val();
		
	    $.post("http://localhost/startDemand/controller/Prepara_Pedido_Acrescimo_Controller.php", {
	    	
	    	cpAcrescimo: cpAcrescimo,
	    	cpValorBaseAcrescimo: cpValorBaseAcrescimo,
	    	cpQtdAcrescimo: cpQtdAcrescimo,
	    	cpValorTotalAcrescimo: cpValorTotalAcrescimo,
	    	cpObservacaoAcrescimo: cpObservacaoAcrescimo,
	    	tuPedido_cpCodPedido: tuPedido_cpCodPedido
	    },
		function(retorno)	{

			$(".successAddAcrescimo").html(Utils.msgSuccess(retorno)).collapse();
			Utils.setTimeoutReload();
		});
	}
	
	var addOptions = function() {
		
		var options = "";
			options += "<option value='0'>Selecione</option>";
		
		for(var i=1; i < 101 ;i++) {
			
			options += "<option value='"+i+"'>"+i+"</option>";
		}	
		
		return options;
	}
	
	var preencheSelectCodigo = function() {
		
		$("#cpCodPedido").html(addOptions());
	}
	
	var painelAcrescimoHide = function(valor) {
		
		if(valor == '') {
			$('.painelAddAcrescimos').fadeOut();
		}else{
			$('.painelAddAcrescimos').show();;
		}
	}	
	
	var bindEvents =  function() {
		
		expandePainel(Utils.verificaUrl());
		preencheAcrescimoPedido();
		preencheSelectCodigo();
		setSomaValores();
		
		$(document).on('change','#cpAcrescimo',function(ev) {
			
			getAjaxValorAcrescimo(ev.target.value);
		});
				
		$(document).on('click','.excluirAcrescimo',function(){
			
			return confirm("Tem certeza que deseja excluir esse acréscimo ?");
		});
		
		$("#confirmarPedido").click(function(){
			
			postConfirmPedido();
			
		});
		
		$(document).on("click",".excluirProdPreparaPedido", function() {
			
			return confirm("Tem certeza que deseja excluir esse produto ?");
		});
		
		$(".efetivarPedido").click(function(){
			
			efetivarPedido();
		});
		
		$("#btnAddAcrescimo").bind('click',function() {
							
			 postCamposAcrescimos();
			 Utils.setTimoutReload();
		});
	}
	
	return {
		
		bindEvents: bindEvents,
		setValorAcrescimo: setValorAcrescimo,
		setValorProduto: setValorProduto,
		painelAcrescimoHide: painelAcrescimoHide
	}
	
})();
