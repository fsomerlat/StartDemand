/**
 * 
 */

$(document).ready(function(){
	
	Utils.bindEvents();
	
	FormHelperProduto.bindEvents();
	FormHelperPedido.bindEvents();
	
})

$(document).ready(function(){
	
	try {
		
		Service_Produto.carregaInfoProdutoAjaxDB();
	
	} catch(e) {
		
		console.log(e);
	}	
})