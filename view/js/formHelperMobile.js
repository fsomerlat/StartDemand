var FormHelperMobile = (function(){
		
	var arrayValorProduto = [],
		arrayValorAcrescimo = [];	
	
	var getOptions = function(){
		
		var arryOptions = [];
		$(".isSelectPedidosMobile option").each(function(){
			
			arryOptions.push(this.value);
		
		});
		
		if(arryOptions.length > 0) {
			
			return arryOptions;
		}
	}
	
	var getValorProduto = function(arryValores) {
		
		var arryValor = arryValores;	
		arrayValorProduto.push(arryValor);
	}
	
	var getValorAcrescimo = function(arryValores) {
		
		var arryValor = arryValores;
		arrayValorAcrescimo.push(arryValor);
	}
	
	var setValorTotal = function() { //********************VALORES NÃO ESTÁO SOMANDO CORRETAMENTE
		
		var vProd = arrayValorProduto.map(function(dadosI) {
			
			return dadosI;
		});
		
		var vAcres = arrayValorAcrescimo.map(function(dadosJ){
			
			return dadosJ;
		});
		

		retorno =  vProd +'-'+ vAcres;
		
		somaTotal = parseFlloar
		console.log(somaValorTotal);
		
		setTimeout(function() {			
			
			$("#isValorTotalPedido").html("R$ " + somaValorTotal);
			
		},100);
	 
	}
	
	var getTotalPedido = function() {
		
		var valorProduto = [],
			valorAcrescimo = [];
		
		$(".isConfirmaPedido").click(function() { 
			
			$(".isSelectPedidosMobile option").each(function(){
				
				var classificacao = this.value.split("-"),
				    produto = classificacao[1],
					valor = classificacao[3];
				
				if(produto == "produto") {
				
					valorProduto.push(valor);
					
				}else if(produto == "acrescimo") {
					
					valorAcrescimo.push(valor);
				}
			});
			
			getValorProduto(valorProduto);
			getValorAcrescimo(valorAcrescimo);
			
			setTimeout(function() {
				
				setValorTotal();
				
			},100);

		});
	}
	
	var preencheSelects = function() {
		
		var produto = '',
			acrescimo = '';
		
		$.ajax({
			
			url:"http://localhost/startDemand/service/Service_Produto.php",
			cache: false,
			dataType:"json",
			success:function(retorno) {
							
				retorno.map(function(dados){
					
					if(dados.cpClassificacaoProduto == "Principal") {
						
						produto += "<option value='part-produto-tuProduto_idProduto="+dados.idProduto+"-"+dados.cpValorProduto+"-"+dados.cpNomeProduto+"' class='isFontMobile'>"+dados.cpNomeProduto+"</option>"; 
					
					}
				    if(dados.cpClassificacaoProduto == "Acrescimo") {
						
						acrescimo += "<option value='part-acrescimo-cpAcrescimo="+dados.cpNomeProduto+"-"+dados.cpValorProduto+"-"+dados.cpNomeProduto+"' class='isFontMobile'>"+dados.cpNomeProduto+"</option>";
					}
				});
				
	            $() 
				$("#selectMobileProduto, .prodPrincipal").html(produto);
				$("#selectMobileAcrescimo, .prodAcrescimo").html(acrescimo);
			}
		});
		
	}
	var criaInputsHidden = function() {
	
		var arry = getOptions(),
			itens = '';
		
		for(var i=0; i < arry.length; i++) {
		    
			itens += "<input type='hidden' name='produtoMobile[]' value='"+arry[i]+"'/>";
		}
		$("formMobile, .isItensFormMobile").html(itens);
	}
	
	var bindEvents = function() {
		
		getTotalPedido();
	
		preencheSelects();
		
		$(".isSelectPedidosMobile option").attr("selected",true);
		$("#selecioneTudo").click(function(){
		
			$(".isSelectPedidosMobile option").attr("selected",true);
			getOptions();
			
			setTimeout(function(){
				
				criaInputsHidden();
				
			},100);

		});
		
		$(".isBtnRetroceder").click(function(){
			
				$("#selectMobile,.isSelectPedidosMobile option").attr("selected",false);
				location.reload();
		});
		
		
		$("#btnGerarPedidoMobile").click(function(){
			
			var select = $(".isItensFormMobile input").length;
			
			if(select == "") {
				
				window.alert("Confirme a  lista !"); return false;
			}
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();
