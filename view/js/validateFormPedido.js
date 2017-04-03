/**
 ** 
 **/

document.getELementById("btnCadastrarPedido").onclick = function() {

	var Errors = [];
	
	var valida = function(campo,msg) {
		
		if(returnId(campo) == 0 || returnId(campo) == '') {
			
			Errors.push(msg);
		}
	}
	
	var returnId = function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	}
	
	var validaPaiFilho = function(campo) {
		
		if(returnId(campo) == "PS") {
			
			valida("cpPlanoPagSeguroPedido","Selecione o campo [ PLANO / PAGSEGURO ] !");
			valida("cpPorcentagemJurosPedido","Preencha o campo [ % JUROS ] !");
			valida("cpValorTaxaJurosPedido","Preencha o campo [  VALOR TAXA JUROS ] !");
			
		}else if(returnId(campo) == "CD" || returnId(campo) == "CC") {
			
			valida("cpQtdParcela","Selecione o campo [ QTDE PARCELA ] !");
			valida("cpPorcentagemJurosPedido","Preencha o campo [ % JUROS ] !");
			valida("cpValorTaxaJurosPedido","Preencha o campo [  VALOR TAXA JUROS ] !");
			valida("cpBandeiraCartaoPedido","Selecione o campo [ BANDEIRA / CARTÃO ] !");		
		}
		
	}
	
	valida("tipoPedido","Selecione o campo [ TIPO DO PEDIDO ] !");
	valida("tuProduto_idProduto","Selecione o campo [ NOME PRODUTO ] !");
	valida("cpCodPedido","Selecione o campo [ CÓDIGO PEDIDO ] !");
	valida("cpQtdProduto","Selecione o campo [ QUANTIDADE PRODUTO ] !");
	valida("cpComplementoUm","Selecione o campo [ COMPLEMENTO UM ] !");
	valida("cpComplementoDois","Selecione o campo [ COMPLEMENTO DOIS ] !");
	valida("cpFormaPagamento","Selecione o campo [ FORMA DE PAGAMENTO  ] !");
	validaPaiFilho("cpFormaPagamento");
	
	if(Errors.length > 0) {
		
		var msg =  Errors.reduce(function(a,b) {
			
			return a + b + '\n';
			
		},'');
		
		window.alert(msg); return false;
	}
}