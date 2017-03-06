/**
 * 
 */


document.getELementById("btnCadastrarPedido").onclick = function() {
	
	var Errors = [];
	
	var valida = function(campo,msg) {
		
		if(returnId(campo) == 0) {
			
			Errors.push(msg);
		}
	};
	
	var returnId = function(Nids) {
		
		var id =  document.getElementById(Nids);
		return id.value;
	};
	
	valida("tuProduto_idProduto","È necessário selecionar o campo [ NOME PRODUTO ] !");
	valida("cpCodPedido","È necessário selecionar o campo [ CÓDIGO PEDIDO ] !");
	valida("cpQtdProduto","È necessário selecionar o campo [ QUANTIDADE PRODUTO ] !");
	valida("cpComplementoUm","È necessário selecionar o campo [ COMPLEMENTO UM ] !");
	valida("cpComplementoDois","È necessário selecionar o campo [ COMPLEMENTO DOIS ] !");
	
	if(Errors.length > 0) {
		
		var msg =  Errors.reduce(function(a,b){
			
			return a + b + '\n';
		},'');
		
		window.alert(msg); return false;
	};
};