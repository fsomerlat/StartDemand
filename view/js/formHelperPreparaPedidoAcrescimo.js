var FormHelperAcrescimo = (function(){
	
	var msgSuccess =  function(mensagem) {
		
		var success = '<div class="alert alert-success" role="alert">' + mensagem + '</div>';
		return success;
	}
		
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
				$("#cpValorTotalPedido").val(FormHelperPedido.getSomaTotalPedido());
			}
		});
	}	
	
	var postCamposAcrescimos = function() {
		
		var cpAcrescimo = $("#cpAcrescimo").val(),
			cpValorBaseAcrescimo = $("#cpValorBaseAcrescimo").val(),
			cpQtdAcrescimo = $("#cpQtdAcrescimo").val(),
			cpValorTotalAcrescimo = $("#cpValorTotalAcrescimo").val();
		
	    $.post("http://localhost/startDemand/controller/Prepara_Pedido_Acrescimo_Controller.php", {
	    	
	    	cpAcrescimo: cpAcrescimo,
	    	cpValorBaseAcrescimo: cpValorBaseAcrescimo,
	    	cpQtdAcrescimo: cpQtdAcrescimo,
	    	cpValorTotalAcrescimo: cpValorTotalAcrescimo
	    },
		function(retorno)	{
			
			$(".successAddAcrescimo").html(msgSuccess(retorno)).collapse();
		});
	}
	
	var addOptions = function() {
		
		var options = "";
		options += "<option value='0'>Selecione</option>";
		
		for(var i=1;i < 101 ; i++) {
			
			options += "<option value='"+i+"'>"+i+"</option>";
		}	
		
		return options;
	}
	
	
	var preencheSelectCodigo = function() {
		
		$("#cpCodPedido").html(addOptions());
	}
	
	
	var bindEvents =  function() {
		
		expandePainel(verificaUrl());
		preencheAcrescimoPedido();
		preencheSelectCodigo();
		
		$(document).on('change','#cpAcrescimo',function(ev) {
			
			getAjaxValorAcrescimo(ev.target.value);
		});
				
		$(document).on('click','.excluirAcrescimo',function(){
			
			return confirm("Tem certeza que deseja excluir esse acréscimo ?");
		});
		
		$(document).on("click",".excluirProdPreparaPedido", function() {
			
			return confirm("Tem certeza que deseja excluir esse produto ?");
		});
	
		
		$("#btnAddAcrescimo").bind('click',function() {
							
			 postCamposAcrescimos();
			 
			 setInterval(function() {
				 location.reload();
			 },1500);
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();