
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
	
	valida("tuPedido_cpCodPedido","È necessário selecionar o campo [ CÓDIGO DO PEDIDO ] !");
	valida("cpAcrescimo","È necessário selecionar o campo [ ACRESCIMO ] !");
	valida("cpQtdAcrescimo","È necessário selecionar o campo [ QUANTIDADE ] !");
	valida("cpValorBaseAcrescimo","È necessário preencher o campo [ VALOR BASE ] !");
	valida("cpValorTotalAcrescimo","È necessário preencher o campo [ VALOR TOTAL ] !");
	
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(x,y){
			
			return x + y + '\n';
		},'');
		
		window.alert(msg); return false;
	}
	

}