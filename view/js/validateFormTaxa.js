/**
 * 
 */

document.getElementById("btnCadastrarTaxa").onclick = function(){	
	
	var Errors = [];
	
	var valida =  function(campo,msg) {
		
		if(returnId(campo) == "" || returnId(campo) == 0 ){
			
			Errors.push(msg);
		}
	}
	
	var validaPaiFilho = function(campo) {
		
		if(returnId(campo) == "") {
			
			valida("cpFormaPagamentoTaxa","Selecione o campo [ FORMA DE PAGAMENTO ] !");
			
		}else if(returnId(campo) == "PS") {
			 
			valida("cpPlanoPagSeguro","Preencha o campo [ PLANO PAGSEGURO ] !");
		
		}else if(returnId(campo) == "CD" || returnId(campo) == "CC") {
			
			valida("cpBandeiraCartao","Selecione o campo [ BANDEIRA / CARTTÃO ] !");
		}
	}
	
	var returnId =  function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	}
	
	validaPaiFilho("cpFormaPagamentoTaxa");
	valida("cpPorcentagemTaxa","Preencha o campo [ % TAXA ] !");	
	
	
	if(Errors.length > 0) {
		
		var msg =  Errors.reduce(function(a, b){
			
			return a + b + '\n';
			
		},'');
		
		window.alert(msg); return false;
	}
};