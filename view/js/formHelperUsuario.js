var FormHelperUsuario = (function(){
	
	var visualizaSenha = function() {
		
		$("input[name=cpSenha]").attr("type","text");
		
		setTimeout(function(){
			$("input[name=cpSenha]").attr("type","password");
		},1500);
	}
	
	var bindEvents = function() {
		
		$(".vizualizaSenha").click(function(){
			visualizaSenha();
		});
		
		$(document).on("click","#excluirUsuario", function(){
			return confirm("Deseja excluir esse registro ?");
		});
	}
	
	return {
		
		bindEvents: bindEvents
	}
	
})();