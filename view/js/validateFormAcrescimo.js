
document.getElementById("btnCadastarAcrescimo").onclick = function(){
	
	var Errors = [];
	
	var valida = function(campo, msg) {
		
		if(returnId(campo) == '' || returnId(campo) == 0){
			
			Errors.push(msg);
		}
	}
	
	var returnId = function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	}
	
	var validaPaiFilho = function(campo,valor) {
		
		if(returnId(campo) == valor ) {
			
			valida("cpQtdParcelaAcrescimo","Selecione o campo [ QTDE PARCELAS ] !");
			valida("cpValorParcelaAcrescimo","Preencha o campo [ VALOR PARCELA ] !");
		}
	}
	
	valida("tuPedido_cpCodPedido","Selecione o campo [ CÓDIGO DO PEDIDO ] !");
	valida("cpAcrescimo","Selecione o campo [ ACRESCIMO ] !");
	valida("cpQtdAcrescimo","Selecione o campo [ QUANTIDADE ] !");
	valida("cpValorBaseAcrescimo","Preencha o campo [ VALOR BASE ] !");
	valida("cpFormaPagamentoAcrescimo","Selecione o campo [ FORMA DE PAGAMENTO ] !");
	validaPaiFilho("cpFormaPagamentoAcrescimo","CC");
	valida("cpValorTotalAcrescimo","Preencha o campo [ VALOR TOTAL ] !");
	
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(x,y){
			
			return x + y + '\n';
		},'Por favor, \n\n');
		
		window.alert(msg); return false;
	}
	

}