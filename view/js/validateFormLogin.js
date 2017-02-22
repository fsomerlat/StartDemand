/**
 * 
 */

$(document).ready(function() {
	
	$("#btnLogin").click(function() {
			
		var name = $("#cpNome").val() == "",
			password = $("#cpSenha").val().length < 4;
		
		if(name) {
			
			$('msgNome').html("Por favor, preencha esse campo !").css({color:"red"}); return false;
		} else if(password) {
			
			$('msgNome').html("");
			$('msgSenha').html("Por favor, preencha  esse campo com 4 caracteres !").css({color:"red"}); return false;
			
		} else {
			
			$("#formLogin").submit();
		}
	});
})
