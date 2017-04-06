/**
 * 
 */

document.getElementById("btnCadastrarProduto").onclick = function() {
	
	var Errors = [];
		
	var valida =  function(campo,msg) {
		
		(returnId(campo) == '' || returnId(campo) == 0) ? Errors.push(msg) : false;
	}
	
	var returnId =  function(Nids) {
		
		var id = document.getElementById(Nids);
		return id.value;
	}
	
	valida('cpNomeProduto','Preencha o campo [ NOME ] !');
	valida('cpQtdProduto','Preencha o campo [ QUANTIDADE ] !');
	valida('cpTipoProduto','Preencha o campo [ TIPO ] !');
	valida('cpValorEstimado','Selecione o campo [ VALOR ESTIMADO ] !');
	valida('cpValorProduto','Preencha o campo [ VALOR ] !');

	
	if(Errors.length > 0) {
		
		var msg = Errors.reduce(function(a,b) {
			
			return a + b + '\n';
			
		},'Por favor,\n\n');
		
		window.alert(msg); return false;
	}
};