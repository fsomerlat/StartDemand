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
	
	
	var getAjaxValorProduro = function(cptuProduto_idProduto) {
		
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Produto.php",
			cache:false,
			dataType:"json",
			success:function(retorno) {
				  
			retorno.map(function(dados){
					   
					if(dados.idProduto == cptuProduto_idProduto) {	
						
						$("#cpValorProduto").val(dados.cpValorProduto);
						$("#cpValorBaseProduto").val(dados.cpValorProduto);
					}
				});
			}
		});
	}
	
	var getValorBaseAcrescimo =  function() {
		
		return $("#cpValorBaseAcrescimo").val();
	}
	
	var getValorBaseProduto =  function() {
		
		return $("#cpValorBaseProduto").val();
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
				$("#cpValorTotalPedido").val(getSomaTotalPedido());
			}
		});
	}
	
	var recalculaValorPedido = function() {
		
		return getSomaTotalPedido();
	}
	
	var preencheValorProduto = function() {
		
		$("#cpQtdProduto").change(function() {
			
			var nomeProduto = $("#cptuProduto_idProduto").val();
			if(nomeProduto == '') {
					
				this.value = 0;
				window.alert("È necessário selecionar o campo  [ NOME DO PRODUTO ] !");
				$("#cptuProduto_idProduto").focus() ; return false;
				
			} else if(this.value ==  0) { 
				
				$(".toClearProduto").val("");
				
			} else {
				
				var result = this.value * getValorBaseProduto();
				$("#cpValorProduto").val(result);
				$("#cpValorTotalPedido").val(getSomaTotalPedido());
			}
		});
	}
	
	var getSomaTotalPedido = function() {
		
	
		var valorAcrescimo = $("#cpValorTotalAcrescimo").val(),
			valorProduto = $("#cpValorProduto").val(),
			somaTotalPedido ='';
		if(valorAcrescimo != '' || valorProduto != '') {
			
			(valorAcrescimo == '') ? valorAcrescimo = 0 :false;
			(valorProduto == '') ? valorProduto = 0 : false;			
			
			somaTotalPedido = parseFloat(valorAcrescimo) + parseFloat(valorProduto);
		}	
		return somaTotalPedido;
	}
	
	var postCamposAcrescimo = function() {
		
		var campoAcrescimo = $("#cpAcrescimo").val(),
			valBaseAcrescimo = $("#cpValorBaseAcrescimo").val(),
			qtdAcrescimo = $("#cpQtdAcrescimo").val(),
			valTotalAcrescimo = $("#cpValorTotalAcrescimo").val();
		
		//,qtdAcrescimo: qtdAcrescimo,valAcrescimo: valAcrescimo
		
		
		//,acrescimo: campoAcrescimo,valorBase: valBaseAcrescimo,qtdaAcrescimo:qtdAcrescimoc
		$.post("http://localhost/startDemand/controller/Pedido_Controller.php",{nomeAcrescimo: campoAcrescimo,qtdAcrescimo:qtdAcrescimo,valBaseAcrescimo:valBaseAcrescimo,valTotalAcrescimo:valTotalAcrescimo}, function(retorno) {
			
			$(".successAddAcrescimo").html(retorno);
		});
	}
	
	var bindEvents =  function() {
		
		expandePainel(verificaUrl());
		preencheAcrescimoPedido();
		preencheValorProduto();
		
		$(document).on('change','#cptuProduto_idProduto', function(ev) {
			
			getAjaxValorProduro(ev.target.value);
		});
		
		$(document).on('change','#cpAcrescimo',function(ev) {

			getAjaxValorAcrescimo(ev.target.value);
		});
		
//		$("#cptuProduto_idProduto,#cpAcrescimo").change(function() {
//		
//			recalculaValorPedido(); 
//		});
		
		$("#btnAddAcrescimo").click(function() {
			
			postCamposAcrescimo();
		});
	}
	
	
	return  {

		bindEvents: bindEvents
		
	}
})();
	    
	    