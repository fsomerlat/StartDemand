document.getElementById("btnFiltroPedido").onclick = function() {
	
	var Errors = [];
	
	var valida = function(campo, msg) {
	
		if(returnId(campo) == "" || returnId(campo)==0) {
			
			Errors.push(msg);
		}
	}
	
	var validaPaiFilho = function(campo) {
		
		if(returnId(campo) == "D"){
			
			valida("cpŚtatusPesqPedido","Selecione o campo [ STATUS ] !");
			valida("cpDataInicioPesqPedido","Selecione o campo [ DE... ] !");
			valida("cpDataFinalPesqPedido","Selecione o campo [ ATÉ... ]");
			
		}
	}
	
	var returnId = function(Nids) {
		
		return document.getElementById(Nids).value;
	}
	
	validaPaiFilho("cpTipoPesquisaPedido");
	valida("cpTipoPesquisaPedido","Selecione o campo [ TIPO DE PESQUISA ] !");
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a,b) {
			
			return a + b + "\n";
			
		}, 'Por favor,\n\n');
		
		window.alert(msg); return false;
	}
}