document.getElementById("btnCadastrarConta").onclick = function() {
	
	var Errors = [];
	
	var valida = function(campo, msg) {
		
		if(returnId(campo) == 0 || returnId(campo) == 0) {
			
			Errors.push(msg);
		}
	} 
	
	var returnId = function(Nids) {
		
		return document.getElementById(Nids).value;
	}
	
	valida("cpTipoConta","Selecione o campo [ TIPO DE CONTA] !");
	valida("cpClassificacaoConta","Selecione o campo [ CLASSIFICAÇÃO ] !");
	valida("cpValorConta","Preencha o campo [ VALOR ] !");
	valida("cpDataVencimentoConta","Preencha o campo [ DATA DE VENCIMENTO ] !");

	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a, b) {
			
			return a + b + '\n';
			
		},'Por favor, \n\n');
		
		window.alert(msg); return false;
	}
}