/**
 * 
 */

$(document).ready(function(){
	
	Utils.bindEvents();
	FormHelperPedido.bindEvents();
	FormHelperProduto.bindEvents();
	FormHelperAcrescimo.bindEvents();

})

$(document).ready(function(){
	
	try {
		
		Service_Produto.carregaInfoProdutoAjaxDB();
	
	} catch(e) {
		
		console.log(e);
	}	
	
	try {
		
		Service_Generico.carregaInfoProdutoAjaxGenericoDB();
	
	}catch(e) {
		
		console.log(e);
	}
	
	try {  
		
		Service_Pedido.carregaInfoProdutosDisponiveisPedido();
	
	}catch(e) {
		
		console.log(e);
	}
	try {
		
		Service_Acrescimo.bindEvents();
	
	}catch(e) {
		
		console.log(e);
	}
})

