document.getElementById("btnCadastrarUsuario").onclick = function() {
	
	var Errors = [];
	
	
	var valida = function(campo,msg) {
		
		if(returnId(campo) == "" || returnId(campo) == 0) {
			
			Errors.push(msg);
		}
	}
	
	var returnId = function(Nids) {
		
		return document.getElementById(Nids).value;
	}
	
	
	valida("cpNome","Preencha o campo [ USUÁRIO ] !");
	valida("cpSenha","Preencha o campo [ SENHA ] !");
	valida("cpStatus","Selecione o campo [ STATUS ] !");
	valida("cpNivelAcesso","Selecione o campo [ NÍVEL ACESSO ] !");
	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a, b){
			
			return a + b + '\n';
			
		},'Por favor, \n\n');
		
		window.alert(msg); return false;
	}
	
}