document.getElementById("btnAddAcrescimo").onclick = function() {
	
	var Errors = [];
	
	var valida = function(campo,msg) {
		
		if(returnId(campo) == '' || returnId(campo) == 0) {
			
			Errors.push(msg);
		}
	}
	
	var returnId = function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	}
	
	valida("cpAcrescimo", "Preencha o campo [ ACRÉSCIMO ] !");
	valida("cpQtdAcrescimo", "Selecione o campo [ QUANTIDADE ] !");
	valida("cpValorBaseAcrescimo", "Preencha o campo [ VALOR BASE ] !");
	valida("cpValorTotalAcrescimo", "Preencha  o campo [ VALOR TOTAL ] !");
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a,b) {
			
			return a + b + '\n';
			
		},'Por favor,\n\n');
		
		window.alert(msg); 
		return false;
		
	}
};